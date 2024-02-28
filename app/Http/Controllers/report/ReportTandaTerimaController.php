<?php

namespace App\Http\Controllers\report;

use App\Exports\ReportTandaTerimaExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Http;

class ReportTandaTerimaController extends Controller
{
    public function index()
    {
        return view("report.report-tanda-terima");
    }

    public function fileExport()
    {
        $apiRequest = Http::get(env('BASE_URL_API') .'/api/receipt/receipt-report-export');
        $response = json_decode($apiRequest->getBody());
        $data = $response->data;
        return Excel::download(new ReportTandaTerimaExport($data), 'report-tanda-terima.xlsx');
    }
}
