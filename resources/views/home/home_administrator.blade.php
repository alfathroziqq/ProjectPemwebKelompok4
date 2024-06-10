<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manusia Pintar 2024</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@500&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: "Raleway", sans-serif;
        }
        .header, .footer {
            background-color: #333;
            color: white;
            padding: 20px 0;
            text-align: center;
        }
        .content {
            padding: 20px;
        }
        .card {
            margin-bottom: 20px;
        }
        .list-group-item {
            background-color: #f8f9fa;
            border: none;
        }
        .list-group-item.active {
            background-color: #ffc107;
            border-color: #ffc107;
        }
        .list-group-item .dropdown-toggle::after {
            display: none;
        }
        .map {
            background-color: #e9ecef;
            height: 300px;
            text-align: center;
            line-height: 300px;
            color: #6c757d;
        }
    </style>
</head>
<body>

<div class="header">
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <img src="{{ asset('path/to/logo.png') }}" alt="Logo" class="img-fluid">
            </div>
            <div class="col-md-10">
                <nav class="nav justify-content-end">
                    <a class="nav-link text-white" href="#">Beranda</a>
                    <a class="nav-link text-white" href="#">Panduan</a>
                    <a class="nav-link text-white" href="#">FAQ</a>
                    <a class="nav-link text-white" href="#">Login</a>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="content container">
    <div class="row mb-3">
        <div class="col">
            <button class="btn btn-secondary btn-block">Pengumuman</button>
        </div>
        <div class="col">
            <button class="btn btn-secondary btn-block">Lihat Semua</button>
        </div>
    </div>

    <h3 class="text-center mb-4">Jenis-Jenis Manusia Pintar 2024</h3>

    <div class="row">
        <div class="col-md-4">
            <div class="list-group">
                <button class="list-group-item list-group-item-action dropdown-toggle" data-toggle="collapse" data-target="#layananManusiaPintar" aria-expanded="false" aria-controls="layananManusiaPintar">
                    Layanan Manusia Pintar
                </button>
                <div class="collapse" id="layananManusiaPintar">
                    <a class="list-group-item list-group-item-action">Sub Layanan 1</a>
                    <a class="list-group-item list-group-item-action">Sub Layanan 2</a>
                </div>

                <button class="list-group-item list-group-item-action dropdown-toggle" data-toggle="collapse" data-target="#layananData1" aria-expanded="false" aria-controls="layananData1">
                    Layanan Data
                </button>
                <div class="collapse" id="layananData1">
                    <a class="list-group-item list-group-item-action">Sub Layanan 1</a>
                    <a class="list-group-item list-group-item-action">Sub Layanan 2</a>
                </div>

                <button class="list-group-item list-group-item-action dropdown-toggle" data-toggle="collapse" data-target="#layananData2" aria-expanded="false" aria-controls="layananData2">
                    Layanan Data
                </button>
                <div class="collapse" id="layananData2">
                    <a class="list-group-item list-group-item-action">Sub Layanan 1</a>
                    <a class="list-group-item list-group-item-action">Sub Layanan 2</a>
                </div>

                <button class="list-group-item list-group-item-action dropdown-toggle" data-toggle="collapse" data-target="#layananData3" aria-expanded="false" aria-controls="layananData3">
                    Layanan Data
                </button>
                <div class="collapse" id="layananData3">
                    <a class="list-group-item list-group-item-action">Sub Layanan 1</a>
                    <a class="list-group-item list-group-item-action">Sub Layanan 2</a>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-body text-center">
                    <div class="rounded-circle bg-warning mx-auto" style="width: 100px; height: 100px;"></div>
                    <button class="btn btn-warning mt-3">Tampilkan Deskripsi</button>
                </div>
            </div>
        </div>
    </div>

    <h4 class="text-center my-4">Peta</h4>
    <div class="text-center mb-3">
        <button class="btn btn-info mx-1">Peta</button>
        <button class="btn btn-info mx-1">Perumah Sakit</button>
        <button class="btn btn-info mx-1">Perumah Sakit</button>
        <button class="btn btn-info mx-1">Perumah Sakit</button>
    </div>
    <div class="map">
        GAMBAR PETA AAAAAAAAAAAAAAAAAAAA
    </div>
</div>

<div class="footer">
    Footer content here
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
