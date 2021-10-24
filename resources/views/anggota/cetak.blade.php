<!DOCTYPE html>
<html>
<head>
    <title>Hi</title>
</head>
<body>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nama Anggota</th>
            <th>Jabatan</th>
            <th>Deskripsi</th>
            {{-- <th>Gambar</th> --}}
        </tr>
        @foreach ( $anggotas as $index => $row )
        <tr>
            <td>{{ $index + 1}}</td>
            <td>{{ $row->nama }}</td>
            <td>{{ $row->jabatan }}</td>
            <td>{{ $row->body }}</td>
            {{-- <td><img src="{{ public_path('storage/'. $row->foto_anggota) }}" width="100"></td> --}}
        </tr>
        @endforeach

    </table>

    {{-- <h1>{{$anggotas}}</h1> --}}
</body>
</html>
