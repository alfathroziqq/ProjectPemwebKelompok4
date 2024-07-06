<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\KartuKeluarga;
use App\Models\LaporanRumah;
use App\Models\Rumah;
use App\Models\Wilayah;
use Illuminate\Http\Request;

class AdminWilayahController extends Controller
{
    public function index()
    {
        $countWilayah = Wilayah::count();
        $countKK = KartuKeluarga::count();
        $countRumah = Rumah::count();
        $countLaporan = LaporanRumah::count();

        return view('admin_wilayah.home_admin_wilayah', compact('countWilayah', 'countKK', 'countRumah', 'countLaporan'));
    }
}
