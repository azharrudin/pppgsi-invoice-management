<?php

namespace App\Http\Controllers\settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ListUserController extends Controller
{
    public function index()
    {
        return view("settings.list-user");
    }
}
