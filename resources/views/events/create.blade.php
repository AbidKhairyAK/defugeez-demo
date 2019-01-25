@extends('layouts.app')

@section('title', 'Tambah Peristiwa')

@section('content')
<div id="main" class="container">
	<div>
		<div class="text-center h3 my-3">
			<div > Form Peristiwa</div>
		</div>

		<div class="rounded bg-light shadow">
			<div class="m-3 p-3">

			<div class="h4 font-weight-bold text-primary mb-4">- Tambah Peristiwa -</div>
				{!! Form::model($event, [
					'method' => 'POST',
					'route' => 'events.store',
					'id' => 'event-form'
				]) !!}

				@include('events.form')

				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>
@endsection
