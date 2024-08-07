<?php

namespace App\Http\Controllers;

use App\Models\LaporanRumah;
use App\Models\Rumah;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\LaporanRumahExport;
use Maatwebsite\Excel\Facades\Excel;

class LaporanRumahController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $laporanRumahs = LaporanRumah::with('rumah')
            ->when($search, function ($query) use ($search) {
                $query->whereHas('rumah', function ($query) use ($search) {
                    $query->where('alamat', 'LIKE', '%' . $search . '%');
                });
            })
            ->paginate(10);

            if ($request->url() === url('laporan_view')) {
                return view('laporan_view', compact('laporanRumahs'));
            }

        return view('admin_wilayah.laporan_rumah.index', compact('laporanRumahs'));
    }

    public function create()
    {
        $rumahs = Rumah::all();
        return view('admin_wilayah.laporan_rumah.create', compact('rumahs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'rumah_id' => 'required|exists:rumahs,id',
            'deskripsi' => 'required',
            'tanggal_laporan' => 'required|date',
        ]);

        LaporanRumah::create($request->all());

        return redirect()->route('laporan_rumah.index')->with('success', 'Laporan Rumah berhasil ditambahkan.');
    }

    public function show($id)
    {
        $laporanRumah = LaporanRumah::with('rumah')->findOrFail($id);
        return view('admin_wilayah.laporan_rumah.show', compact('laporanRumah'));
    }

    public function edit($id)
    {
        $laporanRumah = LaporanRumah::findOrFail($id);
        $rumahs = Rumah::all();
        return view('admin_wilayah.laporan_rumah.edit', compact('laporanRumah', 'rumahs'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'rumah_id' => 'required|exists:rumahs,id',
            'deskripsi' => 'required',
            'tanggal_laporan' => 'required|date',
        ]);

        $laporanRumah = LaporanRumah::findOrFail($id);
        $laporanRumah->update($request->all());

        return redirect()->route('laporan_rumah.index')->with('success', 'Laporan Rumah berhasil diupdate.');
    }

    public function destroy($id)
    {
        $laporanRumah = LaporanRumah::findOrFail($id);
        $laporanRumah->delete();

        return redirect()->route('laporan_rumah.index')->with('success', 'Laporan Rumah berhasil dihapus.');
    }

    public function laporanpdf()
    {
        $laporanRumahs = LaporanRumah::with('rumah')->get();
        $pdf = Pdf::loadView('admin_wilayah.laporan_rumah.pdf', compact('laporanRumahs'));
        return $pdf->download('DaftarLaporan.pdf');
    }

    public function laporanexport()
    {
        return Excel::download(new LaporanRumahExport, 'DaftarLaporan.xlsx');
    }
}
