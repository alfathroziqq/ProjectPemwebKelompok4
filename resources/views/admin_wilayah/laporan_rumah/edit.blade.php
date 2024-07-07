<!-- resources/views/laporan_rumah/edit.blade.php -->

@extends('admin_wilayah.master')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Edit Laporan Rumah</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="{{ asset('css/admin_wilayah.css') }}">
</head>

<body>
    <div class="container">
        <div class="card mt-4">
            <div class="card-header">
                <h2>Edit Laporan Rumah</h2>
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

                <form action="{{ route('laporan_rumah.update', $laporanRumah->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="rumah_id">Rumah:</label>
                        <select name="rumah_id" id="rumah_id" class="form-control">
                            @foreach ($rumahs as $rumah)
                                <option value="{{ $rumah->id }}" {{ $rumah->id == $laporanRumah->rumah_id ? 'selected' : '' }}>
                                    {{ $rumah->alamat }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi:</label>
                        <textarea id="deskripsi" name="deskripsi" class="form-control">{{ $laporanRumah->deskripsi }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_laporan">Tanggal Laporan:</label>
                        <input type="date" id="tanggal_laporan" name="tanggal_laporan" class="form-control" value="{{ $laporanRumah->tanggal_laporan }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    <a href="{{ route('laporan_rumah.index') }}" class="btn btn-secondary">Kembali</a>
                </form>
                
            </div>
        </div>
    </div>
</body>

</html>
@endsection
