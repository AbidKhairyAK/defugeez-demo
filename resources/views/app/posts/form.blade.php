@php
	$error_user = [
		'invalid' => $errors->has('user_id') ? 'is-invalid' : '',
		'feedback' => $errors->has('user_id') ? '<div class="invalid-feedback">'.$errors->first('user_id').'</div>' : '',
	];
	$error_organization = [
		'invalid' => $errors->has('organization_id') ? 'is-invalid' : '',
		'feedback' => $errors->has('organization_id') ? '<div class="invalid-feedback">'.$errors->first('organization_id').'</div>' : '',
	];

	$error_disaster = [
		'invalid' => $errors->has('disaster_id') ? 'is-invalid' : '',
		'feedback' => $errors->has('disaster_id') ? '<div class="invalid-feedback">'.$errors->first('disaster_id').'</div>' : '',
	];

	$error_address = [
		'invalid' => $errors->has('address') ? 'is-invalid' : '',
		'feedback' => $errors->has('address') ? '<div class="invalid-feedback">'.$errors->first('address').'</div>' : '',
	];

	$error_name = [
		'invalid' => $errors->has('name') ? 'is-invalid' : '',
		'feedback' => $errors->has('name') ? '<div class="invalid-feedback">'.$errors->first('name').'</div>' : '',
	];

	$error_village = [
		'invalid' => $errors->has('village_id') ? 'is-invalid' : '',
		'feedback' => $errors->has('village_id') ? '<div class="invalid-feedback">'.$errors->first('village_id').'</div>' : '',
	];

	$error_district = [
		'invalid' => $errors->has('district_id') ? 'is-invalid' : '',
		'feedback' => $errors->has('district_id') ? '<div class="invalid-feedback">'.$errors->first('district_id').'</div>' : '',
	];

	$error_regency = [
		'invalid' => $errors->has('regency_id') ? 'is-invalid' : '',
		'feedback' => $errors->has('regency_id') ? '<div class="invalid-feedback">'.$errors->first('regency_id').'</div>' : '',
	];

	$error_province = [
		'invalid' => $errors->has('province_id') ? 'is-invalid' : '',
		'feedback' => $errors->has('province_id') ? '<div class="invalid-feedback">'.$errors->first('province_id').'</div>' : '',
	];

	$error_capacity = [
		'invalid' => $errors->has('capacity_id') ? 'is-invalid' : '',
		'feedback' => $errors->has('capacity_id') ? '<div class="invalid-feedback">'.$errors->first('capacity_id').'</div>' : '',
	];

	$error_barracks = [
		'invalid' => $errors->has('barracks') ? 'is-invalid' : '',
		'feedback' => $errors->has('barracks') ? '<div class="invalid-feedback">'.$errors->first('barracks').'</div>' : '',
	];

	$error_status = [
		'invalid' => $errors->has('status') ? 'is-invalid' : '',
		'feedback' => $errors->has('status') ? '<div class="invalid-feedback">'.$errors->first('status').'</div>' : '',
	];

@endphp
<div class="form-group">
	{!! Form::label('user_id', 'Organisasi :', ['class' => 'label']) !!}
	{!! Form::select('user_id', [
		'1' => 'aku', 
		'2' => 'bbukan', 
		'3' => 'GOPEY'
	], null, ['class' => 'custom-select'.$error_user['invalid'], 'id' => 'user_id', 'required']) !!}
	{!! $error_organization['feedback'] !!}
</div>

<div class="form-group">
	{!! Form::label('organization_id', 'Organisasi :', ['class' => 'label']) !!}
	{!! Form::select('organization_id', [
		'1' => 'ACETE', 
		'2' => 'INDIHOMO', 
		'3' => 'GOPEY'
	], null, ['class' => 'custom-select'.$error_organization['invalid'], 'id' => 'organization_id', 'required']) !!}
	{!! $error_organization['feedback'] !!}
</div>

<div class="form-group">
	{!! Form::label('disaster_id', 'Bencana :', ['class' => 'label']) !!}
	{!! Form::select('disaster_id', [
		'3' => 'GEMPA', 
		'4' => 'BLACK PLAGUE', 
		'5' => 'HANAKO + MAEDA'
	], null, ['class' => 'custom-select'.$error_disaster['invalid'], 'id' => 'disaster_id', 'required']) !!}
	{!! $error_disaster['feedback'] !!}
</div>

<div class="form-group">
	{!! Form::label('name', 'Nama Posko :', ['class' => 'label']) !!}
	{!! Form::text('name', null, ['class' => 'form-control'.$error_name['invalid'], 'id' => 'name', 'required']) !!}
	{!! $error_name['feedback'] !!}
</div>

<div class="form-group">
	{!! Form::label('address', 'Alamat Posko :', ['class' => 'label']) !!}
	{!! Form::text('address', null, ['class' => 'form-control'.$error_address['invalid'], 'id' => 'address', 'required']) !!}
	{!! $error_address['feedback'] !!}
</div>

<div class="form-group form-row">
	<div class="col">
		{!! Form::label('village_id', 'Desa :', ['class' => 'label']) !!}
		{!! Form::select('village_id', [
		'tenpoundes' => 'LOLI', 
		'tenpoundus' => 'WARNA MERAH', 
		'tenpoundis' => 'BIRU KUNING'
	], null, ['class' => 'custom-select'.$error_village['invalid'], 'id' => 'village_id', 'required']) !!}
	{!! $error_village['feedback'] !!}
	</div>
	<div class="col">
		{!! Form::label('district_id', 'Kecamatan :', ['class' => 'label']) !!}
		{!! Form::select('district_id', [
		'Hacaker' => 'MEULABOH', 
		'Hipster' => 'WINCONSIN', 
		'Hustler' => 'SAN MARCOS'
	], null, ['class' => 'custom-select'.$error_district['invalid'], 'id' => 'district_id', 'required']) !!}
	{!! $error_district['feedback'] !!}
	</div>
</div>

<div class="form-group form-row">
	<div class="col">
		{!! Form::label('regency_id', 'Kabupaten :', ['class' => 'label']) !!}
		{!! Form::select('regency_id', [
		'dfsa' => 'MAI', 
		'reyt' => 'FUTABA', 
		'hdfg' => 'KAEDE'
	], null, ['class' => 'custom-select'.$error_regency['invalid'], 'id' => 'regency_id', 'required']) !!}
	{!! $error_regency['feedback'] !!}
	</div>
	<div class="col">
		{!! Form::label('province_id', 'Provinsi :', ['class' => 'label']) !!}
		{!! Form::select('province_id', [
		'id' => 'KAEDE', 
		'as' => 'BEST', 
		'cf' => 'IMOTO'
	], null, ['class' => 'custom-select'.$error_province['invalid'], 'id' => 'province_id', 'required']) !!}
	{!! $error_province['feedback'] !!}
	</div>
</div>

<div class="form-group">
	{!! Form::label('capacity', 'Kapasitas Maksimum :', ['class' => 'label']) !!}
	{!! Form::number('capacity', null, ['class' => 'form-control '.$error_capacity['invalid'], 'id' => 'capacity', 'required']) !!}
	{!! $error_capacity['feedback'] !!}
</div>

<div class="form-group">
	{!! Form::label('barracks', 'Barak :', ['class' => 'label']) !!}
	{!! Form::number('barracks', null, ['class' => 'form-control '.$error_barracks['invalid'], 'id' => 'barracks', 'required']) !!}
	{!! $error_barracks['feedback'] !!}
</div>

<div class="form-group">
	{!! Form::label('demands', 'Barang-barang yang dibutuhkan :', ['class' => 'label']) !!}
	<span class="small text-muted"> (optional)</span>
	{!! Form::textarea('demands', null, ['class' => 'form-control ', 'id' => 'demands', 'rows' => '5']) !!}
</div>

<div class="form-group">
	{!! Form::label('description', 'Deskripsi :', ['class' => 'label']) !!}
	<span class="small text-muted"> (optional)</span>
	{!! Form::textarea('description', null, ['class' => 'form-control ', 'id' => 'description', 'rows' => '5']) !!}
</div>

<div class="form-group">
	{!! Form::label('status', 'Status :', ['class' => 'label mr-4']) !!}
	<div class="custom-control custom-radio custom-control-inline">
		{!! Form::radio('status', '1', false, ['class' => 'custom-control-input '.$error_status['invalid'], 'id' => 'active', 'required']) !!}
		{!! Form::label('active', 'Aktif', ['class' => 'custom-control-label']) !!}
	</div>
	<div class="custom-control custom-radio custom-control-inline">
		{!! Form::radio('status', '0', false, ['class' => 'custom-control-input ', 'id' => 'nonactive', 'required']) !!}
		{!! Form::label('nonactive', 'Nonaktif', ['class' => 'custom-control-label']) !!}
	</div>
	{!! $error_status['feedback'] !!}
</div>

<a href="#" class="btn btn-secondary px-5">Cancel</a>
<button type="submit" class="btn btn-primary px-5">Submit</button>