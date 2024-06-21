<!-- resources/views/laporan_rumah/edit.blade.php -->

@extends('admin_wilayah.master')

@section('content')
<h1>Edit Laporan Rumah</h1>

@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('laporan_rumah.update', $laporanRumah->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div>
        <label for="rumah_id">Rumah:</label>
        <select name="rumah_id" id="rumah_id">
            @foreach ($rumahs as $rumah)
                <option value="{{ $rumah->id }}" {{ $rumah->id == $laporanRumah->rumah_id ? 'selected' : '' }}>
                    {{ $rumah->alamat }}
                </option>
            @endforeach
        </select>
    </div>
    <div>
        <label for="deskripsi">Deskripsi:</label>
        <textarea id="deskripsi" name="deskripsi">{{ $laporanRumah->deskripsi }}</textarea>
    </div>
    <div>
        <label for="tanggal_laporan">Tanggal Laporan:</label>
        <input type="date" id="tanggal_laporan" name="tanggal_laporan" value="{{ $laporanRumah->tanggal_laporan }}">
    </div>
    <button type="submit">Simpan Perubahan</button>
</form>
@endsection
