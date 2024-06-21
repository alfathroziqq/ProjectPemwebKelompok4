@extends('admin_wilayah.master')

@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Daftar Wilayah</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <style>
            body {
                color: #566787;
                background: #f5f5f5;
            }

            .table-responsive {
                margin: 30px 0;
            }

            .table-wrapper {
                min-width: 1000px;
                background: #fff;
                padding: 20px;
                box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
            }

            .table-title {
                padding-bottom: 10px;
                margin: 0 0 10px;
                min-width: 100%;
            }

            .table-title h2 {
                margin: 8px 0 0;
                font-size: 30px;
                color: #000000;
            }

            .search-box {
                position: relative;
                float: right;
            }

            .search-box input {
                height: 34px;
                border-radius: 20px;
                padding-left: 35px;
                border-color: #ddd;
                box-shadow: none;
            }

            .search-box input:focus {
                border-color: #3FBAE4;
            }

            .search-box i {
                color: #a0a5b1;
                position: absolute;
                font-size: 19px;
                top: 8px;
                left: 10px;
            }

            table.table tr th,
            table.table tr td {
                border-color: #e9e9e9;
            }

            table.table-striped tbody tr:nth-of-type(odd) {
                background-color: #fcfcfc;
            }

            table.table-striped.table-hover tbody tr:hover {
                background: #f5f5f5;
            }

            table.table th i {
                font-size: 13px;
                margin: 0 5px;
                cursor: pointer;
            }

            table.table td:last-child {
                width: 130px;
            }

            table.table td a {
                color: #a0a5b1;
                display: inline-block;
                margin: 0 5px;
            }

            table.table td a.edit {
                color: #FFC107;
            }

            table.table td a.delete {
                color: #E34724;
            }

            table.table td i {
                font-size: 19px;
            }

            .pagination {
                float: right;
                margin: 0 0 5px;
            }

            .pagination {
                float: right;
                margin: 20px 0;
            }

            .pagination li {
                display: inline;
                margin-right: 5px;
            }

            .pagination li a {
                border: 1px solid #ddd;
                background-color: #f9f9f9;
                color: #666;
                padding: 6px 12px;
                text-decoration: none;
                border-radius: 5px;
            }

            .pagination li.active a {
                background-color: #03A9F4;
                color: white;
                border: 1px solid #03A9F4;
            }

            .pagination li a:hover:not(.active) {
                background-color: #ddd;
            }

            .hint-text {
                float: left;
                margin-top: 6px;
                font-size: 95%;
            }
        </style>
        <script>
            $(document).ready(function() {
                $('[data-toggle="tooltip"]').tooltip();
            });
        </script>
    </head>

    <body>
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-8">
                            <h2>Daftar Wilayah</h2>
                        </div>
                        <div class="col-sm-4">
                            <div class="search-box">
                                <i class="material-icons">&#xE8B6;</i>
                                <form action="{{ route('wilayah.index') }}" method="GET">
                                    <input type="text" name="search" class="form-control" placeholder="Search&hellip;"
                                        value="{{ request()->query('search') }}">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="{{ route('wilayah.create') }}" class="btn btn-success mb-2">Tambah Wilayah Baru</a>
                <table class="table table-striped table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Provinsi</th>
                            <th>Jumlah Kartu Keluarga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = ($wilayahs->currentPage() - 1) * $wilayahs->perPage() + 1;
                        @endphp
                        @foreach ($wilayahs as $wilayah)
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $wilayah->nama_provinsi }}</td>
                                <td>{{ $wilayah->kartu_keluargas_count }}</td>
                                <td>
                                    <a href="{{ route('wilayah.edit', $wilayah->id) }}" class="edit" title="Edit" data-toggle="tooltip">
                                        <i class="material-icons">&#xE254;</i>
                                    </a>
                                    <form action="{{ route('wilayah.destroy', $wilayah->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="delete" title="Delete" data-toggle="tooltip" style="border:none; background:none;">
                                            <i class="material-icons">&#xE872;</i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @php
                                $i++;
                            @endphp
                        @endforeach
                    </tbody>

                </table>
                <div class="clearfix">
                    <div class="hint-text">Menampilkan <b>{{ $wilayahs->count() }}</b> dari
                        <b>{{ $wilayahs->total() }}</b>
                    </div>
                    <ul class="pagination">
                        <li class="page-item {{ $wilayahs->currentPage() == 1 ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ $wilayahs->url(1) }}">First</a>
                        </li>
                        <li class="page-item {{ $wilayahs->currentPage() <= 1 ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ $wilayahs->previousPageUrl() }}">Previous</a>
                        </li>
                        @for ($i = 1; $i <= $wilayahs->lastPage(); $i++)
                            <li class="page-item {{ $wilayahs->currentPage() == $i ? ' active' : '' }}">
                                <a class="page-link" href="{{ $wilayahs->url($i) }}">{{ $i }}</a>
                            </li>
                        @endfor
                        <li class="page-item {{ $wilayahs->currentPage() == $wilayahs->lastPage() ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ $wilayahs->nextPageUrl() }}">Next</a>
                        </li>
                        <li class="page-item {{ $wilayahs->currentPage() == $wilayahs->lastPage() ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ $wilayahs->url($wilayahs->lastPage()) }}">Last</a>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </body>

    </html>
@endsection
