@extends('layouts.index')

@section('content')
        <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tambah Data Email</h1>
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
                <form action="{{ route('data-email.store') }}" method="POST">
                    @csrf
                    <label for="Kd_dinas">Kode Dinas</label>
                    <div class="form-group">
                        <input type="text" name="Kd_dinas" id="Kd_dinas" placeholder="masukan kode dinas" value="{{ old('Kd_dinas') }}" class="form-control d-inline-block col-sm-2">
                        <span id="pesan" class=""></span>
                    </div>

                    <div class="form-group">
                        <label for="ni">Nip</label>
                        <input type="number" name="ni" id="cek" placeholder="masukan nama NIP/NHI" value="{{ old('ni') }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="nama_p">Nama pengguna</label>
                        <input type="text" name="nama_p" id="cek2" placeholder="masukan nama pengguna" value="{{ old('nama_p') }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="gd">Gelar Depan</label>
                        <input type="text" name="gd" id="cek3" placeholder="masukan  gelar depan" value="{{ old('gd') }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="gb">Gelar Belakang</label>
                        <input type="text" name="gb" id="cek4" placeholder="masukan  gelar belakang" value="{{ old('gb') }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="hp">Nomor Hp</label>
                        <input type="number" name="hp" id="cek5" placeholder="masukan  nomor HP" value="{{ old('hp') }}" class="form-control">
                    </div>

                     <div class="form-group">
                        <label for="nama_e">Nama Email</label>
                        <input type="email" name="nama_e" id="cek7" placeholder="masukan  gelar belakang" value="{{ old('nama_e') }}" class="form-control">
                    </div>

                     <div class="form-group">
                        <label for="jabatan">Jabatan</label>
                        <input type="text" name="jabatan" id="cek8" placeholder="masukan jabatan" value="{{ old('jabatan') }}" class="form-control">
                    </div>

                    <div class="form-group d-inline-block col-sm-3">
                        <label for="gol">Golongan/Ruang</label>
                        <input type="text" name="gol" id="gol" placeholder="masukan gololngan" value="{{ old('gol') }}" class="form-control">
                    </div>
                     <div class="form-group d-inline-block col-sm-4">
                        <label for="jenis">Jenis</label>
                        <select name="jenis" class="form-control">
                            <option value="Personal" class="">Personal</option>
                            <option value="Instansi" class="">Instansi</option>
                        </select>
                    </div>
                     <div class="form-group d-inline-block col-sm-4">
                        <label for="status">status</label>
                        <select name="status" class="form-control">
                            <option value="Aktif" class="">Aktif</option>
                            <option value="Non Aktif" class="">Non Aktif</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Simpan</button>

                </form>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection

@push('jquery')
    <script src="{{ url('js/jquery.js') }}"></script>
	<script>
		$(document).ready(function () {
			$('#Kd_dinas').blur(function () {
				$('#pesan').html('<img style="margin-left:10px; width:10px" src="{{ url('img/loading.gif') }}">');
				const Kd_dinas = $(this).val();
                var disabled = $("#cek").prop('disabled');
				$.ajax({
					type: 'GET',
					url: '{{ route('kode') }}',
					data: 'Kd_dinas=' + Kd_dinas,
					success: function (data) {
                            $('#pesan').html(data);
                            if (data == '&#10004; Kode Dinas tersedia') {
                            $( "#cek" ).prop( "disabled", false );
                            $( "#cek2" ).prop( "disabled", false );
                            $( "#cek3" ).prop( "disabled", false );
                            $( "#cek4" ).prop( "disabled", false );
                            $( "#cek5" ).prop( "disabled", false );
                            $( "#cek6" ).prop( "disabled", false );
                            $( "#cek7" ).prop( "disabled", false );
                            $( "#cek8" ).prop( "disabled", false );
                                console.log(1);
                            }else{
                                $( "#cek" ).prop( "disabled", true );
                            $( "#cek2" ).prop( "disabled", true );
                            $( "#cek3" ).prop( "disabled", true );
                            $( "#cek4" ).prop( "disabled", true );
                            $( "#cek5" ).prop( "disabled", true );
                            $( "#cek6" ).prop( "disabled", true );
                            $( "#cek7" ).prop( "disabled", true );
                            $( "#cek8" ).prop( "disabled", true );
                            }
					}
				})

			});
		});
	</script>
@endpush
