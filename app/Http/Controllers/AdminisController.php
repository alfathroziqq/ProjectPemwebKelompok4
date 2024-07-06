<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminisController extends Controller
{
    public function index()
    {
        $countAdministrator = User::where('role', 'administrator')->count();
        $countAdminWilayah = User::where('role', 'admin_wilayah')->count();

        return view('administrator.home_administrator', compact('countAdministrator', 'countAdminWilayah'));
    }
}
