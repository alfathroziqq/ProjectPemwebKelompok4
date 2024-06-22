@extends('admin_wilayah.master')

@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Daftar Riwayat Perubahan Rumah</title>
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

            table.table td a.view {
                color: #03A9F4;
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
                $('#detailModal').on('show.bs.modal', function(event) {
                    var link = $(event.relatedTarget); // Tautan yang ditekan
                    var rumah = link.data('rumah');
                    var perubahan = link.data('perubahan');
                    var tanggal = link.data('tanggal');

                    var modal = $(this);
                    modal.find('#rumah').text(rumah);
                    modal.find('#perubahan').text(perubahan);
                    modal.find('#tanggal_perubahan').text(tanggal);
                });

                // Menampilkan modal konfirmasi hapus ketika tombol hapus di-klik
                $('.delete').on('click', function() {
                    var form = $(this).closest('form');
                    var action = form.attr('action');
                    $('#deleteForm').attr('action', action);
                    $('#deleteConfirmationModal').modal('show');
                });

                // Menyembunyikan modal konfirmasi hapus ketika tombol batal di-klik
                $('#deleteConfirmationModal button[data-dismiss="modal"]').on('click', function() {
                    $('#deleteConfirmationModal').modal('hide');
                });
            });
        </script>

    </head>

    <body>
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-8">
                            <h2>Daftar Riwayat Perubahan Rumah</h2>
                        </div>
                        <div class="col-sm-4">
                            <div class="search-box">
                                <i class="material-icons">&#xE8B6;</i>
                                <form action="{{ route('riwayat_perubahan_rumah.index') }}" method="GET">
                                    <input type="text" name="search" class="form-control" placeholder="Search..."
                                        value="{{ request()->query('search') }}">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="{{ route('riwayat_perubahan_rumah.create') }}" class="btn btn-success mb-2">Tambah Riwayat
                    Perubahan Rumah Baru</a>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Rumah</th>
                            <th>Perubahan</th>
                            <th>Tanggal Perubahan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = ($riwayatPerubahanRumahs->currentPage() - 1) * $riwayatPerubahanRumahs->perPage() + 1;
                        @endphp
                        @foreach ($riwayatPerubahanRumahs as $riwayatPerubahanRumah)
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $riwayatPerubahanRumah->rumah->alamat }}</td>
                                <td>{{ $riwayatPerubahanRumah->perubahan }}</td>
                                <td>{{ $riwayatPerubahanRumah->tanggal_perubahan }}</td>
                                <td>
                                    <a href="#" class="view" title="Lihat" data-toggle="modal"
                                        data-target="#detailModal" data-rumah="{{ $riwayatPerubahanRumah->rumah->alamat }}"
                                        data-perubahan="{{ $riwayatPerubahanRumah->perubahan }}"
                                        data-tanggal="{{ $riwayatPerubahanRumah->tanggal_perubahan }}">
                                        <i class="material-icons">&#xE417;</i>
                                    </a>

                                    <a href="{{ route('riwayat_perubahan_rumah.edit', $riwayatPerubahanRumah->id) }}"
                                        class="edit" title="Edit" data-toggle="tooltip"><i
                                            class="material-icons">&#xE254;</i></a>
                                    <form
                                        action="{{ route('riwayat_perubahan_rumah.destroy', $riwayatPerubahanRumah->id) }}"
                                        method="POST" style="display:inline;" data-id="{{ $riwayatPerubahanRumah->id }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="delete" title="Delete" data-toggle="tooltip"
                                            style="border:none; background:none;"><i
                                                class="material-icons">&#xE872;</i></button>
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
                    <div class="hint-text">Menampilkan <b>{{ $riwayatPerubahanRumahs->count() }}</b> dari
                        <b>{{ $riwayatPerubahanRumahs->total() }}</b> entri
                    </div>
                    {{ $riwayatPerubahanRumahs->links() }}
                </div>
            </div>
        </div>
    </body>

    <!-- Modal Detail Riwayat Perubahan Rumah -->
    <div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailModalLabel">Detail Riwayat Perubahan Rumah</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <dl class="row">
                        <dt class="col-sm-4">Rumah:</dt>
                        <dd class="col-sm-8" id="rumah"></dd>

                        <dt class="col-sm-4">Perubahan:</dt>
                        <dd class="col-sm-8" id="perubahan"></dd>

                        <dt class="col-sm-4">Tanggal Perubahan:</dt>
                        <dd class="col-sm-8" id="tanggal_perubahan"></dd>
                    </dl>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteConfirmationModal" tabindex="-1" aria-labelledby="deleteConfirmationModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteConfirmationModalLabel">Delete Riwayat Perubahan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Anda yakin ingin menghapus <span style="font-weight: bold">RIWAYAT PERUBAHAN</span> ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <form id="deleteForm" action="" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    </html>
@endsection
