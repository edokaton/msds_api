@extends('view.index')

@section('content')

	@include('view.header')

	<div class="main-view">
		<div class="create-new-data">
			<a href="{{ route('msds.create') }}">
				<button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-plus"></span> Tambah data MSDS</button>
			</a>
		</div>
		<div class="datatable-container">
			<div class="datatable-title">
				@if (session('deleted'))
				    <div class="alert alert-warning alert-dismissible" role="alert">
					  	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					  	{{ session('deleted') }}
					</div>
				@endif
				<img src="{{ asset('img/pecahan/berita2.png') }}" alt="persani berita icon" style="width: 30px;" />
				<p>Data MSDS</p>
				<div class="clearfix"></div>
			</div>
			<div class="table-responsive">
				<table id="msdstable" class="table table-bordered table-condensed" width="100%" cellspacing="0">
			        <thead>
			            <tr>
			            	<th>No.</th>
			                <th>Nama Zat Kimia</th>
			                <th>Content</th>
			                <th>created_at</th>
			                <th>updated_at</th>			                
			                <th>Action</th>
			            </tr>
			        </thead>
			        <tbody>
			        	<?php $no = 1; ?>
			        	@foreach($msds as $zat)
			        	<tr>
			        		<th>{{ $no }}</th>
			        		<td>{{ $zat->nama }}</td>
			        		<td>{{ substr($zat->content, 0, 100) }}{{ strlen($zat->content) > 100 ? '...' : '' }}</td>
			        		<td>{{ $zat->created_at }}</td>			        		
			        		<td>{{ $zat->updated_at }}</td>
			        		<td class="action-td">
			        			<a href="{{ route('msds.edit', $zat->id) }}" class="action-anchor">
			        				<img src="{{ asset('img/pecahan/edit.png') }}" alt="edit icon" class="action-btn" />
			        			</a>
			        			<!-- <a href="" class="action-anchor" data-toggle="modal" data-target="#delete-modal"> -->
			        				<img src="{{ asset('img/pecahan/hapus.png') }}" alt="delete icon" class="action-btn" data-toggle="modal" data-target="#delete-modal{{ $zat->id }}" />
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

	@foreach($msds as $zat)
	<div class="modal fade" id="delete-modal{{ $zat->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel">
		<div class="modal-dialog delete" role="document">
		    <div class="modal-content">
		      <div class="modal-header custom">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="deleteModalLabel">Apakah Anda ingin menghapus data berita kegiatan?</h4>
		      </div>
		      <div class="modal-footer delete">
		      	<form action="{{ route('msds.destroy', $zat->id) }}" id="delete-kegiatan" method="post" role="form">
		      		{{ csrf_field() }}
		        	<button type="submit" class="btn btn-danger delete-submit-btn">Ya</button>
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
			$('#msdstable').DataTable( {
		    	"lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ]
			});
		});
	</script>
@endsection