<?php

namespace App\Http\Controllers\report;

use App\Exports\ReportInvoiceExport;
use App\Http\Controllers\Controller;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ReportInvoiceController extends Controller
{
    public function index()
    {
        return view("report.report-invoice");
    }

    public function fileExport() 
    {
        return Excel::download(new ReportInvoiceExport(), 'users-collection.xlsx');
    }        
}
