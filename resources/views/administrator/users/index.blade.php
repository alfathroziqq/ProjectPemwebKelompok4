@extends('administrator.masteradmin')

@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Manage User</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="{{ asset('css/admin_wilayah.css') }}">
    </head>

    <body>
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-8">
                            <h2 class="fw-bold">Manage User</h2>
                        </div>
                        <div class="col-sm-4">
                            <div class="search-box">
                                <i class="material-icons">&#xE8B6;</i>
                                <form action="{{ route('users.index') }}" method="GET">
                                    <input type="text" name="search" class="form-control" placeholder="Search&hellip;"
                                        value="{{ request()->query('search') }}">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="{{ route('users.create') }}" class="btn btn-success mb-2">Tambah User Baru</a>
                <table class="table table-striped table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Username</th>
                            <th>Role</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1; // Mulai dari 1 untuk setiap halaman
                        @endphp
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $i++ }}</td> <!-- Nomor urut -->
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->role }}</td>
                                <td>
                                    <a href="#" class="edit" title="Edit" data-toggle="tooltip"
                                        data-id="{{ $user->id_user }}" data-username="{{ $user->username }}"
                                        data-role="{{ $user->role }}">
                                        <i class="material-icons">&#xE254;</i>
                                    </a>
                                    <a href="#" class="change-password" title="Change Password" data-toggle="tooltip"
                                        data-id="{{ $user->id_user }}">
                                        <i class="material-icons">verified_user</i>
                                    </a>
                                    <form action="{{ route('users.destroy', $user->id_user) }}" method="POST"
                                        style="display:inline;" data-id="{{ $user->id_user }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="delete" title="Delete" data-toggle="tooltip"
                                            style="border:none; background:none;"><i
                                                class="material-icons">&#xE872;</i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="clearfix">
                    <div class="hint-text">Menampilkan <b>{{ $users->count() }}</b> dari
                        <b>{{ $users->total() }}</b>
                    </div>
                    <ul class="pagination">
                        <li class="page-item {{ $users->currentPage() == 1 ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ $users->url(1) }}">First</a>
                        </li>
                        <li class="page-item {{ $users->currentPage() <= 1 ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ $users->previousPageUrl() }}">Previous</a>
                        </li>
                        @for ($i = 1; $i <= $users->lastPage(); $i++)
                            <li class="page-item {{ $users->currentPage() == $i ? ' active' : '' }}">
                                <a class="page-link" href="{{ $users->url($i) }}">{{ $i }}</a>
                            </li>
                        @endfor
                        <li class="page-item {{ $users->currentPage() == $users->lastPage() ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ $users->nextPageUrl() }}">Next</a>
                        </li>
                        <li class="page-item {{ $users->currentPage() == $users->lastPage() ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ $users->url($users->lastPage()) }}">Last</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Delete Confirmation Modal -->
        <div class="modal fade" id="deleteConfirmationModal" tabindex="-1" aria-labelledby="deleteConfirmationModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteConfirmationModalLabel">Delete User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete this user?
                    </div>
                    <div class="modal-footer">
                        <form id="deleteForm" method="POST" action="">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit User Modal -->
        <div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editUserModalLabel">Edit User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="editForm" action="" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id_user" id="edit_id_user">
                            <div class="form-group">
                                <label for="edit_username">Username</label>
                                <input type="text" class="form-control" id="edit_username" name="username" required>
                            </div>
                            <div class="form-group">
                                <label for="edit_role">Role</label>
                                <select class="form-control" id="edit_role" name="role" required>
                                    <option value="administrator">Administrator</option>
                                    <option value="admin_wilayah">Admin Wilayah</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Change Password Modal -->
        <div class="modal fade" id="changePasswordModal" tabindex="-1" aria-labelledby="changePasswordModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="changePasswordModalLabel">Change Password</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="changePasswordForm" action="" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id_user" id="change_password_id_user">
                            <div class="form-group">
                                <label for="new_password">New Password</label>
                                <input type="password" class="form-control" id="new_password" name="new_password"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="confirm_password">Confirm Password</label>
                                <input type="password" class="form-control" id="confirm_password"
                                    name="new_password_confirmation" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Change Password</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script>
            $(document).ready(function() {
                // Edit user
                $('.edit').on('click', function() {
                    var id_user = $(this).data('id');
                    var username = $(this).data('username');
                    var role = $(this).data('role');

                    $('#edit_id_user').val(id_user);
                    $('#edit_username').val(username);
                    $('#edit_role').val(role);
                    $('#editForm').attr('action', '/users/' + id_user);

                    $('#editUserModal').modal('show');
                });

                // Change password
                $('.change-password').on('click', function() {
                    var id_user = $(this).data('id');

                    $('#change_password_id_user').val(id_user);
                    $('#changePasswordForm').attr('action', '/users/change-password/' + id_user);

                    $('#changePasswordModal').modal('show');
                });

                // Delete user
                $('.delete').on('click', function() {
                    var id_user = $(this).closest('form').data('id');
                    $('#deleteForm').attr('action', '/users/' + id_user);
                    $('#deleteConfirmationModal').modal('show');
                });

                // Close modal on 'X' button click
                $('.modal .close').on('click', function() {
                    $(this).closest('.modal').modal('hide');
                });

                // Close modal on 'Close' button click
                $('.modal-footer .btn-secondary').on('click', function() {
                    $(this).closest('.modal').modal('hide');
                });
            });
        </script>
    </body>

    </html>
@endsection
