@extends('app.layouts.app')

@section('title', 'Tambah Relawan')

@section('content')
<div id="main" class="container">
	<div class="section">

		<div class="section-separator">
			<hr class="hr-thick">
			<hr class="hr-thin">
			<h3>Daftar Relawan</h3>
		</div>

		<div class="section-wrapper col-sm-12 rounded bg-light shadow">

			<h5 class="section-title">Tambah Daftar Relawan</h5>

			<div class="section-content">
				{!! Form::model($user, [
					'route' => 'users.store',
					'id'		=> 'user-form'
				]) !!}

				@include('app.users.form')

				{!! Form::close() !!}
			</div>

		</div>

	</div>
</div>
@endsection