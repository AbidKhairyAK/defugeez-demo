@php
	$name = [
		'invalid' => $errors->has('name') ? 'is-invalid' : '',
		'feedback' => $errors->has('name') ? '<span class="invalid-feedback">'.$errors->first('name').'</span>' : ''
	];
	$gender = [
		'invalid' => $errors->has('gender') ? 'is-invalid' : '',
		'feedback' => $errors->has('gender') ? '<span class="invalid-feedback">'.$errors->first('gender').'</span>' : ''
	];
	$health = [
		'invalid' => $errors->has('health') ? 'is-invalid' : '',
		'feedback' => $errors->has('health') ? '<span class="invalid-feedback">'.$errors->first('health').'</span>' : ''
	];
	$status = [
		'invalid' => $errors->has('status') ? 'is-invalid' : '',
		'feedback' => $errors->has('status') ? '<span class="invalid-feedback">'.$errors->first('status').'</span>' : ''
	];
	$rradio = [
		'invalid' => $errors->has('rradio') ? 'is-invalid' : '',
		'feedback' => $errors->has('rradio') ? '<span class="invalid-feedback">'.$errors->first('rradio').'</span>' : ''
	];
	$barrack = [
		'invalid' => $errors->has('barrack') ? 'is-invalid' : '',
		'feedback' => $errors->has('barrack') ? '<span class="invalid-feedback">'.$errors->first('barrack').'</span>' : ''
	];

	for ($i=1; $i <= $post->barracks; $i++) { 
		$barrackData[$i] = 'barak '. $i;
	}
@endphp

@if($refugee->exists)
<div class="form-group">
	{!! Form::label('status', 'Status', ['class' => 'font-weight-bold']) !!}
	{!! Form::select('status', 
	[1 => 'Di Tempat', 2 => 'Sudah Pulang', 3 => 'Pindah Posko', 4 => 'Hilang'], 
	null,
	['class' => 'form-control select2'.$status['invalid'], 'id' => 'status', 'required']) !!}
	{!! $status['feedback'] !!}
</div>
@endif

<div class="form-group">
	{!! Form::label('name', 'Nama', ['class' => 'font-weight-bold']) !!}
	{!! Form::text('name', null, ['class' => 'form-control '.$name['invalid'], 'id' => 'name', 'required']) !!}
	{!! $name['feedback'] !!}
</div>

<div class="form-group">
	{!! Form::label('gender', 'Jenis Kelamin :', ['class' => 'label mr-4 font-weight-bold']) !!}
	<div class="custom-control custom-radio custom-control-inline">
		{!! Form::radio('gender', 'L', false, ['class' => 'custom-control-input '.$gender['invalid'], 'id' => 'gender1', 'required']) !!}
		{!! Form::label('gender1', 'Laki-Laki', ['class' => 'custom-control-label']) !!}
	</div>
	<div class="custom-control custom-radio custom-control-inline">
		{!! Form::radio('gender', 'P', false, ['class' => 'custom-control-input '.$gender['invalid'], 'id' => 'gender2', 'required']) !!}
		{!! Form::label('gender2', 'Perempuan', ['class' => 'custom-control-label']) !!}
	</div>
	{!! $gender['feedback'] !!}
</div>

<div class="form-group">
	{!! Form::label('origin', 'Asal', ['class' => 'font-weight-bold']) !!}
	{!! Form::text('origin', null, ['class' => 'form-control ', 'id' => 'origin']) !!}
</div>

<div class="form-group">
	{!! Form::label('birthdate', 'Tanggal Lahir', ['class' => 'font-weight-bold']) !!}
	{!! Form::date('birthdate', null, ['class' => 'form-control ', 'id' => 'birthdate']) !!}
</div>

<div class="form-group">
	{!! Form::label('health', 'Kesehatan', ['class' => 'font-weight-bold']) !!}
	{!! Form::select('health', 
	[1 => 'Sehat', 2 => 'Sakit Ringan', 3 => 'Sakit Berat', 4 => 'Meninggal'], 
	null,
	['class' => 'form-control select2'.$health['invalid'], 'id' => 'health', 'required']) !!}
	{!! $health['feedback'] !!}
</div>

<div class="form-group">
	{!! Form::label('blood_type', 'Golongan Darah :', ['class' => 'label mr-4 font-weight-bold']) !!}
	<div class="custom-control custom-radio custom-control-inline">
		{!! Form::radio('blood_type', 'A', false, ['class' => 'custom-control-input ', 'id' => 'blooda']) !!}
		{!! Form::label('blooda', 'A', ['class' => 'custom-control-label']) !!}
	</div>
	<div class="custom-control custom-radio custom-control-inline">
		{!! Form::radio('blood_type', 'B', false, ['class' => 'custom-control-input ', 'id' => 'bloodb']) !!}
		{!! Form::label('bloodb', 'B', ['class' => 'custom-control-label']) !!}
	</div>
	<div class="custom-control custom-radio custom-control-inline">
		{!! Form::radio('blood_type', 'AB', false, ['class' => 'custom-control-input ', 'id' => 'bloodab']) !!}
		{!! Form::label('bloodab', 'AB', ['class' => 'custom-control-label']) !!}
	</div>
	<div class="custom-control custom-radio custom-control-inline">
		{!! Form::radio('blood_type', 'O', false, ['class' => 'custom-control-input ', 'id' => 'bloodo']) !!}
		{!! Form::label('bloodo', 'O', ['class' => 'custom-control-label']) !!}
	</div>
</div>

<div class="form-group">
	{!! Form::label('barrack', 'Barak', ['class' => 'font-weight-bold']) !!}
	{!! Form::select('barrack', 
	$barrackData,
	null,
	['class' => 'form-control select2'.$barrack['invalid'], 'id' => 'barrack', 'required']) !!}
	{!! $barrack['feedback'] !!}
</div>

<div class="form-group">
	{!! Form::label('description', 'Keterangan Tambahan', ['class' => 'font-weight-bold']) !!}
	{!! Form::textarea('description', null, ['class' => 'form-control ', 'id' => 'description']) !!}
</div>
<div class="d-flex justify-content-center">
	<div>
		<a href="{{ route('refugees.page', session('post_id')) }}" class="btn btn-secondary"> Cancel </a>
		<button type="submit" class="btn btn-info">Submit</button>
	</div>
</div>

@section('script')
<script type="text/javascript">
	$('.select2').select2();
</script>
@endsection