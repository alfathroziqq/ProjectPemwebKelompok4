<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminisController extends Controller
{
    public function index()
    {
        return view('administrator.home_administrator');
    }
}
