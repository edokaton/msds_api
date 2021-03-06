@extends('view.index')

@section('content')

	@include('view.header')

	<div class="main-view">
		<div class="create-form-container">
			<header class="create-form-title">
				<p>Tambah Data MSDS</p>
			</header>
			<main class="create-form-wrapper">
				@if (session('success'))
				    <div class="alert alert-success alert-dismissible" role="alert">
					  	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					  	{{ session('success') }}
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

				<form action="{{ route('msds.save') }}" method="post" role="form" enctype="multipart/form-data">
					{{ csrf_field() }}

					<div class="form-group">
						<label for="nama">Nama Zat Kimia</label>
						<input type="text" name="nama" id="nama" class="form-control nama" placeholder="Nama Zat Kimia" />
					</div>

					<div class="form-group">
						<label for="konten1">1</label>
						<textarea name="konten1" id="konten1" class="form-control" rows="5" placeholder="Identitas bahan dan nama perusahaan"></textarea>
					</div>

					<div class="form-group">
						<label for="konten2">2</label>
						<textarea name="konten2" id="konten2" class="form-control" rows="5" placeholder="Komposisi bahan"></textarea>
					</div>

					<div class="form-group">
						<label for="konten3">3</label>
						<textarea name="konten3" id="konten3" class="form-control" rows="5" placeholder="Identifikasi bahaya"></textarea>
					</div>

					<div class="form-group">
						<label for="konten4">4</label>
						<textarea name="konten4" id="konten4" class="form-control" rows="5" placeholder="Tindakan P3K"></textarea>
					</div>

					<div class="form-group">
						<label for="konten5">5</label>
						<textarea name="konten5" id="konten5" class="form-control" rows="5" placeholder="Tindakan penanggulangan kebakaran"></textarea>
					</div>

					<div class="form-group">
						<label for="konten6">6</label>
						<textarea name="konten6" id="konten6" class="form-control" rows="5" placeholder="Tindakan mengatasi tumpahan dan kebocoran"></textarea>
					</div>

					<div class="form-group">
						<label for="konten7">7</label>
						<textarea name="konten7" id="konten7" class="form-control" rows="5" placeholder="Penyimpanan dan penanganan bahan"></textarea>
					</div>

					<div class="form-group">
						<label for="konten8">8</label>
						<textarea name="konten8" id="konten8" class="form-control" rows="5" placeholder="Pengendalian pemajanan dan alat pelindung diri"></textarea>
					</div>

					<div class="form-group">
						<label for="konten9">9</label>
						<textarea name="konten9" id="konten9" class="form-control" rows="5" placeholder="Sifat fisika dan kimia"></textarea>
					</div>

					<div class="form-group">
						<label for="konten10">10</label>
						<textarea name="konten10" id="konten10" class="form-control" rows="5" placeholder="Stabilitas dan reaktifitas bahan"></textarea>
					</div>

					<div class="form-group">
						<label for="konten11">11</label>
						<textarea name="konten11" id="konten11" class="form-control" rows="5" placeholder="Informasi toksikologi"></textarea>
					</div>

					<div class="form-group">
						<label for="konten12">12</label>
						<textarea name="konten12" id="konten12" class="form-control" rows="5" placeholder="Informasi ekologi"></textarea>
					</div>

					<div class="form-group">
						<label for="konten13">13</label>
						<textarea name="konten13" id="konten13" class="form-control" rows="5" placeholder="Pembuangan limbah"></textarea>
					</div>

					<div class="form-group">
						<label for="konten14">14</label>
						<textarea name="konten14" id="konten14" class="form-control" rows="5" placeholder="Pengangkutan bahan"></textarea>
					</div>

					<div class="form-group">
						<label for="konten15">15</label>
						<textarea name="konten15" id="konten15" class="form-control" rows="5" placeholder="Informasi peraturan perundangan yang berlaku"></textarea>
					</div>

					<div class="form-group">
						<label for="konten16">16</label>
						<textarea name="konten16" id="konten16" class="form-control" rows="5" placeholder="Informasi lain yang diperlukan"></textarea>
					</div>

					<!-- <div class="form-group">
						<label for="konten17">17</label>
						<textarea name="konten17" id="konten17" class="form-control" rows="5" placeholder="Informasi lain yang diperlukan"></textarea>
					</div> -->

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
	</script>
@endsection