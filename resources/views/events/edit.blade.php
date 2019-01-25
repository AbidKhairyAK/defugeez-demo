@extends('layouts.app')

@section('title', 'Edit Peristiwa')

@section('content')
<div id="main" class="container">
	<div class="text-center h3 my-3">
		<div >Form Peristiwa</div>
	</div>

	<div class="rounded bg-light shadow">
		<div class="m-3 p-3">

		<div class="h4 font-weight-bold text-primary mb-4">- Edit Peristiwa -</div>
			{!! Form::model($event, [
				'method' => 'PUT',
				'route' => ['events.update', $event->id ],
				'id' => 'event-form'
			]) !!}

			@include('events.form')

			{!! Form::close() !!}
		</div>
	</div>
</div>
@endsection