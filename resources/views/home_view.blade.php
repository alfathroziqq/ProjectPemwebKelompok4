<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home View Penonton</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@500&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
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

        /* Custom styles for the modal forms */
        .modal-content {
            background-color: #f2f2f2;
            border-radius: 10px;
            padding: 20px;
        }

        .modal-header {
            border-bottom: none;
        }

        .form-control {
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .btn-login {
            background-color: #ffc107;
            color: white;
            border-radius: 5px;
            width: 100%;
        }

        .btn-register {
            background-color: #ffc107;
            color: white;
            border-radius: 5px;
            width: 100%;
        }

        .modal-footer {
            border-top: none;
        }

        .modal-title {
            font-size: 24px;
        }

        .text-link {
            color: #ffc107;
            text-decoration: none;
        }

        .text-link:hover {
            text-decoration: underline;
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
                        <a class="nav-link text-white" href="#" data-toggle="modal"
                            data-target="#loginModal">Login</a>
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
        <div class="map">
            Peta Interaktif
        </div>

    </div>

    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-left">
                    &copy; 2024 Rumah Miskin
                </div>
                <div class="col-md-6 text-center text-md-right">
                    <a href="#" class="text-white">Privacy Policy</a> | <a href="#" class="text-white">Terms
                        of Service</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Login Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Login</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" value="{{ old('username') }}" name="username" id="username" placeholder="Masukkan Username"
                                class="form-control" required>
                            @error('username')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" id="password" placeholder="Masukkan Password" class="form-control" required>
                            @error('password')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-login">Login</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <p class="mr-auto">Belum punya akun? <a href="#" class="text-link" data-toggle="modal"
                            data-target="#registerModal">Register</a></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Register Modal -->
    <div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="registerModalLabel">Register</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" value="{{ old('username') }}" name="username" id="username"
                                placeholder="Masukkan Username" class="form-control" required>
                            @error('username')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" id="password" placeholder="Masukkan Password"
                                class="form-control" required>
                            @error('password')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="confirm_password" id="confirm_password"
                                placeholder="Konfirmasi Password" class="form-control" required>
                            @error('password')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="role" class="form-label">Role</label>
                            <select name="role" id="role" class="form-control">
                                <option value="administrator">Administrator</option>
                                <option value="admin_wilayah">Admin Wilayah</option>
                            </select>
                            @error('role')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-register">Register</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <p class="mr-auto">Sudah punya akun? <a href="{{ route('login') }}" class="text-link"
                            data-toggle="modal" data-target="#loginModal">Login</a></p>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Ensure only one modal is open at a time
        $('#loginModal').on('show.bs.modal', function() {
            $('#registerModal').modal('hide');
        });

        $('#registerModal').on('show.bs.modal', function() {
            $('#loginModal').modal('hide');
        });
    </script>

</body>

</html>
