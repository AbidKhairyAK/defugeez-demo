@extends('layouts.app')

@section('title', 'Edit Posko')

@section('content')
<div id="main" class="container">
	<div>
		<div class="text-center h3 my-3">
			<div >Form Posko</div>
		</div>

		<div class="rounded bg-light shadow">
			<div class="m-3 p-3">

			<div class="h4 font-weight-bold text-primary mb-4">- Edit Posko -</div>
				{!! Form::model($post, [
					'method' => 'PUT',
					'route' => ['posts.update', $event->slug, $post->slug],
					'id' => 'post-form'
				]) !!}

				@include('posts.form')

				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>
@endsection