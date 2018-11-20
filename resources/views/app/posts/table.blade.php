@extends('app.layouts.app')

@section('title', 'Test')

@section('style')
<!-- <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"> -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.css"/>
<style type="text/css">
	.table tr th:nth-child(2),
	.table tr td:nth-child(2) {
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
		<h3>Daftar Test</h3>
	</div>

	<div class="section-wrapper rounded bg-light shadow">

		<div class="section-content">
			<div class="container-fluid">
				<div class="table-responsive">
					<a href="{{ route('posts.create') }}" class="btn btn-primary mb-2">Tambah Data</a>
					<table id="test-table" class="table table-hover">
						<thead>
							<tr>
								<th>#</th>
								<th>Username</th>
								<th>Email</th>
								<th>Class</th>
								<th>Status</th>
								<th>Opsi</th>
							</tr>
						</thead>
						<tbody>
							@foreach($tests as $test)
							<tr>
								<td>{{ $test->id }}</td>
								<td>{{ $test->username }}</td>
								<td>{{ $test->email }}</td>
								<td>{{ $test->class }}</td>
								<td><span class="badge badge-{{ $test->status ? 'info' : 'warning' }}">{{ $test->status ? 'Aktif' : 'Nonaktif' }}</span></td>
								<td>
									<a href="" class="btn btn-sm btn-success" data-toggle="modal" data-target="#detail{{ $test->id }}">Detail</a>
									<a href="{{ route('test.edit', $test->id) }}" class="btn btn-sm btn-primary">Edit</a>
									<form class="d-inline-block" action="{{ route('test.destroy', $test->id) }}" method="post">
										@csrf
										{{ method_field('DELETE') }}
										<button type="submit" class="btn btn-sm btn-danger">Hapus</button>
									</form>
								</td>
							</tr>

							<!-- The Modal For Detail -->
							<div class="modal fade" id="detail{{ $test->id }}">
							  <div class="modal-dialog modal-dialog-centered rounded">
							    <div class="modal-content">

							      <!-- Modal Header -->
							      <div class="modal-header bg-primary">
							        <h4 class="modal-title text-white"><b>Detail Test</b></h4>
							        <button type="button" class="close" data-dismiss="modal">&times;</button>
							      </div>

							      <!-- Modal body -->
							      <div class="modal-body">
							      	<div class="row my-2">
							      		<span class="col-3"><b>Username</b></span>
							      		<span class="col-9">: {{ $test->username }}</span>
							      	</div>
							      	<hr>
							      	<div class="row my-2">
							      		<span class="col-3"><b>Email</b></span>
							      		<span class="col-9">: {{ $test->email }}</span>
							      	</div>
							      	<hr>
							      	<div class="row my-2">
							      		<span class="col-3"><b>Password</b></span>
							      		<span class="col-9">: {{ $test->password }}</span>
							      	</div>
							      	<hr>
							      	<div class="row my-2">
							      		<span class="col-3"><b>Class</b></span>
							      		<span class="col-9">: {{ $test->class }}</span>
							      	</div>
							      	<hr>
							      	<div class="row my-2">
							      		<span class="col-3"><b>status</b></span>
							      		<span class="col-9">: {{ $test->status ? 'Aktif' : 'Nonaktif' }}</span>
							      	</div>
							      	<hr>
							      	<div class="row my-2">
							      		<span class="col-3"><b>Deskripsi</b></span>
							      		<span class="col-9">: {{ $test->desc }}</span>
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
		$('#test-table').DataTable();
	})

</script>
@endsection