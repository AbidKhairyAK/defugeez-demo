@extends('layouts.app')

@section('title', 'Edit Organisasi')

@section('content')
<div id="main" class="container">
	<div>
		<div class="text-center h3 my-3">
			<div>- Form Organisasi -</div>
		</div>

		<div class="rounded bg-light shadow">
			<div class="m-3 p-3">

				<div class="d-flex justify-content-between">
					<div class="h4 font-weight-bold text-primary mb-4">Edit Organisasi</div>

					 @can('organizations.delete', $organization)
					<form class="d-block" action="{{ route('organizations.destroy', $organization->id) }}" method="post">
						@csrf
						{{ method_field('DELETE') }}
						<button class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin?')">Hapus Organisasi</button>
					</form>
					@endcan
				</div>

				{!! Form::model($organization, [
					'method' => 'PUT',
					'route' => ['organizations.update', $organization->id],
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
