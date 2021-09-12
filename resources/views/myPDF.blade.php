<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        th{
            font-size: 10px
        }
        td{
            font-size: 10px
        }
    </style>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Kode Dinas</th>
                    <th scope="col">NIP/NHI</th>
                    <th scope="col">Nama PenggunaI</th>
                    <th scope="col">Nomor HP</th>
                    <th scope="col">Nama Email</th>
                    <th scope="col">Jabatan Lengkap</th>
                    <th scope="col">Gol/Ruang</th>
                    <th scope="col">Tanggal Daftar</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @forelse ($data as $item)
                    <tr>
                        <th scope="row">{{$no++}}</th>
                        <td>{{ $item->kd_dinas }}</td>
                        <td>{{ $item->ni }}</td>
                        <td>{{ $item->nama_p }}  {{ $item->gd }},{{ $item->gb }}</td>
                        <td>{{ $item->hp }}</td>
                        <td>{{ $item->nama_e }}</td>
                        <td>{{ $item->jabatan }}</td>
                        <td>{{ $item->gol }}</td>
                        <td>{{ $item->tanggal }}</td>
                        <td>{{ $item->status }}</td>
                    </tr>
                @empty

                @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>
