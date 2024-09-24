<!DOCTYPE html>
<html>
    <head>
        <title>Keluhan Pelanggan</title>
    </head>
    <body>
        <h1>Keluhan Pelanggan</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Nomor HP</th>
                    <th>Status Keluhan</th>
                    <th>Keluhan</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>
                @foreach($keluhan as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->nomor_hp }}</td>
                    <td>{{ $item->status_keluhan }}</td>
                    <td>{{ $item->keluhan }}</td>
                    <td>{{ $item->created_at }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </body>
</html>