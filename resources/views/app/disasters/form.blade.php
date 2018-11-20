@php
	$error_user_id = [
		'invalid' => $errors->has('user_id') ? 'is-invalid' : '',
		'feedback' => $errors->has('user_id') ? '<div class="invalid-feedback">'.$errors->first('user_id').'</div>' : '',
	];

	$error_name = [
		'invalid' => $errors->has('name') ? 'is-invalid' : '',
		'feedback' => $errors->has('name') ? '<div class="invalid-feedback">'.$errors->first('name').'</div>' : '',
	];

	$error_status = [
		'invalid' => $errors->has('status') ? 'is-invalid' : '',
		'feedback' => $errors->has('status') ? '<div class="invalid-feedback">'.$errors->first('status').'</div>' : '',
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

	$error_damage = [
		'invalid' => $errors->has('damage') ? 'is-invalid' : '',
		'feedback' => $errors->has('damage') ? '<div class="invalid-feedback">'.$errors->first('damage').'</div>' : '',
	];

	$error_description = [
		'invalid' => $errors->has('description') ? 'is-invalid' : '',
		'feedback' => $errors->has('description') ? '<div class="invalid-feedback">'.$errors->first('description').'</div>' : '',
	];
@endphp

<div class="form-group">
	{!! Form::label('user_id', 'User ID :', ['class' => 'label']) !!}
	{!! Form::number('user_id', null, ['class' => 'form-control '.$error_user_id['invalid'], 'id' => 'user_id', 'required']) !!}
	{!! $error_user_id['feedback'] !!}
</div>

<div class="form-group">
	{!! Form::label('name', 'Nama Bencana :', ['class' => 'label']) !!}
	{!! Form::text('name', null, ['class' => 'form-control '.$error_name['invalid'], 'id' => 'name', 'required']) !!}
	{!! $error_name['feedback'] !!}
</div>

<div class="form-group form-row">
	<div class="col">
		{!! Form::label('province_id', 'Provinsi :', ['class' => 'label']) !!}
		{!! Form::select('province_id', [
			'' => '',
			'1a' => 'Provinsi 1',
			'2a' => 'Provinsi 2',
			'3a' => 'Provinsi 3',
			'4a' => 'Provinsi 4'
		], null, ['class' => 'form-control '.$error_province_id['invalid'], 'id' => 'province_id', 'required']) !!}
		{!! $error_province_id['feedback'] !!}
	</div>
	<div class="col">
		{!! Form::label('regency_id', 'Kabupaten :', ['class' => 'label']) !!}
		{!! Form::select('regency_id', [
			'' => '',
			'a1a1' => 'Kabupaten 1',
			'a2a2' => 'Kabupaten 2',
			'a3a3' => 'Kabupaten 3',
			'a4a4' => 'Kabupaten 4'
		], null, ['class' => 'form-control '.$error_regency_id['invalid'], 'id' => 'regency_id', 'required']) !!}
		{!! $error_regency_id['feedback'] !!}
	</div>
	<div class="col">
		{!! Form::label('district_id', 'Kecamatan :', ['class' => 'label']) !!}
		{!! Form::select('district_id', [
			'' => '',
			'a1a1a1a' => 'Kecamatan 1',
			'a2a2a2a' => 'Kecamatan 2',
			'a3a3a3a' => 'Kecamatan 3',
			'a4a4a4a' => 'Kecamatan 4'
		], null, ['class' => 'form-control '.$error_district_id['invalid'], 'id' => 'district_id', 'required']) !!}
		{!! $error_district_id['feedback'] !!}
	</div>
	<div class="col">
		{!! Form::label('village_id', 'Desa :', ['class' => 'label']) !!}
		{!! Form::select('village_id', [
			'' => '',
			'a1a1a1a1a1' => 'Desa 1',
			'a2a2a2a2a2' => 'Desa 2',
			'a3a3a3a3a3' => 'Desa 3',
			'a4a4a4a4a4' => 'Desa 4'
		], null, ['class' => 'form-control '.$error_village_id['invalid'], 'id' => 'village_id', 'required']) !!}
		{!! $error_village_id['feedback'] !!}
	</div>
</div>

<div class="form-group">
	{!! Form::label('damage', 'Status Bencana :', ['class' => 'label']) !!}
	{!! Form::select('damage', [
		'' => '',
		'1' => 'Normal',
		'2' => 'Waspada',
		'3' => 'Siaga',
		'4' => 'Awas'
	], null, ['class' => 'form-control '.$error_damage['invalid'], 'id' => 'damage', 'required']) !!}
	{!! $error_damage['feedback'] !!}
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
	{!! Form::label('description', 'Description :', ['class' => 'label']) !!}
	<span class="small text-muted"> (optional)</span>
	{!! Form::textarea('description', null, ['class' => 'form-control '.$error_description['invalid'], 'id' => 'description', 'rows' => '5', 'required']) !!}
	{!! $error_description['feedback'] !!}
</div>

<a href="#" class="btn btn-secondary px-5">Cancel</a>
<button type="submit" class="btn btn-primary px-5">Submit</button>
