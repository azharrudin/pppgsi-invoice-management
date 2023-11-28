<?php

namespace App\Http\Controllers\report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReportTandaTerimaController extends Controller
{
    public function index()
    {
        return view("report.report-tanda-terima");
    }
}
