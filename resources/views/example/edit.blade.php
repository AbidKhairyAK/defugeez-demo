@extends('layouts.app')

@section('content')
<div id="main" class="container">
	<div>
		<div class="text-center h3 my-3">
			<div >Form Example</div>
		</div>

		<div class="rounded bg-light shadow">
			<div class="m-3 p-3">

			<div class="h4 font-weight-bold text-primary mb-4">Tambah Daftar Contoh</div>
				{!! Form::model($test, [
					'method' => 'PUT',
					//'route' => ['users.update', $test->id ],
					'id' => 'user-form'
				]) !!}

				@include('example.form')

				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>
@section('script')
	<script type="text/javascript">
		$(document).ready(function() {
	    	$('.select2').select2();
		});
	</script>
@endsection