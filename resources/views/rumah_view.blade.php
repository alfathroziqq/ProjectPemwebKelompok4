<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daftar Kartu Keluarga</title>
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
</head>

<style>
    body {
        margin-top: 7%;
    }
</style>

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
                        <a class="nav-link" href="{{ route('home') }}">Dashboard</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="{{ route('home') }}">Informasi</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="{{ route('home') }}">Pengumuman</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="{{ route('home') }}">Kontak</a>
                    </li>
                </ul>
                <div>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#loginModal"><button
                            class="btn btn-primary">Login</button></a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h2>Daftar Rumah</h2>
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nomor KK</th>
                        <th>Alamat</th>
                        <th>Luas Rumah</th>
                        <th>Jumlah Kamar</th>
                        <th>Spesifikasi Rumah</th>
                    </tr>
                </thead>

                <tbody>
                    @php
                        $i = ($rumahs->currentPage() - 1) * $rumahs->perPage() + 1;
                    @endphp
                    @foreach ($rumahs as $rumah)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $rumah->kartuKeluarga->nomor_kk }}</td>
                            <td>{{ $rumah->alamat }}</td>
                            <td>{{ $rumah->luas_rumah }}</td>
                            <td>{{ $rumah->jumlah_kamar }}</td>
                            <td>{{ $rumah->spesifikasi_rumah }}</td>
                        </tr>
                        @php
                            $i++;
                        @endphp
                    @endforeach
                </tbody>

            </table>
        </div>

        <div class="clearfix">
            <div class="hint-text">Menampilkan <b>{{ $rumahs->count() }}</b> dari
                <b>{{ $rumahs->total() }}</b> entri
            </div>
            <ul class="pagination">
                <li class="page-item {{ $rumahs->currentPage() == 1 ? 'disabled' : '' }}">
                    <a class="page-link" href="{{ $rumahs->url(1) }}">First</a>
                </li>
                <li class="page-item {{ $rumahs->currentPage() <= 1 ? 'disabled' : '' }}">
                    <a class="page-link" href="{{ $rumahs->previousPageUrl() }}">Previous</a>
                </li>
                @for ($i = 1; $i <= $rumahs->lastPage(); $i++)
                    <li class="page-item {{ $rumahs->currentPage() == $i ? ' active' : '' }}">
                        <a class="page-link" href="{{ $rumahs->url($i) }}">{{ $i }}</a>
                    </li>
                @endfor
                <li class="page-item {{ $rumahs->currentPage() == $rumahs->lastPage() ? 'disabled' : '' }}">
                    <a class="page-link" href="{{ $rumahs->nextPageUrl() }}">Next</a>
                </li>
                <li class="page-item {{ $rumahs->currentPage() == $rumahs->lastPage() ? 'disabled' : '' }}">
                    <a class="page-link" href="{{ $rumahs->url($rumahs->lastPage()) }}">Last</a>
                </li>
            </ul>
        </div>

    </div>

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
