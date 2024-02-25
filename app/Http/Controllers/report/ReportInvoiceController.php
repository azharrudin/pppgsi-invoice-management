<?php

namespace App\Http\Controllers\report;

use App\Exports\ReportInvoiceExport;
use App\Http\Controllers\Controller;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Http;

class ReportInvoiceController extends Controller
{
    public function index()
    {
        return view("report.report-invoice");
    }

    public function fileExport()
    {
        $apiRequest = Http::get(env('BASE_URL_API') .'/api/invoice/invoice-report-export');
        $response = json_decode($apiRequest->getBody());
        $data = $response->data;
        return Excel::download(new ReportInvoiceExport($data), 'report-invoice.xlsx');
    }
}
