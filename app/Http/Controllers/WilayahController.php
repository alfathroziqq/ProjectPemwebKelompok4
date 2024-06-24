<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wilayah;
use Barryvdh\DomPDF\Facade\Pdf;

class WilayahController extends Controller
{
    public function index(Request $request)
    {
        $query = Wilayah::withCount('kartuKeluargas');

        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where('nama_provinsi', 'like', '%' . $search . '%');
        }

        $wilayahs = $query->paginate(10);

        return view('admin_wilayah.wilayah.index', compact('wilayahs'));
    }

    public function pdf()
    {
        $wilayahs = Wilayah::withCount('kartuKeluargas')->get();

        $pdf = Pdf::loadView('admin_wilayah.wilayah.pdf', compact('wilayahs'));
        return $pdf->stream('daftar_wilayah.pdf');
    }

    public function create()
    {
        $provinces = $this->getProvinces();
        return view('admin_wilayah.wilayah.create', compact('provinces'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_provinsi' => 'required',
        ]);

        Wilayah::create($validatedData);

        return redirect()->route('wilayah.index')->with('success', 'Wilayah berhasil ditambahkan');
    }

    public function edit($id)
    {
        $wilayah = Wilayah::findOrFail($id);
        $provinces = $this->getProvinces();
        return view('admin_wilayah.wilayah.edit', compact('wilayah', 'provinces'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama_provinsi' => 'required',
        ]);

        $wilayah = Wilayah::findOrFail($id);
        $wilayah->update($validatedData);

        return redirect()->route('wilayah.index')->with('success', 'Wilayah berhasil diperbarui');
    }

    public function destroy($id)
    {
        $wilayah = Wilayah::findOrFail($id);
        $wilayah->delete();

        return redirect()->route('wilayah.index')->with('success', 'Wilayah berhasil dihapus');
    }

    private function getProvinces()
    {
        return [
            'Aceh',
            'Bali',
            'Banten',
            'Bengkulu',
            'DI Yogyakarta',
            'DKI Jakarta',
            'Gorontalo',
            'Jambi',
            'Jawa Barat',
            'Jawa Tengah',
            'Jawa Timur',
            'Kalimantan Barat',
            'Kalimantan Selatan',
            'Kalimantan Tengah',
            'Kalimantan Timur',
            'Kalimantan Utara',
            'Kepulauan Bangka Belitung',
            'Kepulauan Riau',
            'Lampung',
            'Maluku',
            'Maluku Utara',
            'Nusa Tenggara Barat',
            'Nusa Tenggara Timur',
            'Papua',
            'Papua Barat',
            'Papua Selatan',
            'Papua Tengah',
            'Papua Pegunungan',
            'Riau',
            'Sulawesi Barat',
            'Sulawesi Selatan',
            'Sulawesi Tengah',
            'Sulawesi Tenggara',
            'Sulawesi Utara',
            'Sumatera Barat',
            'Sumatera Selatan',
            'Sumatera Utara'
        ];
    }
}
