@extends('layouts.index')

@section('content')
        <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Data SKPA {{ $item->Nm_dinas }}</h1>
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
               <form action="{{route('data-email.update', $item->id)}}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="Kd_dinas">Kode Dinas</label>
                        <input type="text" name="Kd_dinas" id="Kd_dinas" placeholder="masukan kode dinas" value="{{ $item->kd_dinas }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="ni">Nip</label>
                        <input type="number" name="ni" id="ni" placeholder="masukan nama NIP/NHI" disabled value="{{ $item->ni }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="nama_p">Nama pengguna</label>
                        <input type="text" name="nama_p" id="nama_p" placeholder="masukan nama pengguna" value="{{ $item->nama_p }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="gd">Gelar Depan</label>
                        <input type="text" name="gd" id="gd" placeholder="masukan  gelar depan" value="{{ $item->gd }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="gb">Gelar Belakang</label>
                        <input type="text" name="gb" id="gb" placeholder="masukan  gelar belakang" value="{{ $item->gb }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="hp">Nomor Hp</label>
                        <input type="number" name="hp" id="hp" placeholder="masukan  nomor HP" value="{{ $item->hp }}" class="form-control">
                    </div>

                     <div class="form-group">
                        <label for="nama_e">Nama Email</label>
                        <input type="email" name="nama_e" id="nama_e" placeholder="masukan  gelar belakang" value="{{ $item->nama_e }}" class="form-control">
                    </div>

                     <div class="form-group">
                        <label for="jabatan">Jabatan</label>
                        <input type="text" name="jabatan" id="jabatan" placeholder="masukan jabatan" value="{{ $item->jabatan }}" class="form-control">
                    </div>

                    <div class="form-group d-inline-block col-sm-3">
                        <label for="gol">Golongan/Ruang</label>
                        <input type="text" name="gol" id="gol" placeholder="masukan gololngan" value="{{ $item->gol }}" class="form-control">
                    </div>
                     <div class="form-group d-inline-block col-sm-4">
                        <label for="jenis">Jenis</label>
                        <select name="jenis" class="form-control">
                            <option value="Personal" {{ $item->jenis == 'Personal' ? 'selected' : '' }}>Personal</option>
                            <option value="Instansi" {{ $item->jenis == 'Instansi' ? 'selected' : '' }}>Instansi</option>
                        </select>
                    </div>
                     <div class="form-group d-inline-block col-sm-4">
                        <label for="jenis">Jenis</label>
                        <select name="jenis" class="form-control">
                            <option value="Personal" {{ $item->status == 'Aktif' ? 'selected' : '' }}>Personal</option>
                            <option value="Instansi" {{ $item->status == 'Non Aktif' ? 'selected' : '' }}>Instansi</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Simpan</button>

                </form>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection
