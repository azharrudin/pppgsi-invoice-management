<?php

namespace App\Http\Controllers\settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TaxRatesController extends Controller
{
    public function index() {
        return view("settings.tax-rates.list");
    }
    
    public function create()
    {
        return view('settings.tax-rates.add');
    }    
}
