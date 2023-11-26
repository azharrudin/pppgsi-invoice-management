<?php

namespace App\Http\Controllers\complain;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TicketListController extends Controller
{
    public function index()
    {
        return view('complain.ticket.list-ticket');
    }

    public function add()
    {
        return view('complain.ticket.add-ticket');
    }

    public function preview()
    {
        return view('complain.ticket.preview-ticket');
    }
}
