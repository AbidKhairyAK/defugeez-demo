@extends('app.layouts.app')

@section('title', 'Disaster')

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
		<h3>Daftar Bencana</h3>
	</div>

	<div class="section-wrapper rounded bg-light shadow">

		<div class="section-content">
			<div class="container-fluid">
				<div class="table-responsive">
					<a href="{{ route('disasters.create') }}" class="btn btn-primary mb-2">Tambah Data</a>
					<table id="disaster-table" class="table table-hover">
						<thead>
							<tr>
								<th>#</th>
								<th>Nama Bencana</th>
								<th>Tingkat Kerusakan</th>
								<th>Lokasi</th>
								<th>Tanggal</th>
								<th>Status</th>
								<th>Opsi</th>
							</tr>
						</thead>
						<tbody>
							@foreach($disasters as $disaster)
							<tr>
								<td>{{ $disaster->id }}</td>
								<td>{{ $disaster->name }}</td>
								<td>{{ $disaster->damage }}</td>
								<td>{{ $disaster->regency_id }}</td>
								<td>{{ $disaster->created_at }}</td>
								<td><span class="badge badge-{{ $disaster->status ? 'info' : 'warning' }}">{{ $disaster->status ? 'Aktif' : 'Nonaktif' }}</span></td>
								<td>
									<a href="" class="btn btn-sm btn-success" data-toggle="modal" data-target="#detail{{ $disaster->id }}">Detail</a>
									<a href="{{ route('disasters.edit', $disaster->id) }}" class="btn btn-sm btn-primary">Edit</a>
									<form class="d-inline-block" action="{{ route('disasters.destroy', $disaster->id) }}" method="post">
										@csrf
										{{ method_field('DELETE') }}
										<button type="submit" class="btn btn-sm btn-danger">Hapus</button>
									</form>
								</td>
							</tr>

							<!-- The Modal For Detail -->
							<div class="modal fade" id="detail{{ $disaster->id }}">
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
							      		<span class="col-3"><b>Nama Bencana</b></span>
							      		<span class="col-9">: {{ $disaster->name }}</span>
							      	</div>
							      	<hr>
							      	<div class="row my-2">
							      		<span class="col-3"><b>Provinsi</b></span>
							      		<span class="col-9">: {{ $disaster->province_id }}</span>
							      	</div>
							      	<hr>
							      	<div class="row my-2">
							      		<span class="col-3"><b>Kabupaten</b></span>
							      		<span class="col-9">: {{ $disaster->regency_id }}</span>
							      	</div>
							      	<hr>
							      	<div class="row my-2">
							      		<span class="col-3"><b>Kecamatan</b></span>
							      		<span class="col-9">: {{ $disaster->district_id }}</span>
							      	</div>
							      	<hr>
							      	<div class="row my-2">
							      		<span class="col-3"><b>Desa</b></span>
							      		<span class="col-9">: {{ $disaster->village_id }}</span>
							      	</div>
							      	<hr>
							      	<div class="row my-2">
							      		<span class="col-3"><b>Tingkat Kerusakan</b></span>
							      		<span class="col-9">: {{ $disaster->damage }}</span>
							      	</div>
							      	<hr>
							      	<div class="row my-2">
							      		<span class="col-3"><b>status</b></span>
							      		<span class="col-9">: {{ $disaster->status ? 'Aktif' : 'Nonaktif' }}</span>
							      	</div>
							      	<hr>
							      	<div class="row my-2">
							      		<span class="col-3"><b>Deskripsi</b></span>
							      		<span class="col-9">: {{ $disaster->description }}</span>
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
		$('#disaster-table').DataTable();
	})

</script>
@endsection
