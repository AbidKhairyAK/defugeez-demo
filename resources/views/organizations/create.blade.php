@extends('layouts.app')

@section('title', 'Tambah Organisasi')

@section('content')
<div id="main" class="container">
	<div>
		<div class="text-center h3 my-3">
			<div> Form Organisasi</div>
		</div>

		<div class="rounded bg-light shadow">
			<div class="m-3 mb-5 p-3">

			<div class="h4 font-weight-bold text-primary mb-4">- Tambah Organisasi -</div>
				{!! Form::model($organization, [
					'method' => 'POST',
					'route' => 'organizations.store',
					'files' => true,
					'id' => 'organization-form'
				]) !!}

				@include('organizations.form')

				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>
@endsection
