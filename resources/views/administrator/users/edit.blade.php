<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h1>Edit User</h1>

        <form action="{{ route('users.update', $user) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" class="form-control" value="{{ $user->username }}" required>
            </div>
            <div class="form-group">
                <label for="password">Password (leave blank to keep current password)</label>
                <input type="password" name="password" class="form-control">
            </div>
            <div class="form-group">
                <label for="role">Role</label>
                <select name="role" class="form-control" required>
                    <option value="administrator" {{ $user->role == 'administrator' ? 'selected' : '' }}>Administrator</option>
                    <option value="admin_wilayah" {{ $user->role == 'admin_wilayah' ? 'selected' : '' }}>Admin Wilayah</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
        
    </div>
</body>
</html>
