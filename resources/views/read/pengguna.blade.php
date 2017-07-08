@extends('view.index')

@section('content')

	@include('view.header')

	<div class="main-view">
		<div class="create-new-data">
			<a data-toggle="modal" data-target="#add-modal">
				<button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-plus"></span> Tambah data Pengguna</button>
			</a>
		</div>
		<div class="datatable-container">
			<div class="datatable-title">
				@if (session('created'))
				    <div class="alert alert-success alert-dismissible" role="alert">
					  	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					  	{{ session('created') }}
					</div>
				@elseif (session('updated'))
				    <div class="alert alert-info alert-dismissible" role="alert">
					  	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					  	{{ session('updated') }}
					</div>
				@elseif (session('deleted'))
				    <div class="alert alert-warning alert-dismissible" role="alert">
					  	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					  	{{ session('deleted') }}
					</div>
				@endif
				<img src="{{ asset('img/pecahan/berita2.png') }}" alt="persani berita icon" style="width: 30px;" />
				<p>Data Pengguna</p>
				<div class="clearfix"></div>
			</div>
			<div class="table-responsive">
				<table id="msdstable" class="table table-bordered table-condensed" width="100%" cellspacing="0">
			        <thead>
			            <tr>
			            	<th>No.</th>
			                <th>Username</th>
			                <th>Tipe</th>
			                <th>created_at</th>
			                <th>updated_at</th>
			                <th>Action</th>
			            </tr>
			        </thead>
			        <tbody>
			        	<?php $no = 1; ?>
			        	@foreach($pengguna as $user)
			        	<tr>
			        		<th>{{ $no }}</th>
			        		<td>{{ $user->username }}</td>
			        		<td>{{ $user->tipe }}</td>
			        		<td>{{ $user->created_at }}</td>
			        		<td>{{ $user->updated_at }}</td>
			        		<td class="action-td">
			        			<img src="{{ asset('img/pecahan/edit.png') }}" alt="edit icon" class="action-btn" data-toggle="modal" data-target="#edit-modal{{ $user->id }}" />
			        			<img src="{{ asset('img/pecahan/hapus.png') }}" alt="delete icon" class="action-btn" data-toggle="modal" data-target="#delete-modal{{ $user->id }}" />
			        		</td>
			        	</tr>
			        	<?php $no+=1; ?>
			        	@endforeach
			        </tbody>
			    </table>
			</div>
		</div>
	</div>

	<div class="modal fade" id="add-modal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel">
		<div class="modal-dialog edit" role="document">
		    <div class="modal-content">
		    	<form action="{{ route('pengguna.store') }}" id="add-kegiatan" method="post" role="form">
			      <div class="modal-header custom">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title" id="addModalLabel">Tambah data Pengguna</h4>
			      </div>
			      <div class="modal-body">
			      	{{ csrf_field() }}
		      		<div class="form-group">
						<label for="username">Username</label>
						<input type="text" name="username" id="username" class="form-control username" placeholder="Username" />
					</div>

					<div class="form-group">
						<label for="password">Password</label>
						<input type="text" name="password" id="password" class="form-control password" placeholder="Password" />
					</div>

					<div class="form-group">
						<label for="tipe">Tipe</label>
						<select name="tipe" class="form-control" id="tipe">
							<option value="">Pilih</option>
							<option value="super">Super</option>
							<option value="pengguna">Pengguna</option>
						</select>
					</div>
			      </div>
			      <div class="modal-footer delete">
			        	<button type="submit" class="btn btn-danger delete-submit-btn">Tambah</button>
			        	<button type="button" class="btn btn-primary delete-cancel-btn" data-dismiss="modal">Batal</button>
			      </div>
			    </form>
		    </div>
		</div>
	</div>

	@foreach($pengguna as $user)
	<div class="modal fade" id="edit-modal{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel">
		<div class="modal-dialog edit" role="document">
		    <div class="modal-content">
		    	<form action="{{ route('pengguna.update', $user->id) }}" id="edit-kegiatan" method="post" role="form">
				    <div class="modal-header custom">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <h4 class="modal-title" id="editModalLabel">Edit data Pengguna</h4>
				    </div>
			      	<div class="modal-body">
			      		{{ method_field('PUT') }}
				      	{{ csrf_field() }}
			      		<div class="form-group">
							<label for="username">Username</label>
							<input type="text" name="username" id="username" class="form-control username" placeholder="Username" value="{{ $user->username }}" />
						</div>

						<div class="form-group">
							<label for="password">Password</label>
							<input type="text" name="password" id="password" class="form-control password" placeholder="Password" />
						</div>

						<div class="form-group">
							<label for="tipe">Tipe</label>
							<select name="tipe" class="form-control" id="tipe">
								@if( $user->tipe == 'super')
									<option value="">Pilih</option>
									<option value="super" selected="selected">Super</option>
									<option value="pengguna">Pengguna</option>
								@else
									<option value="">Pilih</option>
									<option value="super">Super</option>
									<option value="pengguna" selected="selected">Pengguna</option>
								@endif
							</select>
						</div>
				    </div>
			      	<div class="modal-footer delete">
			        	<button type="submit" class="btn btn-danger delete-submit-btn">Edit</button>
			        	<button type="button" class="btn btn-primary delete-cancel-btn" data-dismiss="modal">Batal</button>
			      	</div>
			    </form>
		    </div>
		</div>
	</div>
	@endforeach

	@foreach($pengguna as $user)
	<div class="modal fade" id="delete-modal{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel">
		<div class="modal-dialog delete" role="document">
		    <div class="modal-content">
		      <div class="modal-header custom">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="deleteModalLabel">Apakah Anda ingin menghapus data pengguna?</h4>
		      </div>
		      <div class="modal-footer delete">
		      	<form action="{{ route('pengguna.destroy', $user->id) }}" id="delete-kegiatan" method="post" role="form">
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

		$('.sidebar-li.datauser').addClass('active');

		var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

		$(document).ready(function(){
			$('#msdstable').DataTable( {
		    	"lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ]
			});
		});
	</script>
@endsection