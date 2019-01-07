@extends('layouts.app')

@section('title', 'Tambah Kebutuhan')

@section('content')
<div id="main" class="container">
	<div>
		<div class="text-center h3 my-3">
			<div > Form Kebutuhan</div>
		</div>

		<div class="rounded bg-light shadow">
			<div class="m-3 p-3">

			<div class="h4 font-weight-bold text-primary mb-4">Tambah Daftar Kebutuhan</div>
				{!! Form::model($demand, [
					'method' => 'POST',
					'route' => 'demands.store',
					'id' => 'demand-form'
				]) !!}

				@include('demands.form')

				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>
@endsection