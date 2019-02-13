@extends('layouts.app')

@section('title', 'Edit Penggalangan Dana')

@section('content')
<div id="main" class="container">
	<div>
		<div class="text-center h3 my-3">
			<div>- Form Penggalangan Dana -</div>
		</div>

		<div class="rounded bg-light shadow">
			<div class="m-3 p-3">

			<div class="h4 font-weight-bold text-primary mb-4">Edit Penggalangan Dana</div>
				{!! Form::model($donation, [
					'method' => 'donation',
					'route' => ['donations.update', $donation->slug],
					'files' => true,
					'id' => 'donation-form'
				]) !!}

				@include('donations.form')

				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>
@endsection
