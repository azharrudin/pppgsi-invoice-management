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

            $sumInvoicePerMonth = Invoice::select(
                DB::raw('MONTH(created_at) AS month'),
                DB::raw('YEAR(created_at) AS year'),
                DB::raw('SUM(grand_total) AS total_amount')
            )
            ->groupBy(DB::raw('YEAR(created_at)'), DB::raw('MONTH(created_at)'))
            ->where(DB::raw('YEAR(created_at)'), "like", Carbon::now()->year)
            ->get();

            $incomeReportQuery = "
                SELECT
                    (SELECT sum(grand_total) FROM invoices WHERE deleted_at IS NULL AND created_at BETWEEN '$start' AND '$end' AND status LIKE '%Lunas%') AS sum_invoices,
                    (SELECT COUNT(*) FROM invoices WHERE deleted_at IS NULL AND created_at BETWEEN '$start' AND '$end') AS count_invoices,
                    (SELECT COUNT(*) FROM invoices WHERE deleted_at IS NULL AND created_at BETWEEN '$start' AND '$end' AND status LIKE '%Lunas%') AS count_invoices_paid,
                    (SELECT COUNT(*) FROM invoices WHERE deleted_at IS NULL AND created_at BETWEEN '$start' AND '$end' AND status != 'Lunas') AS count_invoices_not_paid
            ";
            $incomeReport = DB::select($incomeReportQuery)[0];
            $incomeReport->sum_invoice_per_month = $sumInvoicePerMonth;

            $ticketComplainQuery = "
                SELECT
                    (SELECT COUNT(*) FROM tickets WHERE deleted_at IS NULL AND created_at BETWEEN '$start' AND '$end') AS count_tickets,
                    (SELECT COUNT(*) FROM tickets WHERE deleted_at IS NULL AND created_at BETWEEN '$start' AND '$end' AND status LIKE '%wait a response%') AS count_tickets_waiting_for_response,
                    (SELECT COUNT(*) FROM tickets WHERE deleted_at IS NULL AND created_at BETWEEN '$start' AND '$end' AND status LIKE '%selesai%') AS count_completed_tickets
            ";
            $ticketComplain = DB::select($ticketComplainQuery)[0];

            $tableArr = ["work_orders", "material_requests", "purchase_requests", "purchase_orders"];
            $countDataQueryString = "SELECT ";

            foreach($tableArr as $tableName){
                $countQuery = "(SELECT COUNT(*) FROM $tableName WHERE deleted_at IS NULL AND created_at BETWEEN '$start' AND '$end') AS count_$tableName, ";

                $countDataQueryString = $countDataQueryString . $countQuery;
            }

            $countDataQueryString = $countDataQueryString . "(SELECT COUNT(*) FROM purchase_orders WHERE status LIKE '%disetujui bm%' AND deleted_at IS NULL AND created_at BETWEEN '$start' AND '$end') AS count_vendor_invoice";

            $countData = DB::select($countDataQueryString)[0];

            return [
                "income_report" => $incomeReport,
                "ticket_complain" => $ticketComplain,
                "statistic" => $countData,
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
