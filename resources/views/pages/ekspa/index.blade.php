@extends('layouts.index')

@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">DATA SKPA</h1>
                @if (Auth::user()->level == 'admin')
                <a href="{{ route('spka.create') }}" class="btn btn-sm btn-primary shadow-sm">
                    <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data SKPA
                </a>
            @endif
        </div>

        <div class="row">
            <div class="card-body">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Kode Dinas</th>
                            <th>Nama Dinas</th>
                             @if (Auth::user()->level == 'admin')
                                <th>Akasi</th>
                             @endif
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($items as $item)
                            <tr>
                                <td>{{ $item->Kd_dinas }}</td>
                                <td>{{ $item->Nm_dinas}}</td>
                                 @if (Auth::user()->level == 'admin')
                                 <td>
                                     <a href="{{ route('spka.edit',$item->id) }}" class="btn btn-info">
                                         <i class="fa fa-pencil-alt"></i>
                                     </a>
                                     <form action="{{ route('spka.destroy',$item->id) }}" method="post" class="d-inline">
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
