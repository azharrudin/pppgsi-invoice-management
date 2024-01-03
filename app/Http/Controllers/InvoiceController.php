<?php

namespace App\Http\Controllers;

use App\Exceptions\CustomException;
use App\Models\Invoice;
use App\Models\InvoiceDetail;
use App\Models\Tenant;
use App\Services\CommonService;
use App\Services\InvoiceService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
    protected $CommonService;
    protected $InvoiceService;

    public function __construct(CommonService $CommonService, InvoiceService $InvoiceService)
    {
        $this->CommonService = $CommonService;
        $this->InvoiceService = $InvoiceService;
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

            $invoiceQuery = Invoice::with("invoiceDetails")->with("tenant")->with("bank")->where("deleted_at", null);
            if($value){
                $invoiceQuery->where(function ($query) use ($value) {
                    $query->whereHas('tenant', function ($tenantQuery) use ($value) {
                        $tenantQuery->where('name', 'like', '%' . $value . '%');
                    })
                    ->orwhere('invoice_number', 'like', '%' . $value . '%')
                    ->orWhere('grand_total', 'like', '%' . $value . '%')
                    ->orWhere('invoice_date', 'like', '%' . $value . '%')
                    ->orWhere('invoice_due_date', 'like', '%' . $value . '%')
                    ->orWhere('status', 'like', '%' . $value . '%');
                });
            }
            $getInvoices = $invoiceQuery->orderBy($order, $sort)->paginate($perPage);
            $totalCount = $getInvoices->total();

            $invoiceArr = $this->CommonService->toArray($getInvoices);

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

            $invoice = Invoice::create($request->all());
            foreach ($request->input('details') as $detail) {
                InvoiceDetail::create([
                    'invoice_id' => $invoice->id,
                    'item' => $detail['item'],
                    'description' => $detail['description'],
                    'price' => $detail['price'],
                    'tax' => $detail['tax'],
                    'total_price' => $detail['total_price'],
                ]);
            }

            DB::commit();
            $getInvoice = Invoice::with("invoiceDetails")
                ->with("tenant")
                ->with("bank")
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
                with("bank")->
                where("id", $id)->
                where("deleted_at", null)->first();
            if (is_null($getInvoice)) throw new CustomException("Invoice tidak ditemukan", 404);

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
            $getInvoice = $this->CommonService->getDataById("App\Models\Invoice", $id);
            if (is_null($getInvoice)) throw new CustomException("Invoice tidak ditemukan", 404);

            $validateInvoice = $this->InvoiceService->validateInvoice($request);
            if($validateInvoice != "") throw new CustomException($validateInvoice, 400);

            Invoice::findOrFail($id)->update($request->all());
            InvoiceDetail::where("invoice_id", $id)->where("deleted_at", null)->delete();
            foreach ($request->input('details') as $detail) {
                InvoiceDetail::create([
                    'invoice_id' => $id,
                    'item' => $detail['item'],
                    'description' => $detail['description'],
                    'price' => $detail['price'],
                    'tax' => $detail['tax'],
                    'total_price' => $detail['total_price'],
                ]);
            }

            DB::commit();
            $getInvoice = Invoice::with("invoiceDetails")
                ->with("tenant")
                ->with("bank")
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

    public function report()
    {
        try{
            $countTenant = Tenant::where("deleted_at", null)->count();
            $countInvoice = Invoice::where("deleted_at", null)->count();
            $sumInvoicePaid = Invoice::where("deleted_at", null)->where("status", 'like', '%Lunas%')->sum("grand_total");
            $sumInvoiceNotPaid = Invoice::where("deleted_at", null)->where("status", '!=', 'Lunas')->sum("grand_total");

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
}
