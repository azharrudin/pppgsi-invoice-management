<?php

namespace App\Http\Controllers\vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    public function index() {
        return view("vendor.list-tagihan-vendor");
    }
}
