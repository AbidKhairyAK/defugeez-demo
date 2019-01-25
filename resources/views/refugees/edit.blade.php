@extends('layouts.app')

@section('content')
<div id="main" class="container">
	<div>
		<div class="text-center h3 my-3">
			<div >Form Pengungsi</div>
		</div>

		<div class="rounded bg-light shadow">
			<div class="m-3 p-3">

			<div class="h4 font-weight-bold text-primary mb-4">- Edit Pengungsi -</div>
				{!! Form::model($refugee, [
					'method' => 'PUT',
					'route' => ['refugees.update', $refugee->id ],
					'id' => 'refugees-form'
				]) !!}

				@include('refugees.form')

				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>
@endsection
