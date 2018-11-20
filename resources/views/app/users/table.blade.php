@extends('app.layouts.app')

@section('title', 'Relawan')

@section('style')
<!-- <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"> -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.css"/>
<style type="text/css">
	.table tr th:nth-child(2),
	.table tr td:nth-child(2) {
		min-width: 160px;
	}
	.table tr th:nth-last-child(2) ,
	.table tr td:nth-last-child(2)  {
		min-width: 160px;
	}
	.table tr th:last-child ,
	.table tr td:last-child  {
		min-width: 160px;
	}
</style>
@endsection

@section('content')
<div id="main" class="container">
		
	<div class="section-separator">
		<hr class="hr-thick">
		<hr class="hr-thin">
		<h3>Daftar Relawan</h3>
	</div>

	<div class="section-wrapper rounded bg-light shadow">

		<div class="section-content">
			<div class="container-fluid">
				<div class="table-responsive">
					<a href="{{ route('users.create') }}" class="btn btn-primary mb-2">Tambah Data</a>
					<table id="user-table" class="table table-hover">
						<thead>
							<tr>
								<th>#</th>
								<th>Nama Relawan</th>
								<th>Email</th>
								<th>Role</th>
								<th>Alamat</th>
								<th>Opsi</th>
							</tr>
						</thead>
						<tbody>
							@php
								$no = 1;
							@endphp
							@foreach($users as $user)
							<tr>
								<td>{{ $no++ }}</td>
								<td>{{ $user->name }}</td>
								<td>{{ $user->email }}</td>
								<td>{{ $user->role }}</td>
								<td>{{ $user->address }}, {{ $user->regency_id }}</td>
								<td>
									<a href="" class="btn btn-sm btn-success" data-toggle="modal" data-target="#detail{{ $user->id }}">Detail</a>
									<a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-primary">Edit</a>
									<form class="d-inline-block" action="{{ route('users.destroy', $user->id) }}" method="post">
										@csrf
										{{ method_field('DELETE') }}
										<button type="submit" class="btn btn-sm btn-danger">Hapus</button>
									</form>
								</td>
							</tr>

							<!-- The Modal For Detail -->
							<div class="modal fade" id="detail{{ $user->id }}">
							  <div class="modal-dialog modal-dialog-centered rounded">
							    <div class="modal-content">

							      <!-- Modal Header -->
							      <div class="modal-header bg-primary">
							        <h4 class="modal-title text-white"><b>Detail User</b></h4>
							        <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
							      </div>

							      <!-- Modal body -->
							      <div class="modal-body">
							      	<div class="row my-2">
							      		<span class="col-3"><b>Username</b></span>
							      		<span class="col-9">: {{ $user->name }}</span>
							      	</div>
							      	<hr>
							      	<div class="row my-2">
							      		<span class="col-3"><b>Organization</b></span>
							      		<span class="col-9">: {{ $user->organization_id }}</span>
							      	</div>
							      	<hr>
							      	<div class="row my-2">
							      		<span class="col-3"><b>Nik</b></span>
							      		<span class="col-9">: {{ $user->nik }}</span>
							      	</div>
							      	<hr>
							      	<div class="row my-2">
							      		<span class="col-3"><b>Email</b></span>
							      		<span class="col-9">: {{ $user->email }}</span>
							      	</div>
							      	<hr>
							      	<div class="row my-2">
							      		<span class="col-3"><b>Role</b></span>
							      		<span class="col-9">: {{ $user->role }}</span>
							      	</div>
							      	<hr>
							      	<div class="row my-2">
							      		<span class="col-3"><b>Status</b></span>
							      		<span class="col-9">: {{ $user->status ? 'Aktif' : 'Nonaktif' }}</span>
							      	</div>
							      	<hr>
							      	<div class="row my-2">
							      		<span class="col-3"><b>Address</b></span>
							      		<span class="col-9">: {{ $user->address }}, {{ $user->village_id }}, {{ $user->district_id }}, {{ $user->regency_id }}, {{ $user->province_id }}</span>
							      	</div>
							      	<hr>
							      	<div class="row my-2">
							      		<span class="col-3"><b>Phone</b></span>
							      		<span class="col-9">: {{ $user->phone }}</span>
							      	</div>
							      </div>

							      <div class="modal-footer"></div>

							    </div>
							  </div>
							</div>

							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>

	</div>

</div>
@endsection

@section('script')
<!-- <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script> -->
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.js"></script>
<script type="text/javascript">

	$(document).ready(function(){
		$('#user-table').DataTable();
	})

</script>
@endsection