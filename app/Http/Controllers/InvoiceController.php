<?php

namespace App\Http\Controllers;

use App\Exceptions\CustomException;
use App\Models\Invoice;
use App\Models\InvoiceDetail;
use App\Models\Tenant;
use App\Services\CommonService;
use App\Services\InvoiceService;
use Illuminate\Http\Request;

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
        try{
            $id = (int) $id;
            $getInvoice = $this->CommonService->getDataById("App\Models\Invoice", $id);
            if (is_null($getInvoice)) throw new CustomException("Invoice tidak ditemukan", 404);

            Invoice::findOrFail($id)->delete();
            InvoiceDetail::where("invoice_id", $id)->where("deleted_at", null)->delete();

            return response()->json(['message' => 'Invoice have been deleted'], 200);
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
