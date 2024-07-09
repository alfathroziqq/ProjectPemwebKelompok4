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

        <div class="main p-3 m-4">

            <!-- Header -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h2 class="fw-bold" style="color: black;">Dashboard</h2>
            </div>

            <!-- Baris Konten -->
            <div class="row">

                <!-- Jumlah Wilayah -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Wilayah</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $countWilayah }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Jumlah Kartu Keluarga -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Kartu Keluarga</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $countKK }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Jumlah Rumah -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                        Rumah</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $countRumah }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-comments fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Jumlah Laporan -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                        Laporan Rumah</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $countLaporan }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-comments fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">

                <!-- Grafik -->
                <div class="col-xl-8 col-lg-7">
                    <div class="card shadow mb-4">

                        <!-- Grafik statistik provinsi -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Statistik Provinsi</h6>
                            <div class="dropdown no-arrow">
                            </div>
                        </div>

                        <!-- Body -->
                        <div class="card-body">
                            <div class="chart-area">
                                <canvas id="KKChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Grafik Pie -->
                <div class="col-xl-4 col-lg-5">
                    <div class="card shadow mb-4">

                        <!-- Spesifikasi Rumah -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Statistik Spesifikasi</h6>
                            <div class="dropdown no-arrow">
                            </div>
                        </div>

                        <!-- Body -->
                        <div class="card-body">
                            <div class="chart-pie pt-4 pb-2">
                                <canvas id="SpekChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Deskripsi Dashboard -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Deskripsi Dashboard Admin Wilayah</h6>
                    </div>
                    <div class="card-body">
                        <p>Dashboard Admin Wilayah adalah antarmuka pengguna yang dirancang untuk memudahkan admin dalam
                            mengelola dan memantau data wilayah. Dashboard ini menyediakan berbagai fitur untuk
                            mengakses informasi penting tentang wilayah, termasuk data geografis, populasi,
                            infrastruktur, dan statistik lainnya. Berikut adalah deskripsi rinci tentang fitur-fitur
                            yang tersedia di dalam dashboard ini.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const hamBurger = document.querySelector(".toggle-btn");

            hamBurger.addEventListener("click", function() {
                document.querySelector("#sidebar").classList.toggle("expand");
            });

            // Chart KK
            var labelsKK = @json($labelsKK);
            var countsKK = @json($countsKK);

            const dataKK = {
                labels: labelsKK,
                datasets: [{
                    label: 'Jumlah KK per Wilayah',
                    backgroundColor: 'rgb(255, 99, 132)',
                    borderColor: 'rgb(255, 99, 132)',
                    data: countsKK,
                }]
            };

            const configKK = {
                type: 'bar',
                data: dataKK,
                options: {}
            };

            const myChartKK = new Chart(
                document.getElementById('KKChart'),
                configKK
            );

            // Chart Spesifikasi
            var countRumahSehat = @json($countRumahSehat);
            var countRumahTidakSehat = @json($countRumahTidakSehat);
            var countRumahTidakLayak = @json($countRumahTidakLayak);

            const dataSpek = {
                labels: ['Rumah Sehat', 'Rumah Tidak Sehat', 'Rumah Tidak Layak'],
                datasets: [{
                    label: 'Spesifikasi Rumah',
                    backgroundColor: ['rgb(255, 99, 132)', 'rgb(54, 162, 235)', 'rgb(255, 205, 86)'],
                    borderColor: ['rgb(255, 99, 132)', 'rgb(54, 162, 235)', 'rgb(255, 205, 86)'],
                    data: [countRumahSehat, countRumahTidakSehat,
                        countRumahTidakLayak
                    ],
                }]
            };

            const configSpek = {
                type: 'bar',
                data: dataSpek,
                options: {}
            };

            const myChartSpek = new Chart(
                document.getElementById('SpekChart'),
                configSpek
            );
        });
    </script>
</body>

</html>
