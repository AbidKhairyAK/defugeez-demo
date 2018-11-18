@extends('app.layouts.app')

@section('title', 'Bencana')

@section('content')
<div class="container">

	<div class="section">
		<div class="section-separator">
			<hr class="hr-thick">
			<hr class="hr-thin">
			<h3>Peta Bencana</h3>
		</div>

		<div id="map-wrapper" class="section-wrapper col-sm-12 rounded bg-light shadow">
			<div id="map"></div>
		</div>
	</div>

	<div class="section">
		
		<div class="section-separator">
			<hr class="hr-thick">
			<hr class="hr-thin">
			<h3>Daftar Bencana</h3>
		</div>

		<div class="section-wrapper row">

			<div class="col-md-6">
				<div class="card my-3">
					<div class="card-body pt-40 position-relative">
						<div class="clearfix">
							<div class="row col-md-9"><a class="h3 font-weight-bold" href="https://www.w3schools.com/bootstrap4/bootstrap_ref_all_classes.asp"> Museum Tsunami Aceh</a>
							</div><span class="active-card position-absolute px-4 py-2 bg-primary text-white font-weight-bold" style="top:0;right:20px;">Aktif</span></div>
						<hr>
						<div class="row pt-3">
							<div class="col-md-9 pr-4">
								<p class="h6">Sukaramai, Baiturrahman, Kota Banda Aceh, Aceh 23116</p>
								<p class="small lead">The myth that multitasking is a skill a person possess . Multitasking has become a heroic word in everybody's vocabulary. People take pride in stating multitasking as their strength when asked.</p>
								<p class="text-danger small">Tingkat kerusakan: intermediate</p>
								<a class="small" href="{{ url('/posts') }}">More info &raquo;</a>
							</div>
							<div class="col-sm-3">
								<div class="small">jumlah pengungsi terdata</div>
								<div class="h1">230</div><div class="h5">orang</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-6">
				<div class="card my-3">
					<div class="card-body pt-40 position-relative">
						<div class="clearfix">
							<div class="row col-md-9"><a class="h3 font-weight-bold" href="https://www.w3schools.com/bootstrap4/bootstrap_ref_all_classes.asp"> Museum Tsunami Aceh</a>
							</div><span class="active-card position-absolute px-4 py-2 bg-primary text-white font-weight-bold" style="top:0;right:20px;">Aktif</span></div>
						<hr>
						<div class="row pt-3">
							<div class="col-md-9 pr-4">
								<p class="h6">Sukaramai, Baiturrahman, Kota Banda Aceh, Aceh 23116</p>
								<p class="small lead">The myth that multitasking is a skill a person possess . Multitasking has become a heroic word in everybody's vocabulary. People take pride in stating multitasking as their strength when asked.</p>
								<p class="text-danger small">Tingkat kerusakan: intermediate</p>
								<a class="small" href="{{ url('/posts') }}">More info &raquo;</a>
							</div>
							<div class="col-sm-3">
								<div class="small">jumlah pengungsi terdata</div>
								<div class="h1">230</div><div class="h5">orang</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-6">
				<div class="card my-3">
					<div class="card-body pt-40 position-relative">
						<div class="clearfix">
							<div class="row col-md-9"><a class="h3 font-weight-bold" href="https://www.w3schools.com/bootstrap4/bootstrap_ref_all_classes.asp"> Museum Tsunami Aceh</a>
							</div><span class="active-card position-absolute px-4 py-2 bg-primary text-white font-weight-bold" style="top:0;right:20px;">Aktif</span></div>
						<hr>
						<div class="row pt-3">
							<div class="col-md-9 pr-4">
								<p class="h6">Sukaramai, Baiturrahman, Kota Banda Aceh, Aceh 23116</p>
								<p class="small lead">The myth that multitasking is a skill a person possess . Multitasking has become a heroic word in everybody's vocabulary. People take pride in stating multitasking as their strength when asked.</p>
								<p class="text-danger small">Tingkat kerusakan: intermediate</p>
								<a class="small" href="{{ url('/posts') }}">More info &raquo;</a>
							</div>
							<div class="col-sm-3">
								<div class="small">jumlah pengungsi terdata</div>
								<div class="h1">230</div><div class="h5">orang</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-6">
				<div class="card my-3">
					<div class="card-body pt-40 position-relative">
						<div class="clearfix">
							<div class="row col-md-9"><a class="h3 font-weight-bold" href="https://www.w3schools.com/bootstrap4/bootstrap_ref_all_classes.asp"> Museum Tsunami Aceh</a>
							</div><span class="active-card position-absolute px-4 py-2 bg-primary text-white font-weight-bold" style="top:0;right:20px;">Aktif</span></div>
						<hr>
						<div class="row pt-3">
							<div class="col-md-9 pr-4">
								<p class="h6">Sukaramai, Baiturrahman, Kota Banda Aceh, Aceh 23116</p>
								<p class="small lead">The myth that multitasking is a skill a person possess . Multitasking has become a heroic word in everybody's vocabulary. People take pride in stating multitasking as their strength when asked.</p>
								<p class="text-danger small">Tingkat kerusakan: intermediate</p>
								<a class="small" href="{{ url('/posts') }}">More info &raquo;</a>
							</div>
							<div class="col-sm-3">
								<div class="small">jumlah pengungsi terdata</div>
								<div class="h1">230</div><div class="h5">orang</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-6">
				<div class="card my-3">
					<div class="card-body pt-40 position-relative">
						<div class="clearfix">
							<div class="row col-md-9"><a class="h3 font-weight-bold" href="https://www.w3schools.com/bootstrap4/bootstrap_ref_all_classes.asp"> Museum Tsunami Aceh</a>
							</div><span class="active-card position-absolute px-4 py-2 bg-primary text-white font-weight-bold" style="top:0;right:20px;">Aktif</span></div>
						<hr>
						<div class="row pt-3">
							<div class="col-md-9 pr-4">
								<p class="h6">Sukaramai, Baiturrahman, Kota Banda Aceh, Aceh 23116</p>
								<p class="small lead">The myth that multitasking is a skill a person possess . Multitasking has become a heroic word in everybody's vocabulary. People take pride in stating multitasking as their strength when asked.</p>
								<p class="text-danger small">Tingkat kerusakan: intermediate</p>
								<a class="small" href="{{ url('/posts') }}">More info &raquo;</a>
							</div>
							<div class="col-sm-3">
								<div class="small">jumlah pengungsi terdata</div>
								<div class="h1">230</div><div class="h5">orang</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-6">
				<div class="card my-3">
					<div class="card-body pt-40 position-relative">
						<div class="clearfix">
							<div class="row col-md-9"><a class="h3 font-weight-bold" href="https://www.w3schools.com/bootstrap4/bootstrap_ref_all_classes.asp"> Museum Tsunami Aceh</a>
							</div><span class="active-card position-absolute px-4 py-2 bg-primary text-white font-weight-bold" style="top:0;right:20px;">Aktif</span></div>
						<hr>
						<div class="row pt-3">
							<div class="col-md-9 pr-4">
								<p class="h6">Sukaramai, Baiturrahman, Kota Banda Aceh, Aceh 23116</p>
								<p class="small lead">The myth that multitasking is a skill a person possess . Multitasking has become a heroic word in everybody's vocabulary. People take pride in stating multitasking as their strength when asked.</p>
								<p class="text-danger small">Tingkat kerusakan: intermediate</p>
								<a class="small" href="{{ url('/posts') }}">More info &raquo;</a>
							</div>
							<div class="col-sm-3">
								<div class="small">jumlah pengungsi terdata</div>
								<div class="h1">230</div><div class="h5">orang</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>
@endsection