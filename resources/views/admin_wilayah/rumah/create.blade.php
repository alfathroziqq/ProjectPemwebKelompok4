@extends('admin_wilayah.master')

@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Tambah Rumah Baru</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="{{ asset('css/admin_wilayah.css') }}">

    </head>

    <body>
        <div class="container">
            <div class="card mt-4">
                <div class="card-header">
                    <h2>Tambah Rumah Baru</h2>
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

                    <form action="{{ route('rumah.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="kartu_keluarga_id">Kartu Keluarga :</label>
                            <select class="form-control" id="kartu_keluarga_id" name="kartu_keluarga_id">
                                @foreach ($kartuKeluargas as $kartuKeluarga)
                                    <option value="{{ $kartuKeluarga->id }}">{{ $kartuKeluarga->nomor_kk }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="alamat">Alamat :</label>
                            <input type="text" class="form-control" id="alamat" name="alamat"
                                value="{{ old('alamat') }}" placeholder="Masukkan Alamat">
                        </div>
                        <div class="form-group">
                            <label for="luas_rumah">Luas Rumah (m²) :</label>
                            <input type="number" class="form-control" id="luas_rumah" name="luas_rumah"
                                value="{{ old('luas_rumah') }}" placeholder="Masukkan Luas Rumah">
                        </div>
                        <div class="form-group">
                            <label for="jumlah_kamar">Jumlah Kamar :</label>
                            <input type="number" class="form-control" id="jumlah_kamar" name="jumlah_kamar"
                                value="{{ old('jumlah_kamar') }}" placeholder="Masukkan Jumlah Kamar">
                        </div>
                        <div class="form-group">
                            <label for="spesifikasi_rumah">Spesifikasi Rumah :</label>
                            <select class="form-control" id="spesifikasi_rumah" name="spesifikasi_rumah">
                                <option value="rumah sehat" {{ old('spesifikasi_rumah') == 'rumah sehat' ? 'selected' : '' }}>Rumah Sehat</option>
                                <option value="rumah tidak sehat" {{ old('spesifikasi_rumah') == 'rumah tidak sehat' ? 'selected' : '' }}>Rumah Tidak Sehat</option>
                                <option value="rumah tidak layak" {{ old('spesifikasi_rumah') == 'rumah tidak layak' ? 'selected' : '' }}>Rumah Tidak Layak</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('rumah.index') }}" class="btn btn-secondary">Kembali</a>

                    </form>
                </div>
            </div>
        </div>
    </body>

    </html>
@endsection
