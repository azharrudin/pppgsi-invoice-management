<?php

namespace App\Http\Controllers\request;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PurchaseRequestController extends Controller
{
    public function index()
    {
        return view('request.list-purchase');
    }

    public function add()
    {
        return view('request.add-purchase');
    }
}
