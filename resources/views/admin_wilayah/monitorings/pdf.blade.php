<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Monitoring</title>
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
    <h2>Daftar Monitoring</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Provinsi</th>
                <th>Latitude</th>
                <th>Longitude</th>
                <th>Deskripsi</th>
                <th>Rumah Sehat</th>
                <th>Rumah Tidak Sehat</th>
                <th>Rumah Tidak Layak</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($monitorings as $index => $monitoring)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $monitoring->provinsi }}</td>
                    <td>{{ $monitoring->latitude }}</td>
                    <td>{{ $monitoring->longitude }}</td>
                    <td>{{ $monitoring->deskripsi }}</td>
                    <td>{{ $monitoring->rumah_sehat }}</td>
                    <td>{{ $monitoring->rumah_tidak_sehat }}</td>
                    <td>{{ $monitoring->rumah_tidak_layak }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
