<!-- resources/views/wilayah/edit.blade.php -->

@extends('admin_wilayah.master')

@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Tambah Wilayah Baru</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="{{ asset('css/admin_wilayah.css') }}">
    </head>

    <body>
        <div class="container">
            <div class="card mt-4">
                <div class="card-header">
                    <h2>Tambah Wilayah Baru</h2>
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

                    <form action="{{ route('wilayah.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="nama_provinsi">Nama Provinsi :</label>
                            <select class="form-control" id="nama_provinsi" name="nama_provinsi">
                                <option value="">Pilih Provinsi</option>
                                @foreach ($provinces as $province)
                                    <option value="{{ $province }}">{{ $province }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('wilayah.index') }}" class="btn btn-secondary">Kembali</a>
                    </form>
                    
                </div>
            </div>
        </div>
    </body>

    </html>
@endsection
