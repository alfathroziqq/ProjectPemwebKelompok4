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

        // Chart KK
        $kkPerWilayah = KartuKeluarga::select('wilayah_id', \DB::raw('count(*) as total'))
            ->groupBy('wilayah_id')
            ->with('wilayah')
            ->get();

        $labelsKK = $kkPerWilayah->pluck('wilayah.nama_provinsi')->toArray();
        $countsKK = $kkPerWilayah->pluck('total')->toArray();

        // Chart Spesifikasi
        $countRumahSehat = Rumah::where('spesifikasi_rumah', 'rumah sehat')->count();
        $countRumahTidakSehat = Rumah::where('spesifikasi_rumah', 'rumah tidak sehat')->count();
        $countRumahTidakLayak = Rumah::where('spesifikasi_rumah', 'rumah tidak layak')->count();

        return view('admin_wilayah.home_admin_wilayah', compact('countWilayah', 'countKK', 'countRumah', 'countLaporan', 'labelsKK', 'countsKK', 'countRumahSehat', 'countRumahTidakSehat', 'countRumahTidakLayak'));
    }
}
