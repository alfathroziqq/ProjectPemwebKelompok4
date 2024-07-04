<?php

namespace App\Http\Controllers;

use App\Models\Monitoring;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\MonitoringExport;
use Maatwebsite\Excel\Facades\Excel;

class MonitoringController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $page_title = "Data Monitoring";

    $query = Monitoring::query();

    if ($request->has('search') && !empty($request->search)) {
        $search = $request->search;
        $query->where('provinsi', 'like', '%' . $search . '%')
        ->orWhere('deskripsi', 'like', '%' . $search . '%');
    }

    $Monitorings = $query->paginate(10);

    return view('admin_wilayah.monitorings.index', compact('page_title', 'Monitorings'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $provinces = $this->getProvinces();
        $page_title = "Tambah Data Monitoring";
        return view('admin_wilayah.monitorings.create', compact('page_title', 'provinces'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated_data = $request->validate([
            'provinsi' => 'required|string|max:100',
            'latitude' => 'required|numeric|between:-90.0,90.0',
            'longitude' => 'required|numeric|between:-180.0,180.0',
            'deskripsi' => 'nullable|string',
        ]);

        try {
            Monitoring::create($validated_data);
            $message = "Berhasil menambahkan data monitoring.";
        } catch (\Throwable $err) {
            $message = "Error: " . $err->getMessage();
            throw $err;
        }

        return redirect()->route('monitoring.index')->with('message', $message);
    }

    /**
     * Display the specified resource.
     */
    public function show(Monitoring $monitoring)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Monitoring $monitoring)
    {
        $provinces = $this->getProvinces();
        $page_title = "Edit Data Monitoring";
        return view('admin_wilayah.monitorings.edit', compact('page_title', 'monitoring', 'provinces'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Monitoring $monitoring)
    {
        $validated_data = $request->validate([
            'provinsi' => 'required|string|max:100',
            'latitude' => 'required|numeric|between:-90,90',
            'longitude' => 'required|numeric|between:-180,180',
            'deskripsi' => 'nullable|string',
        ]);

        $monitoring->update($validated_data);
        $message = "Berhasil mengubah data monitoring.";
        return redirect()->route('monitoring.index')->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Monitoring $monitoring)
    {
        $monitoring->delete();
        $message = "Berhasil menghapus data monitoring.";
        return redirect()->route('monitoring.index')->with('message', $message);
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

    public function monitoringpdf()
    {
        $monitorings = Monitoring::all();
        $pdf = PDF::loadView('admin_wilayah.monitorings.pdf', compact('monitorings'));

        return $pdf->download('DaftarMonitoring.pdf');
    }

    public function monitoringexport()
    {
        return Excel::download(new MonitoringExport, 'DaftarMonitoring.xlsx');
    }
}
