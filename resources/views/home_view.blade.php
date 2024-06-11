<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home View Penonton</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@500&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: "Raleway", sans-serif;
        }

        .nav-link {
            position: relative;
            display: inline-block;
            padding-bottom: 5px;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            width: 100%;
            height: 2px;
            display: block;
            margin-top: 5px;
            right: 0;
            background: white;
            opacity: 0;
            transition: opacity 0.2s ease;
        }

        .nav-link:hover::after {
            opacity: 1;
        }

        .header,
        .footer {
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

        .large-image {
            background-color: #6c757d;
            height: 200px;
            width: 100%;
            margin-bottom: 20px;
            text-align: center;
            line-height: 200px;
            color: white;
            font-size: 24px;
            border-radius: 40px;
        }

        .announcement-bar {
            background-color: #5a6d6f;
            color: #ffc107;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
        }

        .announcement-bar a {
            color: #ffc107;
            text-decoration: none;
        }

        .announcement-bar a:hover {
            text-decoration: underline;
        }

        .announcement-icon {
            margin-right: 10px;
        }

        .announcement-content {
            background-color: #D9D9D9;
            padding: 20px;
            border-radius: 10px;
            margin-top: 10px;
            color: black;
        }
    </style>
</head>

<body>

    <div class="header">
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <img src="{{ URL('images/rumahmiskin.png') }}" alt="Logo" class="img-fluid" width="50">
                </div>
                <div class="col-md-10">
                    <nav class="nav justify-content-end">
                        <a class="nav-link text-white" href="#">Beranda</a>
                        <a class="nav-link text-white" href="#">Panduan</a>
                        <a class="nav-link text-white" href="#">FAQ</a>
                        <a class="nav-link text-white" href="{{ route('formlogin') }}">Login</a>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="content container">
        <img src="{{ URL('images/gambarportal.png') }}" alt="Index" class="img-fluid" width="1100"
            style="margin-bottom: 20px;">

        <div class="announcement-bar">
            <div class="d-flex justify-content-between align-items-center">
                <a href="#" class="announcement-link">
                    <img src="{{ URL('images/pengumuman.png') }}" alt="Pengumuman Icon" class="announcement-icon"
                        width="40">
                    Pengumuman
                </a>
            </div>
            <div class="announcement-content">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent vehicula, ligula eu pellentesque
                    fermentum, justo metus dictum urna, eget ullamcorper lorem ex nec lectus. Integer venenatis feugiat
                    eros, at cursus odio convallis eget. Morbi vestibulum ligula a sapien fringilla, at venenatis ipsum
                    vestibulum. Nunc placerat libero ut dolor sagittis, ac cursus lorem auctor. Donec sed augue nec urna
                    consectetur hendrerit. Sed sit amet metus ut nulla euismod consequat. Curabitur accumsan dui eu
                    justo sollicitudin, nec lacinia urna venenatis. Aenean tincidunt magna vel sem sagittis, non
                    vestibulum lacus facilisis. Cras posuere arcu at eros ullamcorper, vel elementum sem posuere. Fusce
                    non odio sapien.</p>
            </div>
        </div>

        <h3 class="text-center mb-4">Jenis-Jenis Manusia Pintar 2024</h3>

        <div class="row">
            <div class="col-md-4">
                <div class="list-group">
                    <button class="list-group-item list-group-item-action dropdown-toggle" data-toggle="collapse"
                        data-target="#layananManusiaPintar" aria-expanded="false" aria-controls="layananManusiaPintar">
                        Layanan Manusia Pintar
                    </button>
                    <div class="collapse" id="layananManusiaPintar">
                        <a class="list-group-item list-group-item-action">Sub Layanan 1</a>
                        <a class="list-group-item list-group-item-action">Sub Layanan 2</a>
                    </div>

                    <button class="list-group-item list-group-item-action dropdown-toggle" data-toggle="collapse"
                        data-target="#layananData1" aria-expanded="false" aria-controls="layananData1">
                        Layanan Data
                    </button>
                    <div class="collapse" id="layananData1">
                        <a class="list-group-item list-group-item-action">Sub Layanan 1</a>
                        <a class="list-group-item list-group-item-action">Sub Layanan 2</a>
                    </div>

                    <button class="list-group-item list-group-item-action dropdown-toggle" data-toggle="collapse"
                        data-target="#layananData2" aria-expanded="false" aria-controls="layananData2">
                        Layanan Data
                    </button>
                    <div class="collapse" id="layananData2">
                        <a class="list-group-item list-group-item-action">Sub Layanan 1</a>
                        <a class="list-group-item list-group-item-action">Sub Layanan 2</a>
                    </div>

                    <button class="list-group-item list-group-item-action dropdown-toggle" data-toggle="collapse"
                        data-target="#layananData3" aria-expanded="false" aria-controls="layananData3">
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