<!-- resources/views/riwayat_perubahan_rumah/edit.blade.php -->

@extends('admin_wilayah.master')

@section('content')
<h1>Edit Riwayat Perubahan Rumah</h1>

@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('riwayat_perubahan_rumah.update', $riwayatPerubahanRumah->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div>
        <label for="rumah_id">Rumah:</label>
        <select name="rumah_id" id="rumah_id">
            @foreach ($rumahs as $rumah)
                <option value="{{ $rumah->id }}" {{ $rumah->id == $riwayatPerubahanRumah->rumah_id ? 'selected' : '' }}>{{ $rumah->alamat }}</option>
            @endforeach
        </select>
    </div>
    <div>
        <label for="perubahan">Perubahan:</label>
        <input type="text" id="perubahan" name="perubahan" value="{{ $riwayatPerubahanRumah->perubahan }}">
    </div>
    <div>
        <label for="tanggal_perubahan">Tanggal Perubahan:</label>
        <input type="date" id="tanggal_perubahan" name="tanggal_perubahan" value="{{ $riwayatPerubahanRumah->tanggal_perubahan }}">
    </div>
    <button type="submit">Simpan Perubahan</button>
</form>
@endsection
