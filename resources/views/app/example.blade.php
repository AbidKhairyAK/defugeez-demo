@extends('app.layouts.app')

@section('title', 'Example')

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

		<div class="section-wrapper col-sm-12 rounded bg-light shadow">

			<div class="section-content col-sm-12">
				<div class="row">
					<div class="col-sm-6">
						<table class="table table-hover">
							<tr>
								<th>Lorem Ipsum</th>
								<td class="text-right">Ipsum</td>
							</tr>
							<tr>
								<th>Ipsum</th>
								<td class="text-right">Gravetz 20, 966</td>
							</tr>
							<tr>
								<th>Solem</th>
								<td class="text-right">Test test test test</td>
							</tr>
						</table>
					</div>
					<div class="col-sm-6">
						<table class="table table-hover">
							<tr>
								<th>Lorem</th>
								<td class="text-right">Ipsum</td>
							</tr>
							<tr>
								<th>Ipsum</th>
								<td class="text-right">Gravetz 20, 966</td>
							</tr>
							<tr>
								<th>Solem</th>
								<td class="text-right">Test test test test</td>
							</tr>
						</table>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>
@endsection