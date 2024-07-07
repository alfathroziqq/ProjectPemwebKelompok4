<!-- resources/views/riwayat_perubahan_rumah/create.blade.php -->

@extends('admin_wilayah.master')

@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Tambah Riwayat Perubahan Rumah Baru</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="{{ asset('css/admin_wilayah.css') }}">
    </head>

    <body>
        <div class="container">
            <div class="card mt-4">
                <div class="card-header">
                    <h2>Tambah Riwayat Perubahan Rumah Baru</h2>
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

                    <form action="{{ route('riwayat_perubahan_rumah.store') }}" method="POST">
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
                            <label for="perubahan">Perubahan :</label>
                            <input type="text" class="form-control" id="perubahan" name="perubahan"
                                value="{{ old('perubahan') }}" placeholder="Masukkan Perubahan">
                        </div>
                        <div class="form-group">
                            <label for="tanggal_perubahan">Tanggal Perubahan :</label>
                            <input type="date" class="form-control" id="tanggal_perubahan" name="tanggal_perubahan"
                                value="{{ old('tanggal_perubahan') }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('riwayat_perubahan_rumah.index') }}" class="btn btn-secondary">Kembali</a>
                    </form>
                    
                </div>
            </div>
        </div>
    </body>

    </html>
@endsection
