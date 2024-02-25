<?php

namespace App\Http\Controllers;

use App\Exceptions\CustomException;
use App\Models\Invoice;
use App\Models\InvoiceDetail;
use App\Models\Receipt;
use App\Models\Tenant;
use App\Services\CommonService;
use App\Services\InvoiceService;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use PDF;
use Illuminate\Support\Facades\Mail;

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
        try {
            [
                "perPage" => $perPage,
                "page" => $page,
                "order" => $order,
                "sort" => $sort,
                "value" => $value
            ] = $this->CommonService->getQuery($request);

            $invoiceQuery = Invoice::with("invoiceDetails.tax")->with("tenant")->with("bank")->where("deleted_at", null);
            if ($value) {
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
                ->select("invoice_number", "tenant_id", "bank_id", "grand_total", "invoice_date", "invoice_due_date", "status", "id")
                ->orderBy($order, $sort)
                ->paginate($perPage);
            $totalCount = $getInvoices->total();

            $invoiceArr = $this->CommonService->toArray($getInvoices);

            return [
                "data" => $invoiceArr,
                "per_page" => $perPage,
                "page" => $page,
                "size" => $totalCount,
                "pages" => ceil($totalCount / $perPage)
            ];
        } catch (\Throwable $e) {
            $errorMessage = "Internal server error";
            $errorStatusCode = 500;

            if (is_a($e, CustomException::class)) {
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

        try {
            $validateInvoice = $this->InvoiceService->validateInvoice($request);
            if ($validateInvoice != "") throw new CustomException($validateInvoice, 400);

            $invoicePayload = $request->all();
            if (isset($invoicePayload["invoice_number"])) unset($invoicePayload["invoice_number"]);

            $invoice = Invoice::create($invoicePayload);
            foreach ($request->input('details') as $detail) {
                InvoiceDetail::create([
                    'invoice_id' => $invoice->id,
                    'item' => $detail['item'],
                    'description' => $detail['description'],
                    'price' => $detail['price'],
                    'tax_id' => $detail['tax_id'],
                    'total_price' => $detail['total_price'],
                ]);
            }

            DB::commit();
            $getInvoice = Invoice::with("invoiceDetails.tax")
                ->with("tenant")
                ->with("bank")
                ->where("id", $invoice->id)
                ->where("deleted_at", null)
                ->first();

            return ["data" => $getInvoice];
        } catch (\Exception  $e) {
            $errorMessage = "Internal server error";
            $errorStatusCode = 500;
            DB::rollBack();

            dd($e);

            if (is_a($e, CustomException::class)) {
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
        try {
            $id = (int) $id;
            $getInvoice = Invoice::with("invoiceDetails.tax")->with("tenant")->with("bank")->where("id", $id)->where("deleted_at", null)->first();
            if (is_null($getInvoice)) throw new CustomException("Invoice tidak ditemukan", 404);

            $sumReceipt = Receipt::where("invoice_id", $id)->where("deleted_at", null)->sum("paid");
            $getInvoice["total_paid"] = $sumReceipt;

            return ["data" => $getInvoice];
        } catch (\Throwable $e) {
            $errorMessage = "Internal server error";
            $errorStatusCode = 500;

            if (is_a($e, CustomException::class)) {
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

        try {
            $id = (int) $id;
            $getInvoice = $this->CommonService->getDataById("App\Models\Invoice", $id);
            if (is_null($getInvoice)) throw new CustomException("Invoice tidak ditemukan", 404);

            $validateInvoice = $this->InvoiceService->validateInvoice($request);
            if ($validateInvoice != "") throw new CustomException($validateInvoice, 400);

            $invoicePayload = $request->all();
            if (isset($invoicePayload["invoice_number"])) unset($invoicePayload["invoice_number"]);

            Invoice::findOrFail($id)->update($invoicePayload);
            InvoiceDetail::where("invoice_id", $id)->where("deleted_at", null)->delete();
            foreach ($request->input('details') as $detail) {
                InvoiceDetail::create([
                    'invoice_id' => $id,
                    'item' => $detail['item'],
                    'description' => $detail['description'],
                    'price' => $detail['price'],
                    'tax_id' => $detail['tax_id'],
                    'total_price' => $detail['total_price'],
                ]);
            }

            DB::commit();
            $getInvoice = Invoice::with("invoiceDetails.tax")
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

            if (is_a($e, CustomException::class)) {
                dd($e);
                $errorMessage = $e->getMessage();
                $errorStatusCode = $e->getStatusCode();
            }

            return response()->json(['message' => $e], $errorStatusCode);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        DB::beginTransaction();

        try {
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

            if (is_a($e, CustomException::class)) {
                $errorMessage = $e->getMessage();
                $errorStatusCode = $e->getStatusCode();
            }

            return response()->json(['message' => $errorMessage], $errorStatusCode);
        }
    }

    public function select(Request $request)
    {
        try {
            [
                "page" => $page,
                "value" => $value
            ] = $this->CommonService->getQuery($request);

            $perPage = 10;
            $status = strtolower($request->input("status", ""));
            $statusArray = explode(",", $status);

            $invoiceQuery = Invoice::where("deleted_at", null);
            if ($value) {
                $invoiceQuery->where('invoice_number', 'like', '%' . $value . '%');
            }
            if ($status != "") {
                $invoiceQuery->where(function ($query) use ($statusArray) {
                    $length = count($statusArray);

                    for ($i = 0; $i < $length; $i++) {
                        $statusFromArray = trim($statusArray[$i]);
                        $query->orWhere('status', 'like', '%' . $statusFromArray . '%');
                    }
                });
            }
            $getInvoices = $invoiceQuery->select("id", "invoice_number", "status")->paginate($perPage);
            $totalCount = $getInvoices->total();

            $dataArr = [];
            foreach ($getInvoices as $invoiceObj) {
                $dataObj = [
                    "id" => $invoiceObj->id,
                    "text" => $invoiceObj->invoice_number,
                ];
                array_push($dataArr, $dataObj);
            }

            $pagination = ["more" => false];
            if ($totalCount > ($perPage * $page)) {
                $pagination = ["more" => true];
            }

            return [
                "data" => $dataArr,
                "pagination" => $pagination,
            ];
        } catch (\Throwable $e) {
            $errorMessage = "Internal server error";
            $errorStatusCode = 500;

            if (is_a($e, CustomException::class)) {
                $errorMessage = $e->getMessage();
                $errorStatusCode = $e->getStatusCode();
            }

            return response()->json(['message' => $errorMessage], $errorStatusCode);
        }
    }

    public function report(Request $request)
    {
        try {
            [
                "start" => $start,
                "end" => $end,
            ] = $this->CommonService->getQuery($request);

            if (is_null($start)) $start = Carbon::now()->firstOfMonth();
            if (is_null($end)) {
                $end = Carbon::now()->lastOfMonth();
                $end->setTime(23, 59, 59);
            }

            $countTenant = Tenant::where("deleted_at", null)->whereBetween("created_at", [$start, $end])->count();
            $countInvoice = Invoice::where("deleted_at", null)->whereBetween("created_at", [$start, $end])->count();
            $sumInvoicePaid = Invoice::where("deleted_at", null)->whereBetween("created_at", [$start, $end])->where("status", 'like', '%Lunas%')->sum("grand_total");
            $sumInvoiceNotPaid = Invoice::where("deleted_at", null)->whereBetween("created_at", [$start, $end])->where("status", '!=', 'Lunas')->sum("grand_total");

            return [
                "count_tenant" => $countTenant,
                "count_invoice" => $countInvoice,
                "invoice_paid" => $sumInvoicePaid,
                "invoice_not_paid" => $sumInvoiceNotPaid
            ];
        } catch (\Throwable $e) {
            $errorMessage = "Internal server error";
            $errorStatusCode = 500;

            if (is_a($e, CustomException::class)) {
                $errorMessage = $e->getMessage();
                $errorStatusCode = $e->getStatusCode();
            }

            return response()->json(['message' => $errorMessage], $errorStatusCode);
        }
    }

    public function update_status(Request $request, $id)
    {
        DB::beginTransaction();

        try {
            $id = (int) $id;
            $getInvoice = $this->CommonService->getDataById("App\Models\Invoice", $id);
            if (is_null($getInvoice)) throw new CustomException("Invoice tidak ditemukan", 404);

            $validateInvoice = $this->InvoiceService->validateStatus($request);
            if ($validateInvoice != "") throw new CustomException($validateInvoice, 400);

            $dataPayload = ["status" => $request->input("status")];

            Invoice::findOrFail($id)->update($dataPayload);

            DB::commit();

            if ($request->input("status") == 'Terkirim') {
                $invoice = Invoice::where('id', $id)->first();
                $hariIni = \Carbon\Carbon::now()->locale('id');
                $bulan = $hariIni->monthName;
                $tahun = $hariIni->format('Y');

                $dataEmail["tenantName"] = $invoice->tenant->name ?? '';
                $dataEmail["month"] = $bulan;
                $dataEmail["year"] = $tahun;
                $dataEmail["total"] = $invoice->grand_total;
                $dataEmail["terbilang"] = $invoice->grand_total_spelled;
                $dataEmail["invoice_number"] = $invoice->invoice_number;

                $apiRequest = Http::get(env('BASE_URL_API') . '/api/invoice/' . $id);
                $response = json_decode($apiRequest->getBody());
                $data = $response->data;

                $pdf = PDF::loadView('invoice.download', ['data' => $data]);
                $to = $invoice->tenant->email ?? '';

                Mail::send('emails.email-template', ['data' => $dataEmail], function ($message) use ($to, $pdf, $dataEmail) {
                    $message->to($to)
                        ->subject('Invoice No Invoice : ' . $dataEmail['invoice_number'])
                        ->attachData($pdf->output(), "Invoice.pdf");
                });
            }


            $getInvoice = Invoice::with("invoiceDetails.tax")
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

            if (is_a($e, CustomException::class)) {
                $errorMessage = $e->getMessage();
                $errorStatusCode = $e->getStatusCode();
            }

            return response()->json(['message' => $errorMessage], $errorStatusCode);
        }
    }

    public function invoiceReportExport(Request $request)
    {
        try {
            [
                // "perPage" => $perPage,
                // "page" => $page,
                // "order" => $order,
                // "sort" => $sort,
                "value" => $value
            ] = $this->CommonService->getQuery($request);

            $invoiceQuery = Invoice::with("invoiceDetails.tax")->with("tenant")->with("bank")->where("deleted_at", null);
            if ($value) {
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
                ->select("invoice_number", "tenant_id", "bank_id", "grand_total", "invoice_date", "invoice_due_date", "status", "id")
                ->get();
            // $totalCount = $getInvoices->total();

            $invoiceArr = $this->CommonService->toArray($getInvoices);

            return [
                "data" => $invoiceArr,
                // "per_page" => $perPage,
                // "page" => $page,
                // "size" => $totalCount,
                // "pages" => ceil($totalCount / $perPage)
            ];
        } catch (\Throwable $e) {
            $errorMessage = "Internal server error";
            $errorStatusCode = 500;

            if (is_a($e, CustomException::class)) {
                $errorMessage = $e->getMessage();
                $errorStatusCode = $e->getStatusCode();
            }

            return response()->json(['message' => $errorMessage], $errorStatusCode);
        }
    }
}
