@extends('layouts.app')

@section('title', 'Tambah Posko')

@section('content')
<div id="main" class="container">
	<div>
		<div class="text-center h3 my-3">
			<div > Form Posko</div>
		</div>

		<div class="rounded bg-light shadow">
			<div class="m-3 p-3">

			<div class="h4 font-weight-bold text-primary mb-4">Tambah Daftar Posko</div>
				{!! Form::model($post, [
					'method' => 'POST',
					'route' => 'posts.store',
					'id' => 'post-form'
				]) !!}

				@include('posts.form')

				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>
@endsection
