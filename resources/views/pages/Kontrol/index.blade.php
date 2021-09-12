@extends('layouts.index')

@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            {{-- <h1 class="h3 mb-0 text-gray-800">Data Kontrol Masalah</h1> --}}
             @if (Auth::user()->level == 'admin')
             <a href="{{ route('kontrol.create') }}" class="btn btn-sm btn-primary shadow-sm">
                 <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data Kontrol Masalah
             </a>
            @endif
            <a href="{{ route('view.kontrol') }}" class="btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-download fa-sm text-white-50"></i> Download PDF
            </a>
        </div>


        <div class="row">
            <div class="card-body">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Kode Dinas</th>
                            <th>Tanggal</th>
                            <th>Jam</th>
                            <th>Server</th>
                            <th>Deskripsi Masalah</th>
                            <th>Kategori</th>
                            <th>Deskripsi Penyelesaian</th>
                            <th>Koordinasi</th>
                            <th>Keterangan</th>
                            <th>Pelapor</th>
                            <th>No HP</th>
                            <th>Email</th>
                            @if (Auth::user()->level == 'admin')
                            <th>Aksi</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($items as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->skpa->Kd_dinas}}</td>
                                <td>{{ $item->tgl }}</td>
                                <td>{{ $item->jam}}</td>
                                <td>{{ $item->server}}</td>
                                <td>{{ $item->deskripsi_masalah}}</td>
                                <td>{{ $item->kategori}}</td>
                                <td>{{ $item->deskripsi_penyelesaian}}</td>
                                <td>{{ $item->koordinasi}}</td>
                                <td>{{ $item->ket}}</td>
                                <td>{{ $item->pelapor}}</td>
                                <td>{{ $item->no_hp}}</td>
                                <td>{{ $item->email}}</td>
                                @if (Auth::user()->level == 'admin')
                                <td>
                                    <a href="{{ route('kontrol.edit',$item->id) }}" class="btn btn-info">
                                        <i class="fa fa-pencil-alt"></i>
                                    </a>
                                    <form action="{{ route('kontrol.destroy',$item->id) }}" method="post" class="d-inline">
                                        @csrf
                                        @method('delete')

                                        <button class="btn btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                                @endif
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center" colspan="7">
                                    Data Kosong
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                {{ $items->links() }}
            </div>
        </div>

    </div>
@endsection
