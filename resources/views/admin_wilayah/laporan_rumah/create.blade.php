<!-- resources/views/laporan_rumah/create.blade.php -->

@extends('admin_wilayah.master')

@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Tambah Laporan Rumah Baru</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="{{ asset('css/admin_wilayah.css') }}">
    </head>

    <body>
        <div class="container">
            <div class="card mt-4">
                <div class="card-header">
                    <h2>Tambah Laporan Rumah Baru</h2>
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

                    <form action="{{ route('laporan_rumah.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="rumah_id">Rumah :</label>
                            <select class="form-control" id="rumah_id" name="rumah_id">
                                @foreach ($rumahs as $rumah)
                                    <option value="{{ $rumah->id }}">{{ $rumah->alamat }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi :</label>
                            <textarea class="form-control" id="deskripsi" name="deskripsi"
                                placeholder="Masukkan Deskripsi">{{ old('deskripsi') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="tanggal_laporan">Tanggal Laporan :</label>
                            <input type="date" class="form-control" id="tanggal_laporan" name="tanggal_laporan"
                                value="{{ old('tanggal_laporan') }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('laporan_rumah.index') }}" class="btn btn-secondary">Kembali</a>
                    </form>
                    
                </div>
            </div>
        </div>
    </body>

    </html>
@endsection
