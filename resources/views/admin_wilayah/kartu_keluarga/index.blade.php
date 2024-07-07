<!-- resources/views/kartu_keluarga/index.blade.php -->

@extends('admin_wilayah.master')

@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Daftar Kartu Keluarga</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="{{ asset('css/admin_wilayah.css') }}">

        <script>
            $(document).ready(function() {
                $('[data-toggle="tooltip"]').tooltip();

                // Fungsi untuk mengatur urutan tabel berdasarkan kolom yang dapat diurutkan
                $('th.sortable').click(function() {
                    var table = $(this).closest('table');
                    var rows = table.find('tbody > tr').get();
                    var index = $(this).index();

                    rows.sort(function(a, b) {
                        var A = $(a).children('td').eq(index).text().toUpperCase();
                        var B = $(b).children('td').eq(index).text().toUpperCase();

                        if ($.isNumeric(A) && $.isNumeric(B)) {
                            return A - B;
                        } else {
                            return A.localeCompare(B);
                        }
                    });

                    if ($(this).hasClass('asc')) {
                        rows.reverse();
                        $(this).removeClass('asc').addClass('desc').find('i').removeClass('fa-sort').addClass(
                            'fa-sort-asc');
                    } else {
                        $(this).removeClass('desc').addClass('asc').find('i').removeClass('fa-sort').addClass(
                            'fa-sort-desc');
                    }

                    $.each(rows, function(index, row) {
                        table.children('tbody').append(row);
                    });
                });

                // Fungsi untuk menampilkan modal detail
                $('.view').on('click', function() {
                    $('#nomor_kk').text($(this).data('nomor_kk'));
                    $('#kepala_keluarga').text($(this).data('kepala_keluarga'));
                    $('#alamat').text($(this).data('alamat'));
                    $('#provinsi').text($(this).data('provinsi'));
                    $('#detailModal').modal('show');
                });

                // Fungsi untuk menutup modal detail saat tombol close atau tombol dengan data-dismiss="modal" diklik
                $('#detailModal .close, #detailModal button[data-dismiss="modal"]').on('click', function() {
                    $('#detailModal').modal('hide');
                });

                // Fungsi untuk menampilkan modal konfirmasi hapus
                $('.delete').on('click', function() {
                    var id = $(this).closest('form').attr('data-id');
                    var form = $('#deleteForm');
                    form.attr('action', '/kartu_keluarga/' + id);
                    $('#deleteConfirmationModal').modal('show');
                });

                // Menutup modal konfirmasi hapus saat tombol close atau tombol dengan data-dismiss="modal" diklik
                $('#deleteConfirmationModal .close, #deleteConfirmationModal button[data-dismiss="modal"]').on('click',
                    function() {
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
                            <h2 class="fw-bold">Kartu Keluarga</h2>
                        </div>
                        <div class="col-sm-4">
                            <div class="search-box">
                                <i class="material-icons">&#xE8B6;</i>
                                <form action="{{ route('kartu_keluarga.index') }}" method="GET">
                                    <input type="text" name="search" class="form-control" placeholder="Search&hellip;"
                                        value="{{ request()->query('search') }}">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <a href="{{ route('kartu_keluarga.create') }}" class="btn btn-success mb-2">Tambah Kartu Keluarga Baru</a>
                <a href="{{ url('pdfkkdownload') }}" class="btn btn-primary mb-2 float-right">Download PDF</a>
                <a href="{{ url('showkkexcel') }}" class="btn btn-info mb-2 float-right mr-2">Excel</a>

                <table class="table table-striped table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nomor KK</th>
                            <th>Kepala Keluarga</th>
                            <th>Alamat</th>
                            <th class="sortable">Provinsi <i class="fa fa-sort" aria-hidden="true"></i></th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @php
                            $i = ($kartuKeluargas->currentPage() - 1) * $kartuKeluargas->perPage() + 1;
                        @endphp
                        @foreach ($kartuKeluargas as $kartuKeluarga)
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $kartuKeluarga->nomor_kk }}</td>
                                <td>{{ $kartuKeluarga->kepala_keluarga }}</td>
                                <td>{{ $kartuKeluarga->alamat }}</td>
                                <td>{{ $kartuKeluarga->wilayah->nama_provinsi }}</td>
                                <td>
                                    <a href="#" class="view" title="View"
                                        data-nomor_kk="{{ $kartuKeluarga->nomor_kk }}"
                                        data-kepala_keluarga="{{ $kartuKeluarga->kepala_keluarga }}"
                                        data-alamat="{{ $kartuKeluarga->alamat }}"
                                        data-provinsi="{{ $kartuKeluarga->wilayah->nama_provinsi }}">
                                        <i class="material-icons">&#xE417;</i>
                                    </a>
                                    <a href="{{ route('kartu_keluarga.edit', $kartuKeluarga->id) }}" class="edit"
                                        title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                                    <form action="{{ route('kartu_keluarga.destroy', $kartuKeluarga->id) }}" method="POST"
                                        style="display:inline;" data-id="{{ $kartuKeluarga->id }}">
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
                    <div class="hint-text">Menampilkan <b>{{ $kartuKeluargas->count() }}</b> dari
                        <b>{{ $kartuKeluargas->total() }}</b> entri
                    </div>
                    <ul class="pagination">
                        <li class="page-item {{ $kartuKeluargas->currentPage() == 1 ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ $kartuKeluargas->url(1) }}">First</a>
                        </li>
                        <li class="page-item {{ $kartuKeluargas->currentPage() <= 1 ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ $kartuKeluargas->previousPageUrl() }}">Previous</a>
                        </li>
                        @for ($i = 1; $i <= $kartuKeluargas->lastPage(); $i++)
                            <li class="page-item {{ $kartuKeluargas->currentPage() == $i ? ' active' : '' }}">
                                <a class="page-link" href="{{ $kartuKeluargas->url($i) }}">{{ $i }}</a>
                            </li>
                        @endfor
                        <li
                            class="page-item {{ $kartuKeluargas->currentPage() == $kartuKeluargas->lastPage() ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ $kartuKeluargas->nextPageUrl() }}">Next</a>
                        </li>
                        <li
                            class="page-item {{ $kartuKeluargas->currentPage() == $kartuKeluargas->lastPage() ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ $kartuKeluargas->url($kartuKeluargas->lastPage()) }}">Last</a>
                        </li>
                    </ul>
                </div>
                
            </div>
        </div>

        <!-- Modal Detail Kartu Keluarga -->
        <div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="detailModalLabel">Detail Kartu Keluarga</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <dl class="row">
                            <dt class="col-sm-4">Nomor KK:</dt>
                            <dd class="col-sm-8" id="nomor_kk"></dd>

                            <dt class="col-sm-4">Kepala Keluarga:</dt>
                            <dd class="col-sm-8" id="kepala_keluarga"></dd>

                            <dt class="col-sm-4">Alamat:</dt>
                            <dd class="col-sm-8" id="alamat"></dd>

                            <dt class="col-sm-4">Provinsi:</dt>
                            <dd class="col-sm-8" id="provinsi"></dd>
                        </dl>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Delete Confirmation Modal -->
        <div class="modal fade" id="deleteConfirmationModal" tabindex="-1"
            aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteConfirmationModalLabel">Delete Kartu Keluarga</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Anda yakin ingin menghapus <span style="font-weight: bold">KARTU KELUARGA</span> ini?
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

    </body>

    </html>
@endsection
