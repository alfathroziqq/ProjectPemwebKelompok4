@extends('admin_wilayah.master')

@section('content')
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Daftar Monitoring</title>
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

                $('.view').on('click', function() {
                    $('#provinsi_monitoring').text($(this).data('provinsi'));
                    $('#latitude_monitoring').text($(this).data('latitude'));
                    $('#longitude_monitoring').text($(this).data('longitude'));
                    $('#deskripsi_monitoring').text($(this).data('deskripsi'));
                    $('#detailMonitoringModal').modal('show');
                });

                $('#detailMonitoringModal .close').on('click', function() {
                    $('#detailMonitoringModal').modal('hide');
                });

                $('#detailMonitoringModal button[data-dismiss="modal"]').on('click', function() {
                    $('#detailMonitoringModal').modal('hide');
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
                            <h2 class="fw-bold">Daftar Monitoring</h2>
                        </div>
                        <div class="col-sm-4">
                            <div class="search-box">
                                <i class="material-icons">&#xE8B6;</i>
                                <form action="{{ route('monitoring.index') }}" method="GET">
                                    <input type="text" name="search" class="form-control" placeholder="Search&hellip;"
                                        value="{{ request()->query('search') }}">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="{{ route('monitoring.create') }}" class="btn btn-success mb-2">Tambah Data</a>
                <a href="{{ url('pdfmonitordownload') }}" class="btn btn-primary mb-2 float-right">Download PDF</a>
                <a href="{{ url('showmonitoringexcel') }}" class="btn btn-info mb-2 float-right mr-2">Excel</a>
                <table class="table table-striped table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Provinsi</th>
                            <th>Latitude</th>
                            <th>Longitude</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @php
                            $i = ($Monitorings->currentPage() - 1) * $Monitorings->perPage() + 1;
                        @endphp
                        @foreach ($Monitorings as $monitoring)
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $monitoring->provinsi }}</td>
                                <td>{{ $monitoring->latitude }}</td>
                                <td>{{ $monitoring->longitude }}</td>
                                <td>{{ $monitoring->deskripsi }}</td>
                                <td>
                                    <a href="#" class="view" title="View" data-toggle="tooltip"
                                        data-provinsi="{{ $monitoring->provinsi }}"
                                        data-latitude="{{ $monitoring->latitude }}"
                                        data-longitude="{{ $monitoring->longitude }}"
                                        data-deskripsi="{{ $monitoring->deskripsi }}">
                                        <i class="material-icons">&#xE417;</i>
                                    </a>
                                    <a href="{{ route('monitoring.edit', $monitoring->id) }}" class="edit" title="Edit"
                                        data-toggle="tooltip">
                                        <i class="material-icons">&#xE254;</i>
                                    </a>
                                    <form action="{{ route('monitoring.destroy', $monitoring->id) }}"
                                        method="POST" style="display:inline;" data-id="{{ $monitoring->id }}">
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
                    <div class="hint-text">Menampilkan <b>{{ $Monitorings->count() }}</b> dari
                        <b>{{ $Monitorings->total() }}</b> entri
                    </div>
                    <ul class="pagination">
                        <li class="page-item {{ $Monitorings->currentPage() == 1 ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ $Monitorings->url(1) }}">First</a>
                        </li>
                        <li class="page-item {{ $Monitorings->currentPage() <= 1 ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ $Monitorings->previousPageUrl() }}">Previous</a>
                        </li>
                        @for ($i = 1; $i <= $Monitorings->lastPage(); $i++)
                            <li class="page-item {{ $Monitorings->currentPage() == $i ? ' active' : '' }}">
                                <a class="page-link" href="{{ $Monitorings->url($i) }}">{{ $i }}</a>
                            </li>
                        @endfor
                        <li class="page-item {{ $Monitorings->currentPage() == $Monitorings->lastPage() ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ $Monitorings->nextPageUrl() }}">Next</a>
                        </li>
                        <li class="page-item {{ $Monitorings->currentPage() == $Monitorings->lastPage() ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ $Monitorings->url($Monitorings->lastPage()) }}">Last</a>
                        </li>
                    </ul>
                </div>
                
            </div>
        </div>

        <!-- Modal Detail Monitoring -->
        <div class="modal fade" id="detailMonitoringModal" tabindex="-1" role="dialog" aria-labelledby="detailMonitoringModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="detailMonitoringModalLabel">Detail Monitoring</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <dl class="row">
                            <dt class="col-sm-4">Provinsi :</dt>
                            <dd class="col-sm-8" id="provinsi_monitoring"></dd>

                            <dt class="col-sm-4">Latitude :</dt>
                            <dd class="col-sm-8" id="latitude_monitoring"></dd>

                            <dt class="col-sm-4">Longitude :</dt>
                            <dd class="col-sm-8" id="longitude_monitoring"></dd>

                            <dt class="col-sm-4">Deskripsi :</dt>
                            <dd class="col-sm-8" id="deskripsi_monitoring"></dd>
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
                        <h5 class="modal-title" id="deleteConfirmationModalLabel">Delete Monitoring</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Anda yakin ingin menghapus <span style="font-weight: bold">MONITORING</span> ini?
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
