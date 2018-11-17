@extends('app.layouts.app')

@section('title', 'Refugees')

@section('style')
<!-- <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"> -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.css"/>
<style type="text/css">
	.progress, .progress-bar {
		height: 40px;
	}
	.progress-bar {
		width: 60%;
	}
	.progress-bar span {
		font-size: 20px;
		font-weight: bold;
	}
	.nav-link.left {
		border-top-right-radius: 0;
		border-bottom-right-radius: 0;
		border: 1px solid #007bff;
		font-weight: bold;
	}
	.nav-link.right {
		border-top-left-radius: 0;
		border-bottom-left-radius: 0;
		border: 1px solid #007bff;
		font-weight: bold;
	}
	.table tr th:nth-child(2),
	.table tr td:nth-child(2) {
		min-width: 160px;
	}
	.table tr th:nth-child(4),
	.table tr td:nth-child(4) {
		min-width: 180px;
	}
	.table tr th:last-child ,
	.table tr td:last-child  {
		min-width: 160px;
	}
</style>
@endsection

@section('content')
<div id="main" class="container">

	<!-- Nav pills -->
	<ul class="nav nav-pills justify-content-center py-3">
	  <li clas>
	    <a class="nav-link px-5 left active" data-toggle="pill" href="#summary">Ringkasan</a>
	  </li>
	  <li clas>
	    <a class="nav-link px-5 right" data-toggle="pill" href="#refugees">Pengungsi</a>
	  </li>
	</ul>

	<div class="tab-content">
		
		<div id="summary" class="tab-pane active">
			<div class="section">
				<div class="section-separator">
					<hr class="hr-thick">
					<hr class="hr-thin">
					<h3>Info Posko</h3>
				</div>

				<div class="section-wrapper col-sm-12 rounded bg-light shadow">

					<div class="section-content">
						<div class="row">
							<div class="col-lg-6">
								<table class="table table-hover table">
									<tr>
										<th width="130">Nama Posko</th>
										<td class="text-right">Posko Bangkit Bersama</td>
									</tr>
									<tr>
										<th>Jumlah Barak</th>
										<td class="text-right">10 Barak</td>
									</tr>
									<tr>
										<th>Alamat</th>
										<td class="text-right">Lapangan Kedi, Jl. Sudirman RT 05, Karanganyar, Wedomartani, Ngemplak, Sleman</td>
									</tr>
								</table>
							</div>

							<div class="col-lg-6">
								<table class="table table-hover">
									<tr>
										<th>Status Posko</th>
										<td class="text-right">Masih Beroperasi</td>
									</tr>
									<tr>
										<th>Pembuat Data Posko</th>
										<td class="text-right">Ahmad Iyad</td>
									</tr>
									<tr>
										<th>Organisasi Posko</th>
										<td class="text-right">ACT, Lazis, PMI</td>
									</tr>
								</table>
							</div>

							<div class="col-lg-12">
								<table class="table table-hover">
									<tr>
										<th>Deskripsi</th>
									</tr>
									<tr>
										<td class="border-top-0">
											<p>Donec tincidunt commodo tellus. Integer mollis nisi sit amet massa vulputate, nec euismod elit aliquet. Aliquam sit amet posuere turpis. Nam lobortis justo sed congue aliquet.</p>
										</td>
									</tr>
								</table>
							</div>
						</div>
					</div>

				</div>
			</div>

			<div class="section">
				<div class="section-separator">
					<hr class="hr-thick">
					<hr class="hr-thin">
					<h3>Presentase Posko</h3>
				</div>

				<div class="row">

					<div class="col-sm-12 mb-4">
						<div class="section-wrapper rounded bg-light shadow">
							<div class="section-content col-sm-12">
								<h5 class="text-center mb-4">&laquo; Berdasarkan Kapasitas &raquo;</h5>
								<div class="progress">
									<div class="progress-bar"><span>180 / 300</span></div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-lg-6 mb-4">
						<div class="section-wrapper rounded bg-light shadow">
							<div class="section-content">
								<h5 class="text-center mb-4">&laquo; Berdasarkan Usia & Gender &raquo;</h5>
								<canvas id="status" height="150px"></canvas>
							</div>
						</div>
					</div>

					<div class="col-lg-6 mb-4">
						<div class="section-wrapper rounded bg-light shadow">
							<div class="section-content">
								<h5 class="text-center mb-4">&laquo; Berdasarkan Kesehatan &raquo;</h5>
								<canvas id="health" height="150px"></canvas>
							</div>
						</div>
					</div>

				</div>
			</div>

			<div class="section">
				<div class="section-separator">
					<hr class="hr-thick">
					<hr class="hr-thin">
					<h3>Kebutuhan</h3>
				</div>

				<div class="section-wrapper col-sm-12 rounded bg-light shadow">

					<div class="section-content">
						<div class="row">
							<div class="col-lg-12">
								<table class="table">
									<tr>
										<th>Kebutuhan Bahan Makanan</th>
									</tr>
									<tr>
										<td class="border-top-0">
											<ul>
											  <li>Phasellus id nisi condimentum, dictum dui interdum, tristique nisl.</li>
											  <li>Maecenas pulvinar rhoncus velit, eu pretium nisi efficitur in.</li>
											  <li>In quis tristique ligula, vitae molestie elit.</li>
											</ul>
										</td>
									</tr>
									<tr>
										<th>Kebutuhan Pakaian</th>
									</tr>
									<tr>
										<td class="border-top-0">
											<ul>
											  <li>Sed interdum ex nec pharetra ultricies.</li>
											  <li>Aliquam condimentum eget quam sed consequat.</li>
											  <li>Suspendisse faucibus eleifend magna sed venenatis.</li>
											  <li>Aliquam erat volutpat.</li>
											</ul>
										</td>
									</tr>
									<tr>
										<th>Kebutuhan Lain Lain</th>
									</tr>
									<tr>
										<td class="border-top-0">
											<ul>
											  <li>Donec a condimentum ante.</li>
											  <li>Nunc faucibus at dui pellentesque blandit.</li>
											</ul>
										</td>
									</tr>
								</table>
							</div>
						</div>
					</div>

				</div>
			</div>

		</div>

		<div id="refugees" class="tab-pane section fade">
			
			<div class="section-separator">
				<hr class="hr-thick">
				<hr class="hr-thin">
				<h3>Daftar Pengungsi</h3>
			</div>

			<div class="section-wrapper col-sm-12 rounded bg-light shadow">

				<div class="section-content col-sm-12">
					<div class="container-fluid">
						<div class="table-responsive">
							<table id="refugees-table" class="table table-hover">
								<thead>
									<tr>
										<th>#</th>
										<th>Nama Pengungsi</th>
										<th>Gender</th>
										<th>Tanggal Lahir / Umur</th>
										<th>Barak</th>
										<th>Status</th>
										<th>Opsi</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>1</td>
										<td>Fulan bin Fulan</td>
										<td>L</td>
										<td>20-02-1998 / 20 Thn</td>
										<td>07</td>
										<td><span class="badge badge-info">Aktif</span></td>
										<td>
											<a href="#" class="btn btn-sm btn-success">Detail</a>
											<a href="#" class="btn btn-sm btn-primary">Edit</a>
											<a href="#" class="btn btn-sm btn-danger">Hapus</a>
										</td>
									</tr>
									<tr>
										<td>2</td>
										<td>Fulanah binti Fulanah</td>
										<td>L</td>
										<td>20-02-1998 / 20 Thn</td>
										<td>07</td>
										<td><span class="badge badge-warning"> Tidak Aktif</span></td>
										<td>
											<a href="#" class="btn btn-sm btn-success">Detail</a>
											<a href="#" class="btn btn-sm btn-primary">Edit</a>
											<a href="#" class="btn btn-sm btn-danger">Hapus</a>
										</td>
									</tr>
									<tr>
										<td>3</td>
										<td>Ahmad Akram</td>
										<td>P</td>
										<td>20-02-1998 / 20 Thn</td>
										<td>07</td>
										<td><span class="badge badge-info">Aktif</span></td>
										<td>
											<a href="#" class="btn btn-sm btn-success">Detail</a>
											<a href="#" class="btn btn-sm btn-primary">Edit</a>
											<a href="#" class="btn btn-sm btn-danger">Hapus</a>
										</td>
									</tr>
									<tr>
										<td>4</td>
										<td>Rangga</td>
										<td>L</td>
										<td>20-02-1998 / 20 Thn</td>
										<td>07</td>
										<td><span class="badge badge-info">Aktif</span></td>
										<td>
											<a href="#" class="btn btn-sm btn-success">Detail</a>
											<a href="#" class="btn btn-sm btn-primary">Edit</a>
											<a href="#" class="btn btn-sm btn-danger">Hapus</a>
										</td>
									</tr>
									<tr>
										<td>5</td>
										<td>Veldora</td>
										<td>L</td>
										<td>20-02-1998 / 20 Thn</td>
										<td>07</td>
										<td><span class="badge badge-warning">Tidak Aktif</span></td>
										<td>
											<a href="#" class="btn btn-sm btn-success">Detail</a>
											<a href="#" class="btn btn-sm btn-primary">Edit</a>
											<a href="#" class="btn btn-sm btn-danger">Hapus</a>
										</td>
									</tr>
									<tr>
										<td>6</td>
										<td>Fulan bin Fulan</td>
										<td>L</td>
										<td>20-02-1998 / 20 Thn</td>
										<td>07</td>
										<td><span class="badge badge-info">Aktif</span></td>
										<td>
											<a href="#" class="btn btn-sm btn-success">Detail</a>
											<a href="#" class="btn btn-sm btn-primary">Edit</a>
											<a href="#" class="btn btn-sm btn-danger">Hapus</a>
										</td>
									</tr>
									<tr>
										<td>7</td>
										<td>Fulan bin Fulan</td>
										<td>L</td>
										<td>20-02-1998 / 20 Thn</td>
										<td>07</td>
										<td><span class="badge badge-info">Aktif</span></td>
										<td>
											<a href="#" class="btn btn-sm btn-success">Detail</a>
											<a href="#" class="btn btn-sm btn-primary">Edit</a>
											<a href="#" class="btn btn-sm btn-danger">Hapus</a>
										</td>
									</tr>
									<tr>
										<td>8</td>
										<td>Fulan bin Fulan</td>
										<td>L</td>
										<td>20-02-1998 / 20 Thn</td>
										<td>07</td>
										<td><span class="badge badge-info">Aktif</span></td>
										<td>
											<a href="#" class="btn btn-sm btn-success">Detail</a>
											<a href="#" class="btn btn-sm btn-primary">Edit</a>
											<a href="#" class="btn btn-sm btn-danger">Hapus</a>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>

			</div>
		</div>

	</div>

</div>
@endsection

@section('script')
<!-- <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script> -->
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<script type="text/javascript">

	var options = {
		animation: {
			animateScale: true,
		},
		legend: {
			position: 'right',
		},
		layout: {
			padding: {
				right: 40,
			},
		}
	};

	window.onload = function() {

		$('#refugees-table').DataTable();

		var status = document.getElementById('status').getContext('2d');
		var health = document.getElementById('health').getContext('2d');
		window.statusChart = new Chart(status, {
			type: 'pie',
			data: {
				labels: ["Pria", "Wanita", "Anak-anak"],
				datasets: [
					{
						label: "Status",
						backgroundColor: ['#007bff', '#28a745', '#ffc107'],
						data: [20, 30, 50],
					},
				]
			},
			options: options,
		});

		window.healthChart = new Chart(health, {
			type: 'doughnut',
			data: {
				labels: ["Sehat", "Sakit", "Luka Ringan", "Luka Parah", "Meninggal"],
				datasets: [
					{
						label: "Health",
						backgroundColor: ['#007bff', '#28a745', '#ffc107', '#dc3545', '#6c757d'],
						data: [50, 30, 50, 40, 30],
					},
				]
			},
			options: options,
		});
	}

</script>
@endsection