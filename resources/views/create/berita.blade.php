@extends('view.index')

@section('content')

	@include('view.header')

	<div class="main-view">
		<div class="create-form-container">
			<header class="create-form-title">
				<p>TAMBAH BERITA KEGIATAN</p>
			</header>
			<main class="create-form-wrapper">
				@if (session('success'))
				    <div class="alert alert-success alert-dismissible" role="alert">
					  	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					  	Data Berita Kegiatan berhasil ditambahkan..
					</div>
				@endif

				@if (count($errors) > 0)
				    <div class="alert alert-danger alert-dismissible">
				        <ul>
				            @foreach ($errors->all() as $error)
				                <li>{{ $error }}</li>
				            @endforeach
				        </ul>
				    </div>
				@endif
				<div class="img-placeholder-wrapper">
					<p>Foto Berita Kegiatan</p>
					<img class="img-placeholder" id="ph1" src="{{ asset('img/pecahan/uploadfoto.png') }}" alt="image upload placeholder" />
					<img class="img-placeholder" id="ph2" src="{{ asset('img/pecahan/uploadfoto.png') }}" alt="image upload placeholder" />
					<img class="img-placeholder" id="ph3" src="{{ asset('img/pecahan/uploadfoto.png') }}" alt="image upload placeholder" />
					<em class="upload-instruction">*klik gambar untuk menambahkan foto</em>
				</div>

				<form action="{{ route('berita.store') }}" method="post" role="form" enctype="multipart/form-data">
					{{ csrf_field() }}

					<input type="file" name="foto[]" class="img-uploader" id="foto1" class="form-control">
					<input type="file" name="foto[]" class="img-uploader" id="foto2" class="form-control">
					<input type="file" name="foto[]" class="img-uploader" id="foto3" class="form-control">

					<div class="form-group">
						<label for="judul">Judul Berita Kegiatan</label>
						<input type="text" name="judul" id="judul" class="form-control judul" placeholder="Judul berita kegiatan" />
					</div>

					<div class="form-group">
						<label for="kategori">Kategori</label>
						<select name="kategori" id="kategori" class="form-control">
							<option value="">Pilih</option>
							<option value="1">Artistik Putra</option>
							<option value="2">Artistik Putri</option>
							<option value="3">Aerobic Gymnastic</option>
							<option value="4">Ritmik</option>
							<option value="5">General Gymnastic</option>
							<option value="6">Acrobatic Gymnastic</option>
							<option value="7">Trampolin Gymnastic</option>
							<option value="8">Senam Umum</option>
							<option value="9">Umum</option>
						</select>
					</div>

					<div class="form-group">
						<label for="deskripsi">Content</label>
						<textarea name="deskripsi" id="deskripsi" class="form-control" rows="5" placeholder="Content"></textarea>
					</div>

					<button type="submit" class="btn btn-danger create-form-submit">Submit</button>
				</form>
			</main>
		</div>
	</div>

	@include('view.footer')

	<script type="text/javascript">

		var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

		$(document).ready(function(){
			$('.sidebar-li.berita').addClass('active');			
		});

		$('#ph1').click(function(){
			$('#foto1').click();

			function readURL(input) {
				if (input.files && input.files[0]) {
					var reader = new FileReader();
					reader.onload = function (e) {
						$('#ph1').attr('src', e.target.result);
					}
					reader.readAsDataURL(input.files[0]);
				}
			}
			$("#foto1").change(function(){
				readURL(this);
			});

			return false;
		});

		$('#ph2').click(function(){
			$('#foto2').click();

			function readURL(input) {
				if (input.files && input.files[0]) {
					var reader = new FileReader();
					reader.onload = function (e) {
						$('#ph2').attr('src', e.target.result);
					}
					reader.readAsDataURL(input.files[0]);
				}
			}
			$("#foto2").change(function(){
				readURL(this);
			});

			return false;
		});

		$('#ph3').click(function(){
			$('#foto3').click();

			function readURL(input) {
				if (input.files && input.files[0]) {
					var reader = new FileReader();
					reader.onload = function (e) {
						$('#ph3').attr('src', e.target.result);
					}
					reader.readAsDataURL(input.files[0]);
				}
			}
			$("#foto3").change(function(){
				readURL(this);
			});

			return false;
		});
	</script>
@endsection