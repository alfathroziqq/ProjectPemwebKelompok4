<!-- resources/views/wilayah/edit.blade.php -->

@extends('admin_wilayah.master')

@section('content')
<h1>Edit Wilayah</h1>

@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('wilayah.update', $wilayah->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div>
        <label for="nama_provinsi">Nama Provinsi:</label>
        <select id="nama_provinsi" name="nama_provinsi">
            <option value="">Pilih Provinsi</option>
            @foreach ($provinces as $province)
                <option value="{{ $province }}" {{ $province === $wilayah->nama_provinsi ? 'selected' : '' }}>
                    {{ $province }}
                </option>
            @endforeach
        </select>
    </div>
    <button type="submit">Simpan Perubahan</button>
</form>
@endsection
