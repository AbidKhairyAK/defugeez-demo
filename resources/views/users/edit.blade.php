@extends('layouts.app')

@section('title', 'Edit Relawan')

@section('content')
<div id="main" class="container">
	<div>
		<div class="text-center h3 my-3">
			<div >- Form Relawan -</div>
		</div>

		<div class="rounded bg-light shadow">
			<div class="m-3 mb-5 p-3">

				<div class="d-flex justify-content-between">
					<div class="h4 font-weight-bold text-primary mb-4">Edit Relawan</div>
					@can('users.delete', $user)
					<form class="d-block" action="{{ route('users.destroy', [$organization->slug, $user->slug]) }}" method="post">
						@csrf @method('DELETE')
						<button class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin?')">Hapus Akun</button>
					</form>
					@endcan
				</div>

				{!! Form::model($user, [
					'method' => 'PUT',
					'route' => ['users.update', $organization->slug, $user->slug],
					'id' => 'user-form'
				]) !!}

				@include('users.form')

				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>
@endsection