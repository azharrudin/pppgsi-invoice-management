<?php

namespace App\Http\Controllers\invoice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index()
    {
        return view('invoice.list-invoice');
    }
    
    public function add()
    {
        return view('invoice.add-invoice');
    }

    public function preview()
    {
        return view('invoice.preview-invoice');
    }
}
