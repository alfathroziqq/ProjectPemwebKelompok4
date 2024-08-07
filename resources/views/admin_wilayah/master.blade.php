<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin Wilayah</title>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/admin_wilayah.css') }}">
    <link rel="icon" href="/images/rumahmiskin.png" type="image/x-icon">
</head>

<body>
    <div class="wrapper">
        <aside id="sidebar">
            <div class="d-flex">
                <button class="toggle-btn" type="button">
                    <i class="lni lni-grid-alt"></i>
                </button>
            </div>
            <ul class="sidebar-nav">
                <li class="sidebar-item">
                    <a href="{{ route('home_admin_wilayah') }}" class="sidebar-link">
                        <i class="lni lni-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('wilayah.index') }}" class="sidebar-link">
                        <i class="lni lni-map-marker"></i>
                        <span>Wilayah</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('kartu_keluarga.index') }}" class="sidebar-link">
                        <i class="lni lni-credit-cards"></i>
                        <span>Kartu Keluarga</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('rumah.index') }}" class="sidebar-link">
                        <i class="lni lni-home"></i>
                        <span>Rumah</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                        data-bs-target="#auth" aria-expanded="false" aria-controls="auth">
                        <i class="lni lni-folder"></i>
                        <span>Pendataan</span>
                    </a>
                    <ul id="auth" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="{{ route('riwayat_perubahan_rumah.index') }}" class="sidebar-link">Riwayat
                                Perubahan Rumah</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('laporan_rumah.index') }}" class="sidebar-link">Laporan Rumah</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('monitoring.index') }}" class="sidebar-link">
                        <i class="lni lni-display-alt"></i>
                        <span>Monitoring</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ url('peta') }}" class="sidebar-link">
                        <i class="lni lni-map"></i>
                        <span>Peta</span>
                    </a>
                </li>
            </ul>
            <div class="sidebar-footer">
                <a href="{{ route('logout') }}" class="sidebar-link">
                    <i class="lni lni-exit"></i>
                    <span>Logout</span>
                </a>
            </div>
        </aside>

        <div class="main p-3">
            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>

    <script>
        const hamBurger = document.querySelector(".toggle-btn");

        hamBurger.addEventListener("click", function() {
            document.querySelector("#sidebar").classList.toggle("expand");
        });
    </script>
</body>

</html>
