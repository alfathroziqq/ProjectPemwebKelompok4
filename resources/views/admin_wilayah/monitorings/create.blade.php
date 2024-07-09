@extends('admin_wilayah.master')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Tambah Data Monitoring</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="{{ asset('css/admin_wilayah.css') }}">
</head>

<body>
    <div class="container">
        <div class="card mt-4">
            <div class="card-header">
                <h2>Tambah Data Monitoring</h2>
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

                <form action="{{ route('monitoring.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="provinsi">Provinsi :</label>
                        <select class="form-control" id="provinsi" name="provinsi">
                            @foreach ($provinces as $province)
                                <option value="{{ $province }}" {{ old('provinsi', isset($monitoring) ? $monitoring->provinsi : '') == $province ? 'selected' : '' }}>{{ $province }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="latitude">Latitude :</label>
                        <input type="text" class="form-control" id="latitude" name="latitude" value="{{ old('latitude') }}" placeholder="Masukkan Latitude">
                    </div>
                    <div class="form-group">
                        <label for="longitude">Longitude :</label>
                        <input type="text" class="form-control" id="longitude" name="longitude" value="{{ old('longitude') }}" placeholder="Masukkan Longitude">
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi :</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" placeholder="Masukkan Deskripsi">{{ old('deskripsi') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="rumah_sehat">Rumah Sehat :</label>
                        <input class="form-control" type="number" id="rumah_sehat" name="rumah_sehat" placeholder="Masukkan Rumah Sehat">{{ old('rumah_sehat') }}</input>
                    </div>
                    <div class="form-group">
                        <label for="rumah_tidak_sehat">Rumah Tidak Sehat :</label>
                        <input class="form-control" type="number" id="rumah_tidak_sehat" name="rumah_tidak_sehat" placeholder="Masukkan Rumah Tidak Sehat">{{ old('rumah_tidak_sehat') }}</input>
                    </div>
                    <div class="form-group">
                        <label for="rumah_tidak_layak">Rumah Tidak Layak :</label>
                        <input class="form-control" type="number" id="rumah_tidak_layak" name="rumah_tidak_layak" placeholder="Masukkan Rumah Tidak Layak">{{ old('rumah_tidak_layak') }}</input>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('monitoring.index') }}" class="btn btn-secondary">Kembali</a>
                </form>

            </div>
        </div>
    </div>
</body>

</html>
@endsection
