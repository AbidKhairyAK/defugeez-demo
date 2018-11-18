@php
	$error_email = [
		'invalid' => $errors->has('email') ? 'is-invalid' : '',
		'feedback' => $errors->has('email') ? '<div class="invalid-feedback">'.$errors->first('email').'</div>' : '',
	];

	$error_blood = [
		'invalid' => $errors->has('blood') ? 'is-invalid' : '',
		'feedback' => $errors->has('blood') ? '<div class="invalid-feedback">'.$errors->first('blood').'</div>' : '',
	];

	$error_status = [
		'invalid' => $errors->has('status') ? 'is-invalid' : '',
		'feedback' => $errors->has('status') ? '<div class="invalid-feedback">'.$errors->first('status').'</div>' : '',
	];

	$error_username = [
		'invalid' => $errors->has('username') ? 'is-invalid' : '',
		'feedback' => $errors->has('username') ? '<div class="invalid-feedback">'.$errors->first('username').'</div>' : '',
	];

	$error_password = [
		'invalid' => $errors->has('password') ? 'is-invalid' : '',
		'feedback' => $errors->has('password') ? '<div class="invalid-feedback">'.$errors->first('password').'</div>' : '',
	];

	$error_desc = [
		'invalid' => $errors->has('desc') ? 'is-invalid' : '',
		'feedback' => $errors->has('desc') ? '<div class="invalid-feedback">'.$errors->first('desc').'</div>' : '',
	];
@endphp

<div class="form-group">
	{!! Form::label('username', 'Username :', ['class' => 'label']) !!}
	{!! Form::text('username', null, ['class' => 'form-control '.$error_username['invalid'], 'id' => 'username', 'required']) !!}
	{!! $error_username['feedback'] !!}
</div>

<div class="form-group form-row">
	<div class="col">
		{!! Form::label('email', 'Email :', ['class' => 'label']) !!}
		{!! Form::email('email', null, ['class' => 'form-control '.$error_email['invalid'], 'id' => 'email', 'required']) !!}
		{!! $error_email['feedback'] !!}
	</div>
	<div class="col">
		{!! Form::label('password', 'Password :', ['class' => 'label']) !!}
		{!! Form::password('password', ['class' => 'form-control '.$error_password['invalid'], 'id' => 'password', 'required']) !!}
		{!! $error_password['feedback'] !!}
	</div>
</div>

<div class="form-group">
	{!! Form::label('blood', 'Darah :', ['class' => 'label']) !!}
	{!! Form::select('blood', ['' => '', 'A', 'B', 'O', 'AB'], null, ['class' => 'form-control '.$error_blood['invalid'], 'id' => 'blood', 'required']) !!}
	{!! $error_blood['feedback'] !!}
</div>

<div class="form-group">
	{!! Form::label('status', 'Status :', ['class' => 'label mr-4']) !!}
	<div class="custom-control custom-radio custom-control-inline">
		{!! Form::radio('status', '1', false, ['class' => 'custom-control-input '.$error_status['invalid'], 'id' => 'active', 'required']) !!}
		{!! Form::label('active', 'Aktif', ['class' => 'custom-control-label']) !!}
	</div>
	<div class="custom-control custom-radio custom-control-inline">
		{!! Form::radio('status', '0', false, ['class' => 'custom-control-input '.$error_status['invalid'], 'id' => 'nonactive', 'required']) !!}
		{!! Form::label('nonactive', 'Nonaktif', ['class' => 'custom-control-label']) !!}
	</div>
	{!! $error_status['feedback'] !!}
</div>

<div class="form-group">
	{!! Form::label('desc', 'Description :', ['class' => 'label']) !!}
	<span class="small text-muted"> (optional)</span>
	{!! Form::textarea('desc', null, ['class' => 'form-control '.$error_desc['invalid'], 'id' => 'desc', 'rows' => '5', 'required']) !!}
	{!! $error_desc['feedback'] !!}
</div>

<a href="#" class="btn btn-secondary px-5">Cancel</a>
<button type="submit" class="btn btn-primary px-5">Submit</button>