@extends('view.index')

@section('content')

	@include('view.header')

	<div class="main-view">
		<div class="datatable-container">
			<div class="datatable-title">
				@if (session('deleted'))
				    <div class="alert alert-warning alert-dismissible" role="alert">
					  	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					  	{{ session('deleted') }}
					</div>
				@endif
				<img src="{{ asset('img/pecahan/berita2.png') }}" alt="persani berita icon" style="width: 30px;" />
				<p>Data Report Pengguna</p>
				<div class="clearfix"></div>
			</div>
			<div class="table-responsive">
				<table id="feedtable" class="table table-bordered table-condensed" width="100%" cellspacing="0">
			        <thead>
			            <tr>
			            	<th>No.</th>
			                <th>Nama Zat</th>
			                <th>Isi feedback</th>
			                <th>created_at</th>
			                <th>updated_at</th>
			                <th>Action</th>
			            </tr>
			        </thead>
			        <tbody>
			        	<?php $no = 1; ?>
			        	@foreach($feed as $feeds)
			        	<tr>
			        		<th>{{ $no }}</th>
			        		<td>{{ $feeds->msds->nama }}</td>
			        		<td>{{ substr($feeds->content, 0, 100) }}{{ strlen($feeds->content) > 100 ? '...' : '' }}</td>
			        		<td>{{ $feeds->created_at }}</td>
			        		<td>{{ $feeds->updated_at }}</td>
			        		<td class="action-td">
			        			<img src="{{ asset('img/pecahan/hapus.png') }}" alt="delete icon" class="action-btn" data-toggle="modal" data-target="#delete-modal{{ $feeds->id }}" />
			        		</td>
			        	</tr>
			        	<?php $no+=1; ?>
			        	@endforeach
			        </tbody>
			    </table>
			</div>
		</div>
	</div>

	@foreach($feed as $feeds)
	<div class="modal fade" id="delete-modal{{ $feeds->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel">
		<div class="modal-dialog delete" role="document">
		    <div class="modal-content">
		      <div class="modal-header custom">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="deleteModalLabel">Apakah Anda ingin menghapus feedback ini?</h4>
		      </div>
		      <div class="modal-footer delete">
		      	<form action="{{ route('feedback.destroy', $feeds->id) }}" id="delete-kegiatan" method="post" role="form">
		      		{{ method_field('DELETE') }}
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

		$('.sidebar-li.kegiatan').addClass('active');

		var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

		$(document).ready(function(){
			$('#feedtable').DataTable( {
		    	"lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ]
			});
		});
	</script>
@endsection