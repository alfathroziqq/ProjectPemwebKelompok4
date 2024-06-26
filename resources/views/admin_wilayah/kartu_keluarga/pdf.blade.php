<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kartu Keluarga</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #000;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #4CAF50;
            color: black;
            text-align: center;
        }
        td {
            background-color: #f9f9f9;
        }
        tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Daftar Kartu Keluarga</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nomor KK</th>
                <th>Kepala Keluarga</th>
                <th>Alamat</th>
                <th>Provinsi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kartuKeluargas as $index => $kk)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $kk->nomor_kk }}</td>
                    <td>{{ $kk->kepala_keluarga }}</td>
                    <td>{{ $kk->alamat }}</td>
                    <td>{{ $kk->wilayah->nama_provinsi }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
