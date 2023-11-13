<?php

namespace App\Http\Controllers\complain;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TicketListController extends Controller
{
    public function index()
    {
        return view('complain.list-ticket');
    }
}
