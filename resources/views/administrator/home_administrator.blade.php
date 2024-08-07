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

    <style>
        #UserChart {
            width: 100% !important;
            height: 57vh !important;
        }
    </style>
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
                    <a href="{{ route('users.index') }}" class="sidebar-link">
                        <i class="lni lni-user"></i>
                        <span>User</span>
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
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h2 class="fw-bold" style="color: black;">Dashboard</h2>
            </div>

            <!-- Jumlah Administrator -->
            <div class="row">
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Administrator</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $countAdministrator }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Jumlah Admin Wilayah -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Admin Wilayah</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $countAdminWilayah }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container d-flex justify-content-start">
                    <div class="card shadow mb-4">
                        <!-- Spesifikasi User -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Statistik User</h6>
                            <div class="dropdown no-arrow">
                            </div>
                        </div>

                        <!-- Body -->
                        <div class="card-body">
                            <div class="chart-pie pt-4 pb-2">
                                <canvas id="UserChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Deskripsi Dashboard -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Deskripsi Dashboard Administrator</h6>
                    </div>
                    <div class="card-body">
                        <p>Dashboard Administrator ini dirancang khusus untuk memudahkan pengelolaan pengguna dalam
                            sebuah aplikasi atau sistem. Fitur-fitur yang tersedia memungkinkan Administrator untuk
                            melakukan berbagai tugas terkait dengan pengguna secara efisien dan terorganisir. Contohnya
                            adalah menambah user aplikasi, mengedit username dan password user, serta menghapus user.
                        </p>
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
        const hamBurger = document.querySelector(".toggle-btn");

        hamBurger.addEventListener("click", function() {
            document.querySelector("#sidebar").classList.toggle("expand");
        });

        document.addEventListener('DOMContentLoaded', function() {
            var countAdministrator = @json($countAdministrator);
            var countAdminWilayah = @json($countAdminWilayah);

            const dataUser = {
                labels: ['Administrator', 'Admin Wilayah'],
                datasets: [{
                    label: 'Jumlah User',
                    backgroundColor: ['rgb(255, 99, 132)', 'rgb(54, 162, 235)', 'rgb(255, 205, 86)'],
                    borderColor: ['rgb(255, 99, 132)', 'rgb(54, 162, 235)', 'rgb(255, 205, 86)'],
                    data: [countAdministrator, countAdminWilayah],
                }]
            };

            const configUser = {
                type: 'bar',
                data: dataUser,
                options: {}
            };

            const myChartUser = new Chart(
                document.getElementById('UserChart'),
                configUser
            );
        })
    </script>
</body>

</html>
