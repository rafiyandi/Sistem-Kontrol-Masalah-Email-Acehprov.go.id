@extends('layouts.index')

@section('content')
        <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tambah Data SKPA</h1>
        </div>

        @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
        @endif

        <div class="card">
            <div class="card-body">
                <form action="{{ route('spka.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="kd_dinas">Kode Dinas</label>
                        <input type="text" name="Kd_dinas" id="Kd_dinas" placeholder="masukan kode dinas" value="{{ old('kd_dinas') }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="nm_dinas">Nama Dinas</label>
                        <input type="text" name="Nm_dinas" id="nm_dinas" placeholder="masukan nama dinas" value="{{ old('nm_dinas') }}" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Simpan</button>

                </form>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection
