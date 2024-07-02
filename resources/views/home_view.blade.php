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
    <link rel="stylesheet" href="{{ URL('css/home.css') }}">

    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/map.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/worldLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/indonesiaLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>

    <style>
        .banner {
            background: url('{{ URL('images/perumahan.jpg') }}') no-repeat center center;
            background-size: cover;
            padding-top: 20%;
            padding-bottom: 18.5%;
            color: #fff;
        }

        #chartdiv {
            width: 100%;
            height: 500px;
        }
    </style>
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
                    <a href="{{ url('wilayah_view') }}" class="btn btn-outline-danger">Klik Disini</a>
                </div>
            </div>
            <div class="card text-center">
                <div class="card-body">
                    <div class="mb-3">
                        <i class="fas fa-file-alt fa-2x text-danger"></i>
                    </div>
                    <h5 class="card-title">Kartu Keluarga</h5>
                    <p class="card-text">Tampilan daftar kartu keluarga secara lengkap dan terperinci.</p>
                    <a href="{{ url('kk_view') }}" class="btn btn-outline-danger">Klik Disini</a>
                </div>
            </div>
            <div class="card text-center">
                <div class="card-body">
                    <div class="mb-3">
                        <i class="fas fa-home fa-2x text-danger"></i>
                    </div>
                    <h5 class="card-title">Rumah</h5>
                    <p class="card-text">Tampilan daftar rumah dari setiap kartu keluarga yang memiliki rumah</p>
                    <a href="{{ url('rumah_view') }}" class="btn btn-outline-danger">Klik Disini</a>
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
                        <a href="{{ url('riwayat_view') }}" class="btn btn-main-2 btn-round-full mt-3">Klik Disini</a>
                    </div>
                    <div class="shadow more-info-item more-info-border-2 p-4">
                        <div class="d-flex align-items-center">
                            <div class="mb-3">
                                <i class="fas fa-file-alt fa-2x text-danger"></i>
                            </div>
                            <h5>Laporan / Info Perumahan</h5>
                        </div>
                        <a href="{{ url('laporan_view') }}" class="btn btn-main-2 btn-round-full mt-3">Klik Disini</a>
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

        <div class="map-container mt-5">
            <h3 class="text-center mb-4">Peta Indonesia</h3>
            <div id="chartdiv"></div>
        </div>
    </div>

    <script>
        am5.ready(function() {
            // Create root and chart
            var root = am5.Root.new("chartdiv");
            root.setThemes([am5themes_Animated.new(root)]);

            // Create the map chart
            var chart = root.container.children.push(am5map.MapChart.new(root, {
                panX: "none",
                panY: "none",
                projection: am5map.geoMercator()
            }));

            // Filter out specific regions
            var excludedRegions = ["Sarawak", "Sabah", "Selangor", "Brunei Darussalam", "Timor-Leste"];
            var filteredGeoJSON = am5geodata_indonesiaLow.features.filter(feature =>
                !excludedRegions.includes(feature.properties.name)
            );

            // Create polygon series
            var polygonSeries = chart.series.push(am5map.MapPolygonSeries.new(root, {
                geoJSON: { type: "FeatureCollection", features: filteredGeoJSON }
            }));

            // Data from rumahData variable
            var rumahData = [{"wilayah":"Aceh","rumah_sehat":"1","rumah_tidak_sehat":"1","rumah_tidak_layak":"0"},{"wilayah":"Bali","rumah_sehat":"1","rumah_tidak_sehat":"0","rumah_tidak_layak":"1"},{"wilayah":"Banten","rumah_sehat":"2","rumah_tidak_sehat":"0","rumah_tidak_layak":"0"}];

            // Create a lookup object for rumahData
            var rumahLookup = {};
            rumahData.forEach(function(item) {
                rumahLookup[item.wilayah] = item;
            });

            // Configure series
            polygonSeries.mapPolygons.template.setAll({
                tooltipText: "{name}\nRumah Sehat: {rumah_sehat}\nRumah Tidak Sehat: {rumah_tidak_sehat}\nRumah Tidak Layak: {rumah_tidak_layak}",
                interactive: true
            });

            polygonSeries.mapPolygons.template.states.create("hover", {
                fill: am5.color(0x677935)
            });

            // Add rumah data to mapPolygons
            polygonSeries.mapPolygons.template.events.on("datavalidated", function() {
                polygonSeries.mapPolygons.each(function(polygon) {
                    var data = rumahLookup[polygon.dataItem.dataContext.name];
                    if (data) {
                        polygon.dataItem.set("rumah_sehat", data.rumah_sehat);
                        polygon.dataItem.set("rumah_tidak_sehat", data.rumah_tidak_sehat);
                        polygon.dataItem.set("rumah_tidak_layak", data.rumah_tidak_layak);
                    }
                });
            });

            // Add zoom control
            chart.set("zoomControl", am5map.ZoomControl.new(root, {}));
        });
    </script>

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
