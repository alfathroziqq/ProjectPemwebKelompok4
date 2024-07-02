<!-- resources/views/rumah/edit.blade.php -->
@extends('admin_wilayah.master')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Edit Rumah</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="{{ asset('css/admin_wilayah.css') }}">
</head>

<body>
    <div class="container">
        <div class="card mt-4">
            <div class="card-header">
                <h2>Edit Rumah</h2>
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
                <form action="{{ route('rumah.update', $rumah->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="kartu_keluarga_id">Kartu Keluarga:</label>
                        <select name="kartu_keluarga_id" id="kartu_keluarga_id" class="form-control">
                            @foreach ($kartuKeluargas as $kartuKeluarga)
                                <option value="{{ $kartuKeluarga->id }}" {{ $kartuKeluarga->id == $rumah->kartu_keluarga_id ? 'selected' : '' }}>
                                    {{ $kartuKeluarga->nomor_kk }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat:</label>
                        <input type="text" id="alamat" name="alamat" class="form-control" value="{{ $rumah->alamat }}">
                    </div>
                    <div class="form-group">
                        <label for="luas_rumah">Luas Rumah:</label>
                        <input type="number" id="luas_rumah" name="luas_rumah" class="form-control" value="{{ $rumah->luas_rumah }}">
                    </div>
                    <div class="form-group">
                        <label for="jumlah_kamar">Jumlah Kamar:</label>
                        <input type="number" id="jumlah_kamar" name="jumlah_kamar" class="form-control" value="{{ $rumah->jumlah_kamar }}">
                    </div>
                    <div class="form-group">
                        <label for="spesifikasi_rumah">Spesifikasi Rumah:</label>
                        <select name="spesifikasi_rumah" id="spesifikasi_rumah" class="form-control">
                            <option value="rumah sehat" {{ $rumah->spesifikasi_rumah == 'rumah sehat' ? 'selected' : '' }}>Rumah Sehat</option>
                            <option value="rumah tidak sehat" {{ $rumah->spesifikasi_rumah == 'rumah tidak sehat' ? 'selected' : '' }}>Rumah Tidak Sehat</option>
                            <option value="rumah tidak layak" {{ $rumah->spesifikasi_rumah == 'rumah tidak layak' ? 'selected' : '' }}>Rumah Tidak Layak</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    <a href="{{ route('rumah.index') }}" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
@endsection
