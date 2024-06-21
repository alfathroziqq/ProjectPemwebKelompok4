<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KartuKeluarga;
use App\Models\Wilayah;

class KartuKeluargaController extends Controller
{
    public function index(Request $request)
    {
        $query = KartuKeluarga::with('wilayah');

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('nomor_kk', 'like', "%{$search}%")
                ->orWhere('kepala_keluarga', 'like', "%{$search}%")
                ->orWhere('alamat', 'like', "%{$search}%")
                ->orWhereHas('wilayah', function($q) use ($search) {
                    $q->where('nama_provinsi', 'like', "%{$search}%");
                });
        }

        $kartuKeluargas = $query->paginate(10);

        return view('admin_wilayah.kartu_keluarga.index', compact('kartuKeluargas'));
    }

    public function create()
    {
        $wilayahs = Wilayah::all();
        return view('admin_wilayah.kartu_keluarga.create', compact('wilayahs'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nomor_kk' => 'required|unique:kartu_keluargas',
            'kepala_keluarga' => 'required',
            'alamat' => 'required',
            'wilayah_id' => 'required|exists:wilayahs,id',
        ]);

        KartuKeluarga::create($validatedData);

        return redirect()->route('kartu_keluarga.index')->with('success', 'Kartu Keluarga berhasil ditambahkan');
    }

    public function show($id)
    {
        $kartuKeluarga = KartuKeluarga::with('wilayah')->findOrFail($id);
        return view('admin_wilayah.kartu_keluarga.show', compact('kartuKeluarga'));
    }

    public function edit($id)
    {
        $kartuKeluarga = KartuKeluarga::findOrFail($id);
        $wilayahs = Wilayah::all();
        return view('admin_wilayah.kartu_keluarga.edit', compact('kartuKeluarga', 'wilayahs'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nomor_kk' => 'required|unique:kartu_keluargas,nomor_kk,' . $id,
            'kepala_keluarga' => 'required',
            'alamat' => 'required',
            'wilayah_id' => 'required|exists:wilayahs,id',
        ]);

        $kartuKeluarga = KartuKeluarga::findOrFail($id);
        $kartuKeluarga->update($validatedData);

        return redirect()->route('kartu_keluarga.index')->with('success', 'Kartu Keluarga berhasil diperbarui');
    }

    public function destroy($id)
    {
        $kartuKeluarga = KartuKeluarga::findOrFail($id);
        $kartuKeluarga->delete();

        return redirect()->route('kartu_keluarga.index')->with('success', 'Kartu Keluarga berhasil dihapus');
    }
}
