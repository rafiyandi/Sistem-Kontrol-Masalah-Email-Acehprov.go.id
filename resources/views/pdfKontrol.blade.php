<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        th{
            font-size: 5px
        }
        td{
            font-size: 5px

        }
    </style>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Kode Dinas</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Jam</th>
                    <th scope="col">Server</th>
                    <th scope="col">Deskripsi Masalah</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Deskripsi Penyelesaian</th>
                    <th scope="col">Koordinasi</th>
                    <th scope="col">Keterangan</th>
                    <th scope="col">Pelapor</th>
                    <th scope="col">No HP</th>
                    <th scope="col">Email</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @forelse ($data as $item)
                    <tr>
                        <td>{{ $item->skpa->Kd_dinas }}</td>
                        <td>{{ $item->tgl }}</td>
                        <td>{{ $item->jam }}</td>
                        <td>{{ $item->server }}</td>
                        <td>{{ $item->deskripsi_masalah}}</td>
                        <td>{{ $item->kategori}}</td>
                        <td>{{ $item->deskripsi_penyelesaian}}</td>
                        <td>{{ $item->koordinasi}}</td>
                        <td>{{ $item->ket}}</td>
                        <td>{{ $item->pelapor }}</td>
                        <td>{{ $item->no_hp }}</td>
                        <td>{{ $item->email }}</td>
                    </tr>
                @empty

                @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>
