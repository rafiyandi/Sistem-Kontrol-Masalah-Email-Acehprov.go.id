@extends('layouts.index')

@section('content')
        <!-- Begin Page Content -->
    <div class="container-fluid">

            <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Data Kontrol Masalah {{ $item->id }}</h1>
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
                <form action="{{route('kontrol.update', $item->id)}}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="server">Server</label>
                        <select name="server" class="form-control">
                            <option value="mail.acehprov.go.id" {{ $item->server == "mail.acehprov.go.id" ? 'selected' : '' }} >mail.acehprov.go.id</option>
                            <option value="mail2.acehprov.go.id" {{ $item->server == "mail2.acehprov.go.id" ? 'selected' : '' }}>mail2.acehprov.go.id</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="deskripsi_masalah">Deskripsi Masalah</label>
                        <textarea name="deskripsi_masalah" cols="20" rows="5" class="form-control">{{ $item->deskripsi_masalah }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="kategori">Kategori</label>
                        <select name="kategori" class="form-control">
                            <option value="spam" {{ $item->serve == 'spam' ? "selected" : '' }}>Spam</option>
                            <option value="server" {{ $item->serve == 'server' ? "selected" : '' }}>server</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="deskripsi_penyelesaian">Deskirpsi Penyelesaian</label>
                        <textarea name="deskripsi_penyelesaian" cols="20" rows="5" class="form-control">{{ $item->deskripsi_penyelesaian }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="koordinasi">Koordinasi</label>
                        <input type="text" name="koordinasi" class="form-control" value="{{ $item->koordinasi }}">
                    </div>

                    <div class="form-group">
                        <label for="ket">Keterangan</label>
                        <input type="text" name="ket" class="form-control" value="{{ $item->ket }}">
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Ubah</button>

                </form>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection
