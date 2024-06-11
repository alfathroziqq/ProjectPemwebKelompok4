<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@500&display=swap" rel="stylesheet">
    <title>Register</title>
    <style>
        body {
            font-family: "Raleway", sans-serif;
            margin: 0;
            padding: 0;
            background-color: #7f7f7f;
        }

        h1 {
            text-align: center;
            color: #000000;
            margin-top: 30px;
            font-weight: bold;
        }

        form {
            max-width: 35%;
            margin: auto;
            background-color: #d9d9d9;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            width: 80%;
            margin: auto;
            margin-bottom: 20px;
        }

        label {
            color: #2c2c2c;
            font-weight: bold;
            display: block;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border-radius: 9px;
            border: 1px solid #2c2c2c;
        }

        button {
            width: 80%;
            margin: auto;
            margin-top: 7%;
            padding: 10px;
            background-color: #FEAA00;
            color: white;
            border: none;
            border-radius: 9px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            font-family: 'Poppins', sans-serif;
        }

        button:hover {
            background-color: #6c7a01;
        }

        p {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="mx-auto mt-5">
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <h1>Register</h1>
            <div class="form-group">
                <label for="username" class="form-label">Username</label>
                <input type="text" value="{{ old('username') }}" name="username" id="username" class="form-control">
                @error('username')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control">
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
                <button name="submit" type="submit">Register</button>
            </div>
            <div class="d-grid">
                <p>Sudah punya akun? <a href="{{ route('login') }}">Login</a></p>
            </div>
        </form>
    </div>
</body>

</html>
