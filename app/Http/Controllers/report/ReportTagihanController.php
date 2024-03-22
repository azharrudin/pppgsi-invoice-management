<?php

namespace App\Http\Controllers\report;

use App\Exports\ReportTandaTerimaExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReportTagihanController extends Controller
{
    public function index()
    {
        return view("report.report-tagihan");
    }

    public function fileExport()
    {
        $apiRequest = Http::get(env('BASE_URL_API') .'/api/vendor-invoice/vendor-invoice-report-export');
        $response = json_decode($apiRequest->getBody());
        $data = $response->data;
        return Excel::download(new ReportTandaTerimaExport($data), 'report-tagihan.xlsx');
    }


}
