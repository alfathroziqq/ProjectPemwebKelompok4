<!-- resources/views/kartu_keluarga/create.blade.php -->
@extends('admin_wilayah.master')

@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Tambah Kartu Keluarga Baru</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="{{ asset('css/admin_wilayah.css') }}">
    </head>

    <body>
        <div class="container">
            <div class="card mt-4">
                <div class="card-header">
                    <h2>Tambah Kartu Keluarga Baru</h2>
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
                    <form action="{{ route('kartu_keluarga.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="nomor_kk">Nomor KK :</label>
                            <input type="text" class="form-control" id="nomor_kk" name="nomor_kk"
                                value="{{ old('nomor_kk') }}" placeholder="Masukkan Nomor KK">
                        </div>
                        <div class="form-group">
                            <label for="kepala_keluarga">Kepala Keluarga :</label>
                            <input type="text" class="form-control" id="kepala_keluarga" name="kepala_keluarga"
                                value="{{ old('kepala_keluarga') }}" placeholder="Masukkan Kepala Keluarga">
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat :</label>
                            <input type="text" class="form-control" id="alamat" name="alamat"
                                value="{{ old('alamat') }}" placeholder="Masukkan Alamat">
                        </div>
                        <div class="form-group">
                            <label for="wilayah_id">Provinsi :</label>
                            <select class="form-control" id="wilayah_id" name="wilayah_id">
                                @foreach ($wilayahs as $wilayah)
                                    <option value="{{ $wilayah->id }}">{{ $wilayah->nama_provinsi }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('kartu_keluarga.index') }}" class="btn btn-secondary">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </body>

    </html>
@endsection
