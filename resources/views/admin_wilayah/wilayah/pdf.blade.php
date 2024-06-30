<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Wilayah</title>
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
    <h2>Daftar Wilayah</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Provinsi</th>
                <th>Jumlah Kartu Keluarga</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($wilayahs as $index => $wilayah)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $wilayah->nama_provinsi }}</td>
                    <td>{{ $wilayah->kartu_keluargas_count }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
