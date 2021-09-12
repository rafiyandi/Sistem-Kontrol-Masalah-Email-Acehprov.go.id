@extends('layouts.index')

@section('content')
        <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tambah Data Kontrol Masalah</h1>
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
                <form action="{{ route('kontrol.store') }}" method="POST">
                    @csrf
                    <div class="">
                        <label for="server">Kode Dinas</label>
                        <input name="skpa_id" class="form-control" list="datalistOptions" id="exampleDataList" placeholder="Type to search...">
                        <datalist id="datalistOptions">
                             @foreach ($items as $item)
                            <option value="{{$item->id}}">{{$item->Nm_dinas}}</option>
                            @endforeach

                        </datalist>

                    </div>
                    {{-- <label for="exampleDataList" class="form-label">Datalist example</label> --}}

                    <div class="form-group">
                        <label for="server">Server</label>
                        <select name="server" class="form-control">
                            <option value="mail.acehprov.go.id">mail.acehprov.go.id</option>
                            <option value="mail2.acehprov.go.id">mail2.acehprov.go.id</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="deskripsi_masalah">Deskripsi Masalah</label>
                        <textarea name="deskripsi_masalah" cols="20" rows="5" class="form-control">{{ old('deskripsi_masalah') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="kategori">Kategori</label>
                        <select name="kategori" class="form-control">
                            <option value="spam">Spam</option>
                            <option value="server">server</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="deskripsi_penyelesaian">Deskirpsi Penyelesaian</label>
                        <textarea name="deskripsi_penyelesaian" cols="20" rows="5" class="form-control">{{ old('deskripsi_penyelesaian') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="koordinasi">Koordinasi</label>
                        <input type="text" name="koordinasi" class="form-control" value="{{ old('koordinasi') }}">
                    </div>
                    <div class="form-group">
                        <label for="pelapor">Pelapor</label>
                        <input type="text" name="pelapor" class="form-control" value="{{ old('pelapor') }}">
                    </div>
                    <div class="form-group">
                        <label for="no_hp">No HP</label>
                        <input type="text" name="no_hp" class="form-control" value="{{ old('no_hp') }}">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" class="form-control" value="{{ old('email') }}">
                    </div>

                    <div class="form-group">
                        <label for="ket">Keterangan</label>
                        <input type="text" name="ket" class="form-control" value="{{ old('ket') }}">
                    </div>


                    <button type="submit" class="btn btn-primary btn-block">Simpan</button>

                </form>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection
