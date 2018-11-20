@extends('app.layouts.app')

@section('title', 'Tambah Bencana')

@section('content')
<div id="main" class="container">
	<div class="section">

		<div class="section-separator">
			<hr class="hr-thick">
			<hr class="hr-thin">
			<h3>Daftar Bencana</h3>
		</div>

		<div class="section-wrapper col-sm-12 rounded bg-light shadow">

			<h5 class="section-title">Tambah Daftar Bencana</h5>

			<div class="section-content">
				{!! Form::model($disaster, [
					'route' => 'disasters.store',
					'id'		=> 'disaster-form'
				]) !!}

				@include('app.disasters.form')

				{!! Form::close() !!}
			</div>

		</div>

	</div>
</div>
@endsection
