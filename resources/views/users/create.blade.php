@extends('layouts.app')

@section('title', 'Tambah Relawan')

@section('content')
<div id="main" class="container">
	<div>
		<div class="text-center h3 my-3">
			<div > Form Relawan</div>
		</div>

		<div class="rounded bg-light shadow">
			<div class="m-3 mb-5 p-3">

			<div class="h4 font-weight-bold text-primary mb-4">- Tambah Relawan -</div>
				{!! Form::model($user, [
					'method' => 'POST',
					'route' => ['users.store', $organization->slug],
					'id' => 'user-form'
				]) !!}

				@include('users.form')

				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>
@endsection
