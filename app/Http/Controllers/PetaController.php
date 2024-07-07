<?php

namespace App\Http\Controllers;

use App\Models\Monitoring;
use Illuminate\Http\Request;

class PetaController extends Controller
{
    public function index(Request $request)
    {
        $page_title = "Data Peta";
        $monitoring = Monitoring::all();


        if ($request->url() === url('peta_view')) {
            return view('peta_view', compact('monitoring'));
        }

        return view('admin_wilayah.peta.index', compact('page_title', 'monitoring'));
    }
}
