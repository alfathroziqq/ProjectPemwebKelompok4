<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rumah;
use App\Models\KartuKeluarga;

class RumahController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $rumahs = Rumah::when($search, function ($query) use ($search) {
            $query->where('alamat', 'LIKE', '%' . $search . '%')
                ->orWhere('luas_rumah', 'LIKE', '%' . $search . '%')
                ->orWhere('jumlah_kamar', 'LIKE', '%' . $search . '%')
                ->orWhere('spesifikasi_rumah', 'LIKE', '%' . $search . '%');
        })
            ->paginate(10);

        return view('admin_wilayah.rumah.index', compact('rumahs'));
    }

    public function create()
    {
        $kartuKeluargas = KartuKeluarga::all();
        return view('admin_wilayah.rumah.create', compact('kartuKeluargas'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kartu_keluarga_id' => 'required',
            'alamat' => 'required',
            'luas_rumah' => 'required|integer',
            'jumlah_kamar' => 'required|integer',
            'spesifikasi_rumah' => 'required|in:rumah sehat,rumah tidak sehat,rumah tidak layak',
        ]);

        $rumah = Rumah::create($validatedData);

        return redirect()->route('rumah.index')->with('success', 'Rumah berhasil ditambahkan');
    }

    public function show($id)
    {
        $rumah = Rumah::findOrFail($id);
        return view('admin_wilayah.rumah.show', compact('rumah'));
    }

    public function edit($id)
    {
        $rumah = Rumah::findOrFail($id);
        $kartuKeluargas = KartuKeluarga::all();
        return view('admin_wilayah.rumah.edit', compact('rumah', 'kartuKeluargas'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'kartu_keluarga_id' => 'required',
            'alamat' => 'required',
            'luas_rumah' => 'required|integer',
            'jumlah_kamar' => 'required|integer',
            'spesifikasi_rumah' => 'required|in:rumah sehat,rumah tidak sehat,rumah tidak layak',
        ]);

        $rumah = Rumah::findOrFail($id);
        $rumah->update($validatedData);

        return redirect()->route('rumah.index')->with('success', 'Rumah berhasil diperbarui');
    }

    public function destroy($id)
    {
        $rumah = Rumah::findOrFail($id);
        $rumah->delete();

        return redirect()->route('rumah.index')->with('success', 'Rumah berhasil dihapus');
    }
}
