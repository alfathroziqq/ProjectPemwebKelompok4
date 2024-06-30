<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Rumah</title>
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
            color: white;
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
    <h2>Daftar Rumah</h2>
    <table>
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
            @foreach ($rumahs as $index => $rumah)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $rumah->kartuKeluarga->nomor_kk ?? 'N/A' }}</td>
                    <td>{{ $rumah->alamat }}</td>
                    <td>{{ $rumah->luas_rumah }}</td>
                    <td>{{ $rumah->jumlah_kamar }}</td>
                    <td>{{ $rumah->spesifikasi_rumah }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
