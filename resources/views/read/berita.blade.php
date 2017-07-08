@extends('view.index')

@section('content')

	@include('view.header')

	<div class="main-view">
		<div class="create-new-data">
			<a href="{{ route('berita.create') }}">
				<button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-plus"></span> Tambah Berita Kegiatan</button>
			</a>
		</div>
		<div class="datatable-container">
			<div class="datatable-title">
				<img src="{{ asset('img/pecahan/berita2.png') }}" alt="persani berita icon" style="width: 30px;" />
				<p>Data Berita Kegiatan</p>
				<div class="clearfix"></div>
			</div>
			<div class="table-responsive">
				<table id="prstable" class="table table-bordered table-condensed" width="100%" cellspacing="0">
			        <thead>
			            <tr>
			            	<th>No.</th>
			                <th>Judul Berita Kegiatan</th>
			                <th>Content</th>
			                <th>Kategori</th>
			                <th>Penulis</th>
			                <th>Waktu Upload</th>
			                <th>Action</th>
			            </tr>
			        </thead>
			        <tbody>
			        	<?php $no = 1; ?>
			        	@foreach($berita as $news)
			        	<tr>
			        		<th>{{ $no }}</th>
			        		<td>{{ $news->title }}</td>
			        		<td>{{ $news->content }}</td>
			        		<td>Senam Artistik</td>
			        		<td>Bambang</td>
			        		<td>{{ $news->time }}</td>
			        		<td class="action-td">
			        			<a href="{{ route('berita.edit', $news->id) }}" class="action-anchor">
			        				<img src="{{ asset('img/pecahan/edit.png') }}" alt="edit icon" class="action-btn" />
			        			</a>
			        			<!-- <a href="" class="action-anchor" data-toggle="modal" data-target="#delete-modal"> -->
			        				<img src="{{ asset('img/pecahan/hapus.png') }}" alt="delete icon" class="action-btn" data-toggle="modal" data-target="#delete-modal{{ $news->id }}" />
			        			<!-- </a> -->
			        		</td>
			        	</tr>
			        	<?php $no+=1; ?>
			        	@endforeach
			        </tbody>
			    </table>
			</div>
		</div>
	</div>

	@foreach($berita as $news)
	<div class="modal fade" id="delete-modal{{ $news->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel">
		<div class="modal-dialog delete" role="document">
		    <div class="modal-content">
		      <div class="modal-header custom">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="deleteModalLabel">Apakah Anda ingin menghapus data berita kegiatan?</h4>
		      </div>
		      <div class="modal-footer delete">
		      	<form action="{{ url('/berita/delete', $news->id) }}" id="delete-kegiatan" method="post" role="form">
		      		{{ csrf_field() }}
		        	<button type="button" class="btn btn-danger delete-submit-btn">Ya</button>
		        </form>
		        <button type="button" class="btn btn-primary delete-cancel-btn" data-dismiss="modal">Batal</button>
		      </div>
		    </div>
		</div>
	</div>
	@endforeach

	@include('view.footer')

	<script type="text/javascript">

		$('.sidebar-li.berita').addClass('active');

		var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

		$(document).ready(function(){
			$('#prstable').DataTable( {
		    	"lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ]
			});
		});
	</script>
@endsection