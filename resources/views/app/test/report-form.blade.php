@php
	$error_report = [
		'invalid' => $errors->has('report') ? 'is-invalid' : '',
		'feedback' => $errors->has('report') ? '<div class="invalid-feedback">'.$errors->first('report').'</div>' : '',
	];

	$error_other = [
		'invalid' => $errors->has('other') ? 'is-invalid' : '',
		'feedback' => $errors->has('other') ? '<div class="invalid-feedback">'.$errors->first('other').'</div>' : '',
	];

	$error_desc = [
		'invalid' => $errors->has('desc') ? 'is-invalid' : '',
		'feedback' => $errors->has('desc') ? '<div class="invalid-feedback">'.$errors->first('desc').'</div>' : '',
	];
@endphp

<div class="form-group">
	{!! Form::label('report', 'Laporan :', ['class' => 'label']) !!}
	{!! Form::select('report', [
		'' => '',
		'1' => 'Pertanyaan & laporan yang paling umum 1',
		'2' => 'Pertanyaan & laporan yang paling umum 2',
		'3' => 'Pertanyaan & laporan yang paling umum 3',
		'4' => 'Pertanyaan & laporan yang paling umum 4',
	], null, ['class' => 'form-control '.$error_report['invalid'], 'id' => 'report', 'required']) !!}
	{!! $error_report['feedback'] !!}
</div>

<div class="form-group">
	{!! Form::label('other', 'other :', ['class' => 'label']) !!}
	{!! Form::text('other', null, ['class' => 'form-control '.$error_other['invalid'], 'id' => 'other', 'required']) !!}
	{!! $error_other['feedback'] !!}
</div>

<div class="form-group">
	{!! Form::label('desc', 'Description :', ['class' => 'label']) !!}
	<span class="small text-muted"> (optional)</span>
	{!! Form::textarea('desc', null, ['class' => 'form-control '.$error_desc['invalid'], 'id' => 'desc', 'rows' => '5', 'required']) !!}
	{!! $error_desc['feedback'] !!}
</div>

<a href="#" class="btn btn-secondary px-5">Batal</a>
<button type="submit" class="btn btn-primary px-5">Laporkan</button>