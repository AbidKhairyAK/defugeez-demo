@extends('app.layouts.app')

@section('title', 'Tambah Test')

@section('content')
<div id="main" class="container">
	<div class="section">

		<div class="section-separator">
			<hr class="hr-thick">
			<hr class="hr-thin">
			<h3>Daftar Test</h3>
		</div>

		<div class="section-wrapper col-sm-12 rounded bg-light shadow">

			<h5 class="section-title">Tambah Daftar Test</h5>

			<div class="section-content">
				{!! Form::model($test, [
					'route' => 'test.store',
					'id'		=> 'test-form'
				]) !!}

				@include('app.test.form')

				{!! Form::close() !!}
			</div>

		</div>

	</div>
</div>
@endsection