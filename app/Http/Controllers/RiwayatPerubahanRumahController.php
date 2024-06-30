<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RiwayatPerubahanRumah;
use App\Models\Rumah;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\RiwayatPerubahanRumahExport;
use Maatwebsite\Excel\Facades\Excel;

class RiwayatPerubahanRumahController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $riwayatPerubahanRumahs = RiwayatPerubahanRumah::with('rumah')
            ->when($search, function ($query) use ($search) {
                $query->whereHas('rumah', function ($query) use ($search) {
                    $query->where('alamat', 'LIKE', '%' . $search . '%');
                });
            })
            ->paginate(10);

        return view('admin_wilayah.riwayat_perubahan_rumah.index', compact('riwayatPerubahanRumahs'));
    }

    public function create()
    {
        $rumahs = Rumah::all();
        return view('admin_wilayah.riwayat_perubahan_rumah.create', compact('rumahs'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'rumah_id' => 'required',
            'perubahan' => 'required',
            'tanggal_perubahan' => 'required|date',
        ]);

        $riwayatPerubahanRumah = RiwayatPerubahanRumah::create($validatedData);

        return redirect()->route('riwayat_perubahan_rumah.index')->with('success', 'Riwayat Perubahan Rumah berhasil ditambahkan');
    }

    public function show($id)
    {
        $riwayatPerubahanRumah = RiwayatPerubahanRumah::findOrFail($id);
        return view('admin_wilayah.riwayat_perubahan_rumah.show', compact('riwayatPerubahanRumah'));
    }

    public function edit($id)
    {
        $riwayatPerubahanRumah = RiwayatPerubahanRumah::findOrFail($id);
        $rumahs = Rumah::all();
        return view('admin_wilayah.riwayat_perubahan_rumah.edit', compact('riwayatPerubahanRumah', 'rumahs'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'rumah_id' => 'required',
            'perubahan' => 'required',
            'tanggal_perubahan' => 'required|date',
        ]);

        $riwayatPerubahanRumah = RiwayatPerubahanRumah::findOrFail($id);
        $riwayatPerubahanRumah->update($validatedData);

        return redirect()->route('riwayat_perubahan_rumah.index')->with('success', 'Riwayat Perubahan Rumah berhasil diperbarui');
    }

    public function destroy($id)
    {
        $riwayatPerubahanRumah = RiwayatPerubahanRumah::findOrFail($id);
        $riwayatPerubahanRumah->delete();

        return redirect()->route('riwayat_perubahan_rumah.index')->with('success', 'Riwayat Perubahan Rumah berhasil dihapus');
    }

    public function riwayatpdf()
    {
        $riwayatPerubahanRumahs = RiwayatPerubahanRumah::with('rumah')->get();
        $pdf = Pdf::loadView('admin_wilayah.riwayat_perubahan_rumah.pdf', compact('riwayatPerubahanRumahs'));
        return $pdf->download('DaftarRiwayat.pdf');
    }

    public function riwayatexport()
    {
        return Excel::download(new RiwayatPerubahanRumahExport, 'DaftarRiwayat.xlsx');
    }
}
