<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="icon" href="/images/rumahmiskin.png" type="image/x-icon">
    <link rel="stylesheet" href="/css/app.css">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&family=Satisfy&display=swap');

        body {
            background-color: #f8f9fa;
            font-family: "Poppins", sans-serif;
        }

        /* Navbar */
        a:visited {
            text-decoration: underline;
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 20px;
        }

        .nav-link {
            font-size: 16px;
            color: white;
        }

        .nav-link.active {
            font-weight: 700;
        }

        .btn-primary {
            width: 133px;
            height: 40px;
            background-color: white;
            color: blue;
            border: none;
            font-size: 16px;
            font-weight: 700;
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

        .btn-login:hover,
        .btn-register:hover {
            background-color: #ff8c00;
            color: black;
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

        .container-video {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
        }

        .video-container {
            text-align: center;
            position: relative;
            width: 50%;
            padding-bottom: 28.125%;
            height: 0;
            overflow: hidden;
        }

        .video-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

        .video-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: transparent;
            pointer-events: none;
        }

        .text-isi-video {
            width: 50%;
            padding: 0 20px;
            text-align: justify;
            text-justify: inter-word;
        }

        .banner {
            background: url({{ URL('images/perumahan.jpg') }}) no-repeat center center;
            background-size: cover;
            padding-top: 20%;
            padding-bottom: 17%;
            color: #fff;
        }

        h4 {
            font-family: "Satisfy", cursive;
        }

        /* Custom card styles */
        .card-container {
            position: absolute;
            top: 90%;
            left: 50%;
            transform: translate(-50%);
            width: 80%;
            display: flex;
            justify-content: space-around;
        }

        .card {
            border-radius: 20px;
            width: 30%;
        }

        .card .card-body .btn {
            border-radius: 5px;
            font-weight: 600;
        }

        .card .card-body .btn-outline-danger {
            border: 2px solid #dc3545;
            color: #dc3545;
            border-radius: px;
        }

        .card .card-body .btn-outline-danger:hover {
            background-color: #dc3545;
            color: #fff;
        }

        .card .card-body .btn-danger {
            background-color: #dc3545;
            color: #fff;
        }

        .card .card-body .btn-danger:hover {
            background-color: #c82333;
            color: #fff;
        }

        .card:hover {
            background-color: #ffc107;
            transition: background-color 0.3s, color 0.3s;
        }

        .card:hover .card-title,
        .card:hover .card-text,
        .card:hover .btn {}

        .h3-below-cards {
            margin-top: 12%;
        }

        .row.d-flex {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .more-info-item {
            background: white;
            border-radius: 10px;
        }

        .more-info-item h3 {
            margin-bottom: 10px;
        }

        .more-info-item p {
            margin-bottom: 20px;
            max-width: 200px;
        }

        .more-info-item h5 {
            font-size: 1.25rem;
            margin-left: 10px;
        }

        .more-info-border-1 {
            border-left: 5px solid #ffc107;
        }

        .more-info-border-2 {
            border-left: 5px solid #007bff;
        }

        .shadow {
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
        }

        .shadow:hover {
            transform: translateY(-5px);
        }

        .btn-main-2 {
            background-color: #dc3545;
            color: white;
        }

        .btn-main-2:hover {
            background-color: #b02a37;
            color: white;
        }

        .btn-round-full {
            border-radius: 30px;
            font-weight: 600;
            padding: 10px 20px;
        }

        .me-3 {
            margin-right: 1rem;
        }

        .text-isi {
            margin-left: 50px;
            margin-right: 50px;
            text-align: justify;
            text-justify: inter-word;
        }
    </style>

    <script>
        function initMap() {
            var iframe = document.getElementById('map_canvas');
            var iframeDocument = iframe.contentDocument || iframe.contentWindow.document;

            var locations = [{
                lat: -7.5585,
                lng: 110.8210,
                title: 'Solo'
            }, ];

            for (var i = 0; i < locations.length; i++) {
                var marker = new iframeDocument.google.maps.Marker({
                    position: {
                        lat: locations[i].lat,
                        lng: locations[i].lng
                    },
                    map: iframeDocument.google.maps,
                    title: locations[i].title
                });
            }
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap" async defer></script>

</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-lg fixed-top">
        <div class="container">
            <a class="navbar-brand" href="https://sibaru.perumahan.pu.go.id/">
                <img src="{{ URL('images/rumahmiskin.png') }}" alt="Logo" width="50"
                    class="d-inline-block align-text-top me-3" />
            </a>
            <a class="navbar-brand" href="#">Portal Perumahan</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
                aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse text-right" id="navbarText">
                <ul class="navbar-nav nav-underline mx-auto">
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="#">Dashboard</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="#informasi">Informasi</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="#pengumuman">Pengumuman</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="#cp">Kontak</a>
                    </li>
                </ul>
                <div>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#loginModal"><button
                            class="btn btn-primary">Login</button></a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container-fluid banner">
        <div class="container text-center">
            <h4 class="display-2">Selamat datang !</h4>
            <h4 class="display-3">Portal Layanan Perumahan Miskin</h4>
        </div>
        <div class="card-container" id="informasi">
            <div class="card text-center">
                <div class="card-body">
                    <div class="mb-3">
                        <i class="fas fa-globe fa-2x text-danger"></i>
                    </div>
                    <h5 class="card-title">Wilayah</h5>
                    <p class="card-text">Tampilan daftar wilayah secara lengkap beserta jumlah kartu keluarga.</p>
                    <a href="#" class="btn btn-outline-danger">Klik Disini</a>
                </div>
            </div>
            <div class="card text-center">
                <div class="card-body">
                    <div class="mb-3">
                        <i class="fas fa-file-alt fa-2x text-danger"></i>
                    </div>
                    <h5 class="card-title">Kartu Keluarga</h5>
                    <p class="card-text">Tampilan daftar kartu keluarga secara lengkap dan terperinci.</p>
                    <a href="#" class="btn btn-outline-danger">Klik Disini</a>
                </div>
            </div>
            <div class="card text-center">
                <div class="card-body">
                    <div class="mb-3">
                        <i class="fas fa-home fa-2x text-danger"></i>
                    </div>
                    <h5 class="card-title">Rumah</h5>
                    <p class="card-text">Tampilan daftar rumah dari setiap kartu keluarga yang memiliki rumah</p>
                    <a href="#" class="btn btn-outline-danger">Klik Disini</a>
                </div>
            </div>
        </div>
    </div>

    <div class="content container">
        <div class="content container">
            <h3 class="text-center mb-4 h3-below-cards">Informasi Lainnya</h3>
            <div class="row d-flex justify-content-center align-items-center">
                <div class="d-flex flex-grow-1 justify-content-center">
                    <div class="shadow more-info-item more-info-border-1 p-4 me-3">
                        <div class="d-flex align-items-center">
                            <div class="mb-3">
                                <i class="fas fa-file-alt fa-2x text-danger"></i>
                            </div>
                            <h5>Riwayat Perubahan Rumah</h5>
                        </div>
                        <a href="informasi-setiap-saat" class="btn btn-main-2 btn-round-full mt-3">Klik Disini</a>
                    </div>
                    <div class="shadow more-info-item more-info-border-2 p-4">
                        <div class="d-flex align-items-center">
                            <div class="mb-3">
                                <i class="fas fa-file-alt fa-2x text-danger"></i>
                            </div>
                            <h5>Laporan / Info Perumahan</h5>
                        </div>
                        <a href="informasi-berkala" class="btn btn-main-2 btn-round-full mt-3">Klik Disini</a>
                    </div>
                </div>
            </div>
        </div>

        <h3 class="text-center mb-4 mt-5" id="pengumuman">Pengumuman</h3>
        <p class="text-isi">
            Website
            <span class="fw-bold">Portal Layanan Perumahan Miskin</span> ini merupakan website yang dirancang untuk
            memberikan berbagai layanan dan informasi terkait perumahan bagi masyarakat kurang mampu. Melalui portal
            ini, pengguna dapat mengakses berbagai program bantuan, mendaftar untuk subsidi perumahan, dan mendapatkan
            informasi terkini mengenai inisiatif pemerintah di bidang perumahan miskin. Portal ini juga menyediakan
            berbagai sumber daya dan panduan untuk membantu masyarakat dalam proses pengajuan bantuan dan memperoleh
            tempat tinggal yang layak. Dengan demikian, website ini menjadi alat yang penting dalam upaya meningkatkan
            kualitas hidup masyarakat miskin melalui akses yang lebih mudah dan transparan terhadap layanan perumahan.
        </p>

        <h3 class="text-center mb-4 mt-5" id="pengumuman">Konten Menarik</h3>
        <div class="container-video">
            <!-- Video YouTube -->
            <div class="video-container">
                <iframe id="video"
                    src="https://www.youtube.com/embed/kc5qIof7bPg?autoplay=1&mute=1&loop=1&playlist=kc5qIof7bPg&controls=0"
                    frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                <div class="video-overlay"></div>
            </div>
            <p class="text-isi-video">
                Website ini digunakan untuk melihat data-data keterangan perumahan miskin yang ada di Indonesia.
                Platform ini menyediakan informasi rinci tentang kondisi perumahan di berbagai daerah, termasuk tingkat
                kemiskinan, akses ke fasilitas dasar, dan kondisi fisik rumah. Data yang disajikan dapat digunakan oleh
                pemerintah, peneliti, dan organisasi non-pemerintah untuk merencanakan program peningkatan kesejahteraan
                dan perbaikan perumahan. Melalui analisis data yang komprehensif, website ini bertujuan untuk mendukung
                upaya pengentasan kemiskinan dan meningkatkan kualitas hidup masyarakat yang tinggal di perumahan miskin
                di seluruh Indonesia. Dengan antarmuka yang user-friendly dan fitur pencarian yang canggih, pengguna
                dapat dengan mudah mengakses data yang mereka butuhkan untuk membuat keputusan yang lebih baik dan
                berbasis data.
            </p>
        </div>

        <h3 class="text-center mb-4 mt-5">Peta Lokasi</h3>
        <iframe id="map_canvas" src="https://maps.google.com/maps?q=-7.5585,110.8210&hl=eng&z=12&output=embed"
            width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

    </div>

    <!-- Footer -->
    <footer class="footer" id="cp">
        <p>&copy; 2024 Portal Perumahan. All rights reserved.</p>
    </footer>

    <!-- Modal Login -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Login</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('login') }}">
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
                        </div>
                        @if ($errors->has('credentials'))
                            <div class="alert alert-danger">
                                {{ $errors->first('credentials') }}
                            </div>
                        @endif
                        <div class="d-grid">
                            <button type="submit" class="btn btn-login">Login</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <p>Don't have an account? <a href="#" class="text-link" data-bs-toggle="modal"
                            data-bs-target="#registerModal">Register</a></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Register -->
    <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="registerModalLabel">Register</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                    <p>Already have an account? <a href="#" class="text-link" data-bs-toggle="modal"
                            data-bs-target="#loginModal">Login</a></p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
