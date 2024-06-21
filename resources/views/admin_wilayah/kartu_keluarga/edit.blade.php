<!-- resources/views/kartu_keluarga/edit.blade.php -->
@extends('admin_wilayah.master')

@section('content')
<h1>Edit Kartu Keluarga</h1>

@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('kartu_keluarga.update', $kartuKeluarga->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div>
        <label for="nomor_kk">Nomor KK:</label>
        <input type="text" id="nomor_kk" name="nomor_kk" value="{{ $kartuKeluarga->nomor_kk }}">
    </div>
    <div>
        <label for="kepala_keluarga">Kepala Keluarga:</label>
        <input type="text" id="kepala_keluarga" name="kepala_keluarga" value="{{ $kartuKeluarga->kepala_keluarga }}">
    </div>
    <div>
        <label for="alamat">Alamat:</label>
        <input type="text" id="alamat" name="alamat" value="{{ $kartuKeluarga->alamat }}">
    </div>
    <div>
        <label for="wilayah_id">Provinsi:</label>
        <select id="wilayah_id" name="wilayah_id">
            @foreach($wilayahs as $wilayah)
                <option value="{{ $wilayah->id }}" {{ $kartuKeluarga->wilayah_id == $wilayah->id ? 'selected' : '' }}>{{ $wilayah->nama_provinsi }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit">Simpan Perubahan</button>
</form>
@endsection
