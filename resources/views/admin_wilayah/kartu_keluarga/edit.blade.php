<!-- resources/views/kartu_keluarga/edit.blade.php -->
@extends('admin_wilayah.master')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Edit Kartu Keluarga</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="{{ asset('css/admin_wilayah.css') }}">
</head>

<body>
    <div class="container">
        <div class="card mt-4">
            <div class="card-header">
                <h2>Edit Kartu Keluarga</h2>
            </div>

            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
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
                    <div class="form-group">
                        <label for="nomor_kk">Nomor KK:</label>
                        <input type="text" id="nomor_kk" name="nomor_kk" class="form-control" value="{{ $kartuKeluarga->nomor_kk }}">
                    </div>
                    <div class="form-group">
                        <label for="kepala_keluarga">Kepala Keluarga:</label>
                        <input type="text" id="kepala_keluarga" name="kepala_keluarga" class="form-control" value="{{ $kartuKeluarga->kepala_keluarga }}">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat:</label>
                        <input type="text" id="alamat" name="alamat" class="form-control" value="{{ $kartuKeluarga->alamat }}">
                    </div>
                    <div class="form-group">
                        <label for="wilayah_id">Provinsi:</label>
                        <select id="wilayah_id" name="wilayah_id" class="form-control">
                            @foreach($wilayahs as $wilayah)
                                <option value="{{ $wilayah->id }}" {{ $kartuKeluarga->wilayah_id == $wilayah->id ? 'selected' : '' }}>{{ $wilayah->nama_provinsi }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    <a href="{{ route('kartu_keluarga.index') }}" class="btn btn-secondary">Kembali</a>
                    
                </form>
            </div>
        </div>
    </div>
</body>

</html>
@endsection
