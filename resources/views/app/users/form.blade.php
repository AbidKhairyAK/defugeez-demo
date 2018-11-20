@php
	$error_email = [
		'invalid' => $errors->has('email') ? 'is-invalid' : '',
		'feedback' => $errors->has('email') ? '<div class="invalid-feedback">'.$errors->first('email').'</div>' : '',
	];

	$error_nik = [
		'invalid' => $errors->has('nik') ? 'is-invalid' : '',
		'feedback' => $errors->has('nik') ? '<div class="invalid-feedback">'.$errors->first('nik').'</div>' : '',
	];

	$error_name = [
		'invalid' => $errors->has('name') ? 'is-invalid' : '',
		'feedback' => $errors->has('name') ? '<div class="invalid-feedback">'.$errors->first('name').'</div>' : '',
	];

	$error_password = [
		'invalid' => $errors->has('password') ? 'is-invalid' : '',
		'feedback' => $errors->has('password') ? '<div class="invalid-feedback">'.$errors->first('password').'</div>' : '',
	];

	$error_password_confirmation = [
		'invalid' => $errors->has('password_confirmation') ? 'is-invalid' : '',
		'feedback' => $errors->has('password_confirmation') ? '<div class="invalid-feedback">'.$errors->first('password_confirmation').'</div>' : '',
	];

	$error_role = [
		'invalid' => $errors->has('role') ? 'is-invalid' : '',
		'feedback' => $errors->has('role') ? '<div class="invalid-feedback">'.$errors->first('role').'</div>' : '',
	];

	$error_organization_id = [
		'invalid' => $errors->has('organization_id') ? 'is-invalid' : '',
		'feedback' => $errors->has('organization_id') ? '<div class="invalid-feedback">'.$errors->first('organization_id').'</div>' : '',
	];

	$error_address = [
		'invalid' => $errors->has('address') ? 'is-invalid' : '',
		'feedback' => $errors->has('address') ? '<div class="invalid-feedback">'.$errors->first('address').'</div>' : '',
	];

	$error_province_id = [
		'invalid' => $errors->has('province_id') ? 'is-invalid' : '',
		'feedback' => $errors->has('province_id') ? '<div class="invalid-feedback">'.$errors->first('province_id').'</div>' : '',
	];

	$error_regency_id = [
		'invalid' => $errors->has('regency_id') ? 'is-invalid' : '',
		'feedback' => $errors->has('regency_id') ? '<div class="invalid-feedback">'.$errors->first('regency_id').'</div>' : '',
	];

	$error_district_id = [
		'invalid' => $errors->has('district_id') ? 'is-invalid' : '',
		'feedback' => $errors->has('district_id') ? '<div class="invalid-feedback">'.$errors->first('district_id').'</div>' : '',
	];

	$error_village_id = [
		'invalid' => $errors->has('village_id') ? 'is-invalid' : '',
		'feedback' => $errors->has('village_id') ? '<div class="invalid-feedback">'.$errors->first('village_id').'</div>' : '',
	];

	$error_status = [
		'invalid' => $errors->has('status') ? 'is-invalid' : '',
		'feedback' => $errors->has('status') ? '<div class="invalid-feedback">'.$errors->first('status').'</div>' : '',
	];

	$error_phone = [
		'invalid' => $errors->has('phone') ? 'is-invalid' : '',
		'feedback' => $errors->has('phone') ? '<div class="invalid-feedback">'.$errors->first('phone').'</div>' : '',
	];

@endphp

<div class="form-group">
	{!! Form::label('name', 'Username :', ['class' => 'label']) !!}
	{!! Form::text('name', null, ['class' => 'form-control '.$error_name['invalid'], 'id' => 'name', 'required']) !!}
	{!! $error_name['feedback'] !!}
</div>

<div class="form-group">
	{!! Form::label('email', 'Email :', ['class' => 'label']) !!}
	{!! Form::email('email', null, ['class' => 'form-control '.$error_email['invalid'], 'id' => 'email', 'required']) !!}
	{!! $error_email['feedback'] !!}
</div>

<div class="form-group form-row">
	<div class="col">
		{!! Form::label('password', 'Password :', ['class' => 'label']) !!}
		{!! Form::password('password', ['class' => 'form-control '.$error_password['invalid'], 'id' => 'password']) !!}
		{!! $error_password['feedback'] !!}
	</div>
	<div class="col">
		{!! Form::label('password_confirmation', 'Password Confirmation :', ['class' => 'label']) !!}
		{!! Form::password('password_confirmation', ['class' => 'form-control '.$error_password_confirmation['invalid'], 'id' => 'password_confirmation']) !!}
		{!! $error_password_confirmation['feedback'] !!}
	</div>
</div>

<div class="form-group">
	{!! Form::label('address', 'Address :', ['class' => 'label']) !!}
	{!! Form::text('address', null, ['class' => 'form-control '.$error_address['invalid'], 'id' => 'address', 'required']) !!}
	{!! $error_address['feedback'] !!}
</div>

<div class="form-group form-row">
	<div class="col-md">
		{!! Form::label('province_id', 'Provinsi :', ['class' => 'label']) !!}
		{!! Form::select('province_id', [
			'' => '', 
			'11' => 'Provinsi 1', 
			'22' => 'Provinsi 2', 
			'33' => 'Provinsi 3'
		], null, ['class' => 'form-control '.$error_province_id['invalid'], 'id' => 'province_id', 'required']) !!}
		{!! $error_province_id['feedback'] !!}
	</div>
	<div class="col-md">
		{!! Form::label('regency_id', 'Kabupaten :', ['class' => 'label']) !!}
		{!! Form::select('regency_id', [
			'' => '', 
			'1111' => 'Kabupaten 1', 
			'2222' => 'Kabupaten 2', 
			'3333' => 'Kabupaten 3'
		], null, ['class' => 'form-control '.$error_regency_id['invalid'], 'id' => 'regency_id', 'required']) !!}
		{!! $error_regency_id['feedback'] !!}
	</div>
	<div class="col-md">
		{!! Form::label('district_id', 'Kecamatan :', ['class' => 'label']) !!}
		{!! Form::select('district_id', [
			'' => '', 
			'1111111' => 'Kecamatan 1', 
			'2222222' => 'Kecamatan 2', 
			'3333333' => 'Kecamatan 3'
		], null, ['class' => 'form-control '.$error_district_id['invalid'], 'id' => 'district_id', 'required']) !!}
		{!! $error_district_id['feedback'] !!}
	</div>
	<div class="col-md">
		{!! Form::label('village_id', 'Kelurahan :', ['class' => 'label']) !!}
		{!! Form::select('village_id', [
			'' => '', 
			'1111111111' => 'Kelurahan 1', 
			'2222222222' => 'Kelurahan 2', 
			'3333333333' => 'Kelurahan 3'
		], null, ['class' => 'form-control '.$error_village_id['invalid'], 'id' => 'village_id', 'required']) !!}
		{!! $error_village_id['feedback'] !!}
	</div>
</div>

<div class="form-group form-row">
	<div class="col">
		{!! Form::label('nik', 'NIK :', ['class' => 'label']) !!}
		{!! Form::text('nik', null, ['class' => 'form-control '.$error_nik['invalid'], 'id' => 'nik', 'required']) !!}
		{!! $error_nik['feedback'] !!}
	</div>
	<div class="col">
		{!! Form::label('phone', 'Nomor HP / WA :', ['class' => 'label']) !!}
		{!! Form::text('phone', null, ['class' => 'form-control '.$error_phone['invalid'], 'id' => 'phone', 'required']) !!}
		{!! $error_phone['feedback'] !!}
	</div>
</div>

<div class="form-group">
	{!! Form::label('organization_id', 'Organization :', ['class' => 'label']) !!}
	{!! Form::select('organization_id', [
		'' => '', 
		'1' => 'Organization 1', 
		'2' => 'Organization 2', 
		'3' => 'Organization 3'
	], null, ['class' => 'form-control '.$error_organization_id['invalid'], 'id' => 'organization_id', 'required']) !!}
	{!! $error_organization_id['feedback'] !!}
</div>

<div class="form-group">
	{!! Form::label('role', 'Role :', ['class' => 'label']) !!}
	{!! Form::select('role', [
		'' => '', 
		'1' => 'Role 1', 
		'2' => 'Role 2', 
		'3' => 'Role 3'
	], null, ['class' => 'form-control '.$error_role['invalid'], 'id' => 'role', 'required']) !!}
	{!! $error_role['feedback'] !!}
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

<a href="{{ route('users.index') }}" class="btn btn-secondary px-5">Cancel</a>
<button type="submit" class="btn btn-primary px-5">Submit</button>