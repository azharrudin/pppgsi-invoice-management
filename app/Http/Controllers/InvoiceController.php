<?php

namespace App\Http\Controllers;

use App\Exceptions\CustomException;
use App\Models\Invoice;
use App\Models\InvoiceDetail;
use App\Models\Receipt;
use App\Models\Tenant;
use App\Services\CommonService;
use App\Services\InvoiceService;
use App\Services\PaperIdService;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
    protected $CommonService;
    protected $InvoiceService;
    protected $PaperIdService;

    public function __construct(CommonService $CommonService, InvoiceService $InvoiceService, PaperIdService $PaperIdService)
    {
        $this->CommonService = $CommonService;
        $this->InvoiceService = $InvoiceService;
        $this->PaperIdService = $PaperIdService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try{
            [
                "perPage" => $perPage,
                "page" => $page,
                "order" => $order,
                "sort" => $sort,
                "value" => $value
            ] = $this->CommonService->getQuery($request);

            $invoiceQuery = Invoice::with("tenant")->where("deleted_at", null);
            if($value){
                $invoiceQuery->where(function ($query) use ($value) {
                    $query->whereHas('tenant', function ($tenantQuery) use ($value) {
                        $tenantQuery->where('name', 'like', '%' . $value . '%')
                        ->orWhere('company', 'like', '%' . $value . '%');
                    })
                    ->orwhere('invoice_number', 'like', '%' . $value . '%')
                    ->orWhere('grand_total', 'like', '%' . $value . '%')
                    ->orWhere('invoice_date', 'like', '%' . $value . '%')
                    ->orWhere('invoice_due_date', 'like', '%' . $value . '%')
                    ->orWhere('status', 'like', '%' . $value . '%');
                });
            }
            $getInvoices = $invoiceQuery
            ->select("id", "invoice_number", "tenant_id", "grand_total", "invoice_date", "invoice_due_date", "pdf_link", "status")
            ->orderBy($order, $sort)
            ->paginate($perPage);
            $totalCount = $getInvoices->total();

            $invoiceArr = $this->CommonService->toArray($getInvoices);
            foreach($invoiceArr as $invoiceObj){
                $totalPaid = Receipt::where("invoice_id", $invoiceObj["id"])->where("deleted_at", null)->sum("paid");
                $invoiceObj["total_paid"] = $totalPaid;
                $invoiceObj["remaining"] = $invoiceObj["grand_total"] - $totalPaid;
            }

            return [
                "data" => $invoiceArr,
                "per_page" => $perPage,
                "page" => $page,
                "size" => $totalCount,
                "pages" => ceil($totalCount/$perPage)
            ];
        } catch (\Throwable $e) {
            $errorMessage = "Internal server error";
            $errorStatusCode = 500;

            if(is_a($e, CustomException::class)){
                $errorMessage = $e->getMessage();
                $errorStatusCode = $e->getStatusCode();
            }

            return response()->json(['message' => $errorMessage], $errorStatusCode);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::beginTransaction();

        try{
            $validateInvoice = $this->InvoiceService->validateInvoice($request);
            if($validateInvoice != "") throw new CustomException($validateInvoice, 400);

            $invoicePayload = $request->all();
            if(isset($invoicePayload["invoice_number"])) unset($invoicePayload["invoice_number"]);

            $invoice = Invoice::create($invoicePayload);
            foreach ($request->input('details') as $detail) {
                InvoiceDetail::create([
                    'invoice_id' => $invoice->id,
                    'item' => $detail['item'],
                    'description' => $detail['description'],
                    'quantity' => $detail['quantity'],
                    'price' => $detail['price'],
                    'tax_id' => $detail['tax_id'],
                    'discount' => $detail['discount'] == '' ? 0 : $detail['discount'],
                    'total_price' => $detail['total_price'],
                ]);
            }

            DB::commit();
            $getInvoice = Invoice::with("invoiceDetails")
                ->with("tenant")
                ->where("id", $invoice->id)
                ->where("deleted_at", null)
                ->first();

            return ["data" => $getInvoice];
        } catch (\Throwable $e) {
            $errorMessage = "Internal server error";
            $errorStatusCode = 500;
            DB::rollBack();

            if(is_a($e, CustomException::class)){
                $errorMessage = $e->getMessage();
                $errorStatusCode = $e->getStatusCode();
            }

            return response()->json(['message' => $errorMessage], $errorStatusCode);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try{
            $id = (int) $id;
            $getInvoice = Invoice::with("invoiceDetails")->
                with("tenant")->
                where("id", $id)->
                where("deleted_at", null)->first();
            if (is_null($getInvoice)) throw new CustomException("Invoice tidak ditemukan", 404);

            $sumReceipt = Receipt::where("invoice_id", $id)->where("deleted_at", null)->sum("paid");
            $getInvoice["total_paid"] = $sumReceipt;
            if(isset($getInvoice["paper_id"])){
                $getInvoice["sales_invoice"] = $this->PaperIdService->getSalesInvoiceById($getInvoice["paper_id"]);
            }
            else $getInvoice["sales_invoice"] = null;

            return ["data" => $getInvoice];
        } catch (\Throwable $e) {
            $errorMessage = "Internal server error";
            $errorStatusCode = 500;

            if(is_a($e, CustomException::class)){
                $errorMessage = $e->getMessage();
                $errorStatusCode = $e->getStatusCode();
            }

            return response()->json(['message' => $errorMessage], $errorStatusCode);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        DB::beginTransaction();

        try{
            $id = (int) $id;
            $getInvoice = Invoice::with("tenant")->with("invoiceDetails")->where("deleted_at", null)->where("id", $id)->first();
            if (is_null($getInvoice)) throw new CustomException("Invoice tidak ditemukan", 404);

            $validateInvoice = $this->InvoiceService->validateInvoice($request);
            if($validateInvoice != "") throw new CustomException($validateInvoice, 400);

            $status = strtolower($request->input("status"));
            $remainingQuota = $this->PaperIdService->checkRemainingStamp();
            if(
                $status == "disetujui bm" &&
                (!$remainingQuota ||
                !isset($remainingQuota["data"]) ||
                !isset($remainingQuota["data"]["quota"]) ||
                $remainingQuota["data"]["quota"] <= 0)
            ) throw new CustomException("Insuficient stamp", 400);

            $invoicePayload = $request->all();
            if(isset($invoicePayload["invoice_number"])) unset($invoicePayload["invoice_number"]);

            Invoice::findOrFail($id)->update($invoicePayload);
            InvoiceDetail::where("invoice_id", $id)->where("deleted_at", null)->delete();
            foreach ($request->input('details') as $detail) {
                InvoiceDetail::create([
                    'invoice_id' => $id,
                    'item' => $detail['item'],
                    'description' => $detail['description'],
                    'quantity' => $detail['quantity'],
                    'price' => $detail['price'],
                    'tax_id' => $detail['tax_id'],
                    'discount' => $detail['discount'],
                    'total_price' => $detail['total_price'],
                ]);
            }

            if($status == "disetujui bm" && !isset($getInvoice["paper_id"])){
                $getTenant = Tenant::where("deleted_at", null)->where("id", $request->input("tenant_id"))->first();
                $createSaleInvoice = $this->PaperIdService->createSalesInvoice($getInvoice, $request->input("details"), $getTenant);
                if(
                    $createSaleInvoice &&
                    isset($createSaleInvoice["data"]) &&
                    isset($createSaleInvoice["data"]["id"])
                ) Invoice::findOrFail($id)->update(["paper_id" => $createSaleInvoice["data"]["id"]]);
                else throw new CustomException("Failed to create sales invoice", 400);
            }

            DB::commit();

            if($status == "disetujui bm" && !$getInvoice["is_stamped"]){
                $stampInvoice = $this->PaperIdService->stampSalesInvoice($getInvoice["invoice_number"]);
                if(
                    $stampInvoice &&
                    isset($stampInvoice["data"]) &&
                    isset($stampInvoice["data"]["pdf_link"])
                ){
                  DB::beginTransaction();
                  Invoice::findOrFail($id)->update(["is_stamped" => true, "pdf_link" => $stampInvoice["data"]["pdf_link"]]);
                  DB::commit();
                }
            }

            $getInvoice = Invoice::with("invoiceDetails")
                ->with("tenant")
                ->where("id", $id)
                ->where("deleted_at", null)
                ->first();

            return ["data" => $getInvoice];
        } catch (\Throwable $e) {
            $errorMessage = "Internal server error";
            $errorStatusCode = 500;
            DB::rollBack();

            if(is_a($e, CustomException::class)){
                $errorMessage = $e->getMessage();
                $errorStatusCode = $e->getStatusCode();
            }

            return response()->json(['message' => $errorMessage], $errorStatusCode);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        DB::beginTransaction();

        try{
            $id = (int) $id;
            $getInvoice = $this->CommonService->getDataById("App\Models\Invoice", $id);
            if (is_null($getInvoice)) throw new CustomException("Invoice tidak ditemukan", 404);

            Invoice::findOrFail($id)->delete();
            InvoiceDetail::where("invoice_id", $id)->where("deleted_at", null)->delete();

            DB::commit();
            return response()->json(['message' => 'Invoice berhasil dihapus'], 200);
        } catch (\Throwable $e) {
            $errorMessage = "Internal server error";
            $errorStatusCode = 500;
            DB::rollBack();

            if(is_a($e, CustomException::class)){
                $errorMessage = $e->getMessage();
                $errorStatusCode = $e->getStatusCode();
            }

            return response()->json(['message' => $errorMessage], $errorStatusCode);
        }
    }

    public function select(Request $request)
    {
        try{
            [
                "page" => $page,
                "value" => $value
            ] = $this->CommonService->getQuery($request);

            $perPage = 10;
            $status = strtolower($request->input("status", ""));
            $statusArray = explode(",", $status);

            $invoiceQuery = Invoice::where("deleted_at", null);
            if($value){
                $invoiceQuery->where('invoice_number', 'like', '%' . $value . '%');
            }
            if($status != ""){
                $invoiceQuery->where(function ($query) use ($statusArray) {
                    $length = count($statusArray);

                    for($i = 0; $i < $length; $i++){
                        $statusFromArray = trim($statusArray[$i]);
                        $query->orWhere('status', 'like', '%' . $statusFromArray . '%');
                    }
                });
            }
            $getInvoices = $invoiceQuery->select("id", "invoice_number", "status")->paginate($perPage);
            $totalCount = $getInvoices->total();

            $dataArr = [];
            foreach($getInvoices as $invoiceObj){
                $dataObj = [
                    "id" => $invoiceObj->id,
                    "text" => $invoiceObj->invoice_number,
                ];
                array_push($dataArr, $dataObj);
            }

            $pagination = ["more" => false];
            if($totalCount > ($perPage * $page)) {
                $pagination = ["more" => true];
            }

            return [
                "data" => $dataArr,
                "pagination" => $pagination,
            ];
        } catch (\Throwable $e) {
            $errorMessage = "Internal server error";
            $errorStatusCode = 500;

            if(is_a($e, CustomException::class)){
                $errorMessage = $e->getMessage();
                $errorStatusCode = $e->getStatusCode();
            }

            return response()->json(['message' => $errorMessage], $errorStatusCode);
        }
    }

    public function report(Request $request)
    {
        try{
            [
                "start" => $start,
                "end" => $end,
            ] = $this->CommonService->getQuery($request);

            if(is_null($start)) $start = Carbon::now()->firstOfMonth();
            if(is_null($end)){
                $end = Carbon::now()->lastOfMonth();
                $end->setTime(23, 59, 59);
            }

            $countTenant = Tenant::where("deleted_at", null)->whereBetween("created_at", [$start, $end])->count();
            $countInvoice = Invoice::where("deleted_at", null)->whereBetween("created_at", [$start, $end])->count();
            $sumInvoicePaid = Invoice::where("deleted_at", null)->
                whereBetween("created_at", [$start, $end])->
                where("status", 'like', '%Lunas%')->
                sum("grand_total");
            $sumInvoiceNotPaid = Invoice::where("deleted_at", null)->
                whereBetween("created_at", [$start, $end])->
                where("status", '!=', 'Lunas')->
                sum("grand_total");

            return [
                "count_tenant" => $countTenant,
                "count_invoice" => $countInvoice,
                "invoice_paid" => $sumInvoicePaid,
                "invoice_not_paid" => $sumInvoiceNotPaid
            ];
        } catch (\Throwable $e) {
            $errorMessage = "Internal server error";
            $errorStatusCode = 500;

            if(is_a($e, CustomException::class)){
                $errorMessage = $e->getMessage();
                $errorStatusCode = $e->getStatusCode();
            }

            return response()->json(['message' => $errorMessage], $errorStatusCode);
        }
    }

    public function update_status(Request $request, $id)
    {
        DB::beginTransaction();

        try{
            $id = (int) $id;
            $getInvoice = Invoice::with("tenant")->with("invoiceDetails")->where("deleted_at", null)->where("id", $id)->first();
            if (is_null($getInvoice)) throw new CustomException("Invoice tidak ditemukan", 404);

            $validateInvoice = $this->InvoiceService->validateStatus($request);
            if($validateInvoice != "") throw new CustomException($validateInvoice, 400);

            $status = strtolower($request->input("status"));
            $remainingQuota = $this->PaperIdService->checkRemainingStamp();
            if(
                $status == "disetujui bm" &&
                (!$remainingQuota ||
                !isset($remainingQuota["data"]) ||
                !isset($remainingQuota["data"]["quota"]) ||
                $remainingQuota["data"]["quota"] <= 0)
            ) throw new CustomException("Insuficient stamp", 400);

            $invoicePayload = $request->all();
            if(isset($invoicePayload["invoice_number"])) unset($invoicePayload["invoice_number"]);

            $dataPayload = [ "status" => $request->input("status") ];

            Invoice::findOrFail($id)->update($dataPayload);

            if($status == "disetujui bm" && !isset($getInvoice["paper_id"])){
                $getTenant = Tenant::where("deleted_at", null)->where("id", $getInvoice["tenant_id"])->first();
                $getInvoiceDetail = InvoiceDetail::where("deleted_at", null)->where("invoice_id", $getInvoice["id"])->get();
                $invoiceDetailArr = $this->CommonService->toArray($getInvoiceDetail);

                $createSaleInvoice = $this->PaperIdService->createSalesInvoice($getInvoice, $invoiceDetailArr, $getTenant);
                if(
                    $createSaleInvoice &&
                    isset($createSaleInvoice["data"]) &&
                    isset($createSaleInvoice["data"]["id"])
                ) Invoice::findOrFail($id)->update(["paper_id" => $createSaleInvoice["data"]["id"]]);
                else throw new CustomException("Failed to create sales invoice", 400);
            }

            DB::commit();

            if($status == "disetujui bm" && !$getInvoice["is_stamped"]){
                $stampInvoice = $this->PaperIdService->stampSalesInvoice($getInvoice["invoice_number"]);
                if(
                    $stampInvoice &&
                    isset($stampInvoice["data"]) &&
                    isset($stampInvoice["data"]["pdf_link"])
                ){
                  DB::beginTransaction();
                  Invoice::findOrFail($id)->update(["is_stamped" => true, "pdf_link" => $stampInvoice["data"]["pdf_link"]]);
                  DB::commit();
                }
            }

            $getInvoice = Invoice::with("invoiceDetails")
                ->with("tenant")
                ->where("id", $id)
                ->where("deleted_at", null)
                ->first();

            return ["data" => $getInvoice];
        } catch (\Throwable $e) {
            $errorMessage = "Internal server error";
            $errorStatusCode = 500;
            DB::rollBack();

            if(is_a($e, CustomException::class)){
                $errorMessage = $e->getMessage();
                $errorStatusCode = $e->getStatusCode();
            }

            return response()->json(['message' => $errorMessage], $errorStatusCode);
        }
    }
}
