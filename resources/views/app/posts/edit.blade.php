@extends('app.layouts.app')

@section('title', 'Tambah Posko')

@section('content')
<div id="main" class="container">
	<div class="section">

		<div class="section-separator">
			<hr class="hr-thick">
			<hr class="hr-thin">
			<h3>Daftar Posko</h3>
		</div>

		<div class="section-wrapper col-sm-12 rounded bg-light shadow">

			<h5 class="section-title">Edit Daftar Posko</h5>

			<div class="section-content">
				{!! Form::model($post, [
					'method' 	=> 'PUT',
					'route' 	=> ['posts.update', $post->id],
					'id'		=> 'post-form'
				]) !!}

				@include('app.posts.form')

				{!! Form::close() !!}
			</div>

		</div>

	</div>
</div>
@endsection