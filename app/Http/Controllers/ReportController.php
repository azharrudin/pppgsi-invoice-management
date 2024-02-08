<?php

namespace App\Http\Controllers;

use App\Exceptions\CustomException;
use App\Models\Invoice;
use App\Models\PurchaseOrder;
use App\Models\Tenant;
use App\Services\CommonService;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    protected $CommonService;

    public function __construct(CommonService $CommonService)
    {
        $this->CommonService = $CommonService;
    }

    /**
     * Display a listing of the resource.
     */
    public function dashboard(Request $request)
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
            $countInvoiceExpired = Invoice::where("deleted_at", null)->
                where("invoice_due_date", "<=", $start)->
                where("status", '!=', 'Lunas')->
                count();
            $countInvoicePaid = Invoice::where("deleted_at", null)->
                whereBetween("created_at", [$start, $end])->
                where("status", 'like', '%Lunas%')->
                count();
            $countInvoiceNotPaid = Invoice::where("deleted_at", null)->
                whereBetween("created_at", [$start, $end])->
                where("status", '!=', 'Lunas')->
                count();
            $countVendorInvoice = PurchaseOrder::with("vendor")->
                whereBetween("created_at", [$start, $end])->
                where("deleted_at", null)->
                where('status', 'like', '%disetujui bm%')->
                count();

            return [
                "count_tenant" => $countTenant,
                "count_invoice" => $countInvoice,
                "count_invoice_expired" => $countInvoiceExpired,
                "count_invoice_paid" => $countInvoicePaid,
                "count_invoice_not_paid" => $countInvoiceNotPaid,
                "count_vendor_invoice" => $countVendorInvoice,
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
