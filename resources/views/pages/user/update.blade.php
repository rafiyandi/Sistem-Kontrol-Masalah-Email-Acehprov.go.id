@extends('layouts.index')

@section('content')
        <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Data User {{ $item->name }}</h1>
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
                <form action="{{route('user.update', $item->id)}}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" name="name" id="name" placeholder="masukan kode dinas" value="{{ $item->name }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="jabatan">Jabatan</label>
                        <input type="text" name="jabatan" id="jabatan" placeholder="masukan nama dinas" value="{{ $item->jabatan }}" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="jabatan">Nama Dinas</label>
                        <select name="level" class="form-control">
                            <option value="admin" {{ $item->level == 'admin' ? 'selected' : ''}}>Admin</option>
                            <option value="user" {{ $item->level == 'user' ? 'selected' : ''}}>User</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Ubah</button>
                </form>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection
