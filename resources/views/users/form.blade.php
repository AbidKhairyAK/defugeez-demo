@php
	$name = [
		'invalid' => $errors->has('name') ? 'is-invalid' : '',
		'feedback' => $errors->has('name') ? '<span class="invalid-feedback">'.$errors->first('name').'</span>' : ''
	];
	$status = [
		'invalid' => $errors->has('status') ? 'is-invalid' : '',
		'feedback' => $errors->has('status') ? '<span class="invalid-feedback">'.$errors->first('status').'</span>' : ''
	];
	$email = [
		'invalid' => $errors->has('email') ? 'is-invalid' : '',
		'feedback' => $errors->has('email') ? '<span class="invalid-feedback">'.$errors->first('email').'</span>' : ''
	];
	$nik = [
		'invalid' => $errors->has('nik') ? 'is-invalid' : '',
		'feedback' => $errors->has('nik') ? '<span class="invalid-feedback">'.$errors->first('nik').'</span>' : ''
	];
	$password = [
		'invalid' => $errors->has('password') ? 'is-invalid' : '',
		'feedback' => $errors->has('password') ? '<span class="invalid-feedback">'.$errors->first('password').'</span>' : ''
	];
	$password_old = [
		'invalid' => $errors->has('password_old') ? 'is-invalid' : '',
		'feedback' => $errors->has('password_old') ? '<span class="invalid-feedback">'.$errors->first('password_old').'</span>' : ''
	];
	$password_confirmation = [
		'invalid' => $errors->has('password_confirmation') ? 'is-invalid' : '',
		'feedback' => $errors->has('password_confirmation') ? '<span class="invalid-feedback">'.$errors->first('password_confirmation').'</span>' : ''
	];
	$phone = [
		'invalid' => $errors->has('phone') ? 'is-invalid' : '',
		'feedback' => $errors->has('phone') ? '<span class="invalid-feedback">'.$errors->first('phone').'</span>' : ''
	];
	$role = [
		'invalid' => $errors->has('role') ? 'is-invalid' : '',
		'feedback' => $errors->has('role') ? '<span class="invalid-feedback">'.$errors->first('role').'</span>' : ''
	];
	$address = [
		'invalid' => $errors->has('address') ? 'is-invalid' : '',
		'feedback' => $errors->has('address') ? '<span class="invalid-feedback">'.$errors->first('address').'</span>' : ''
	];
	$province_id = [
		'invalid' => $errors->has('province_id') ? 'is-invalid' : '',
		'feedback' => $errors->has('province_id') ? '<span class="invalid-feedback">'.$errors->first('province_id').'</span>' : ''
	];
	$regency_id = [
		'invalid' => $errors->has('regency_id') ? 'is-invalid' : '',
		'feedback' => $errors->has('regency_id') ? '<span class="invalid-feedback">'.$errors->first('regency_id').'</span>' : ''
	];
	$district_id = [
		'feedback' => $errors->has('district_id') ? $errors->first('district_id') : null
	];
	$village_id = [
		'feedback' => $errors->has('village_id') ? $errors->first('village_id') : null
	];

	$current_province = $user->exists ? $user->province_id : null;
	$current_regency = $user->exists ? $user->regency_id : null;
	$current_district = $user->exists ? $user->district_id : null;
	$current_village = $user->exists ? $user->village_id : null;

	$password_old_msg = session('password_old') ?: '';

@endphp

@can('users.activate', $user)
<div class="form-group {{ !$user->exists ? 'd-none' : '' }}">
	{!! Form::label('status', 'Status :', ['class' => 'label mr-4 font-weight-bold']) !!}
	<div class="custom-control custom-radio custom-control-inline">
		{!! Form::radio('status', '1', true, ['class' => 'custom-control-input '.$status['invalid'], 'id' => '1', 'required']) !!}
		{!! Form::label('1', 'Aktif', ['class' => 'custom-control-label']) !!}
	</div>
	<div class="custom-control custom-radio custom-control-inline">
		{!! Form::radio('status', '0', null, ['class' => 'custom-control-input ', 'id' => '0', 'required']) !!}
		{!! Form::label('0', 'Nonaktif', ['class' => 'custom-control-label']) !!}
	</div>
	{!! $status['feedback'] !!}
</div>
@endcan

<div class="form-group">
	{!! Form::label('name', 'Nama Lengkap', ['class' => 'font-weight-bold']) !!}
	{!! Form::text('name', null, ['class' => 'form-control '.$name['invalid'], 'id' => 'name', 'required']) !!}
	{!! $name['feedback'] !!}
</div>

<div class="form-group">
	{!! Form::label('nik', 'NIK / Nomor KTP', ['class' => 'font-weight-bold']) !!}
	{!! Form::text('nik', null, ['class' => 'form-control '.$nik['invalid'], 'id' => 'nik', 'required']) !!}
	{!! $nik['feedback'] !!}
</div>

<div class="form-group">
	{!! Form::label('email', 'Email', ['class' => 'font-weight-bold']) !!}
	{!! Form::text('email', null, ['class' => 'form-control '.$email['invalid'], 'id' => 'email', 'required']) !!}
	{!! $email['feedback'] !!}
</div>

<div class="row">
	<div class="form-group {{ !$user->exists ? 'd-none col-md-6' : 'col-md-4' }}">
		{!! Form::label('password_old', 'Password Lama', ['class' => 'font-weight-bold']) !!}
		{!! Form::password('password_old', ['class' => 'form-control '.$password_old['invalid'], 'id' => 'password_old']) !!}
		{!! $password_old['feedback'] !!}
		<p class="small text-danger">{{ $password_old_msg }}</p>
	</div>

	<div class="form-group {{ !$user->exists ? 'col-md-6' : 'col-md-4' }}">
		{!! !$user->exists
			? Form::label('password', 'Password', ['class' => 'font-weight-bold']) 
			: Form::label('password', 'Password Baru', ['class' => 'font-weight-bold']) 
		!!}
		{!! Form::password('password', ['class' => 'form-control '.$password['invalid'], 'id' => 'password']) !!}
		{!! $password['feedback'] !!}
	</div>

	<div class="form-group {{ !$user->exists ? 'col-md-6' : 'col-md-4' }}">
		{!! !$user->exists
			? Form::label('password_confirmation', 'Ulangi Password', ['class' => 'font-weight-bold']) 
			: Form::label('password_confirmation', 'Ulangi Password Baru', ['class' => 'font-weight-bold']) 
		!!}
		{!! Form::password('password_confirmation', ['class' => 'form-control '.$password_confirmation['invalid'], 'id' => 'password_confirmation']) !!}
		{!! $password_confirmation['feedback'] !!}
	</div>
</div>

<div class="form-group">
	{!! Form::label('address', 'Alamat', ['class' => 'font-weight-bold']) !!}
	{!! Form::text('address', null, ['class' => 'form-control '.$address['invalid'], 'id' => 'address', 'required']) !!}
	{!! $address['feedback'] !!}
</div>

<div id="vue">
	<location-form 
		display_province="true" display_regency="true" display_district="true" display_village="true"
		error_province="{{ $district_id['feedback'] }}"
		error_regency="{{ $district_id['feedback'] }}"
		error_district="{{ $district_id['feedback'] }}"
		error_village="{{ $village_id['feedback'] }}"
		province_id="{{ $current_province }}"
		regency_id="{{ $current_regency }}"
		district_id="{{ $current_district }}"
		village_id="{{ $current_village }}"
	></location-form>
</div>


<div class="form-group">
	{!! Form::label('phone', 'Nomor HP / WA', ['class' => 'font-weight-bold']) !!}
	{!! Form::text('phone', null, ['class' => 'form-control number'.$phone['invalid'], 'id' => 'phone', 'required']) !!}
	{!! $phone['feedback'] !!}
</div>

<div class="form-group">
	{!! Form::label('role', 'Role / Peran', ['class' => 'font-weight-bold']) !!}
	{!! Form::select('role', [
		'' => '', 
		2 => 'Admin',
		3 => 'Relawan'
	], null, ['class' => 'form-control '.$role['invalid'], 'id' => 'role', 'required']) !!}
	{!! $role['feedback'] !!}
</div>

<div class="d-flex justify-content-center">
	<div>
		<a href="{{ route('users.page', session('organization_id')) }}" class="btn btn-secondary"> Cancel </a>
		<button type="submit" class="btn btn-info">Submit</button>
	</div>
</div>

@section('script')
<script src="/js/app.js"></script>
<script src="/js/textnumber.js"></script>
@endsection