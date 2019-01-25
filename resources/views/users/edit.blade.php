@extends('layouts.app')

@section('title', 'Edit Relawan')

@section('content')
<div id="main" class="container">
	<div>
		<div class="text-center h3 my-3">
			<div >Form Relawan</div>
		</div>

		<div class="rounded bg-light shadow">
			<div class="m-3 mb-5 p-3">

			<div class="h4 font-weight-bold text-primary mb-4">- Edit Relawan -</div>
				{!! Form::model($user, [
					'method' => 'PUT',
					'route' => ['users.update', $user->id ],
					'id' => 'user-form'
				]) !!}

				@include('users.form')

				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>
@endsection