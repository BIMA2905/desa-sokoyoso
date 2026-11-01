<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin Pesan</title>

    <style>
        body{
            font-family: Arial;
            background: #f5f5f5;
            padding: 30px;
        }

        h1{
            text-align: center;
            margin-bottom: 30px;
        }

        table{
            width: 100%;
            border-collapse: collapse;
            background: white;
        }

        table th,
        table td{
            border: 1px solid #ddd;
            padding: 12px;
        }

        table th{
            background: #198754;
            color: white;
        }

        tr:nth-child(even){
            background: #f9f9f9;
        }
    </style>
</head>
<body>

    <h1>Data Pesan Warga</h1>

    <table>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Pesan</th>
        </tr>

        @foreach($pesans as $pesan)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $pesan->nama }}</td>
            <td>{{ $pesan->email }}</td>
            <td>{{ $pesan->pesan }}</td>
        </tr>
        @endforeach

    </table>

</body>
</html>