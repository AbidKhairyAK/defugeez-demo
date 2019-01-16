@php
	$name = [
		'invalid' => $errors->has('name') ? 'is-invalid' : '',
		'feedback' => $errors->has('name') ? '<span class="invalid-feedback">'.$errors->first('name').'</span>' : ''
	];
	$chairman = [
		'invalid' => $errors->has('chairman') ? 'is-invalid' : '',
		'feedback' => $errors->has('chairman') ? '<span class="invalid-feedback">'.$errors->first('chairman').'</span>' : ''
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
	$email = [
		'invalid' => $errors->has('email') ? 'is-invalid' : '',
		'feedback' => $errors->has('email') ? '<span class="invalid-feedback">'.$errors->first('email').'</span>' : ''
	];
	$phone = [
		'invalid' => $errors->has('phone') ? 'is-invalid' : '',
		'feedback' => $errors->has('phone') ? '<span class="invalid-feedback">'.$errors->first('phone').'</span>' : ''
	];
	$account_number = [
		'invalid' => $errors->has('account_number') ? 'is-invalid' : '',
		'feedback' => $errors->has('account_number') ? '<span class="invalid-feedback">'.$errors->first('account_number').'</span>' : ''
	];
	$profile = [
		'invalid' => $errors->has('profile') ? 'is-invalid' : '',
		'feedback' => $errors->has('profile') ? '<span class="invalid-feedback">'.$errors->first('profile').'</span>' : ''
	];
	$logo_image = [
		'invalid' => $errors->has('logo_image') ? 'is-invalid' : '',
		'feedback' => $errors->has('logo_image') ? '<span class="invalid-feedback">'.$errors->first('logo_image').'</span>' : ''
	];

	$current_province = $organization->exists ? $organization->province_id : null;
	$current_regency = $organization->exists ? $organization->regency_id : null;
	$current_district = $organization->exists ? $organization->district_id : null;
	$current_village = $organization->exists ? $organization->village_id : null;
	$placeholder = $organization->exists ? '/img/logo/'.$organization->logo : 'https://via.placeholder.com/200x150.png?text=Select+Your+Logo';
@endphp

<div class="form-group">
	{!! Form::label('name', 'Nama Organisasi', ['class' => 'font-weight-bold']) !!}
	{!! Form::text('name', null, ['class' => 'form-control '.$name['invalid'], 'id' => 'name', 'required']) !!}
	{!! $name['feedback'] !!}
</div>

<div class="form-group">
	{!! Form::label('chairman', 'Nama Ketua Organisasi', ['class' => 'font-weight-bold']) !!}
	{!! Form::text('chairman', null, ['class' => 'form-control '.$chairman['invalid'], 'id' => 'chairman', 'required']) !!}
	{!! $chairman['feedback'] !!}
</div>

<div class="form-group">
	{!! Form::label('address', 'Alamat Kantor Pusat', ['class' => 'font-weight-bold']) !!}
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
	{!! Form::label('email', 'Email', ['class' => 'font-weight-bold']) !!}
	{!! Form::email('email', null, ['class' => 'form-control '.$email['invalid'], 'id' => 'email', 'required']) !!}
	{!! $email['feedback'] !!}
</div>

<div class="form-group">
	{!! Form::label('phone', 'Nomor Telepon / WA', ['class' => 'font-weight-bold']) !!}
	{!! Form::text('phone', null, ['class' => 'form-control number '.$phone['invalid'], 'id' => 'phone', 'required']) !!}
	{!! $phone['feedback'] !!}
</div>

<div class="form-group">
	{!! Form::label('account_number', 'Nomor Rekening', ['class' => 'font-weight-bold']) !!}<span class="small text-muted">  (tidak wajib)</span>
	{!! Form::text('account_number', null, ['class' => 'form-control number '.$account_number['invalid'], 'id' => 'account_number']) !!}
	{!! $account_number['feedback'] !!}
</div>

<div class="form-group">
	{!! Form::label('profile', 'Profil Singkat', ['class' => 'font-weight-bold']) !!}
	{!! Form::textarea('profile', null, ['class' => 'form-control', 'rows' => '5', 'id' => 'profile']) !!}
</div>

<div class="form-group d-flex flex-column">
	{!! Form::label('logo', 'Logo Organisasi', ['class' => 'font-weight-bold']) !!}

	<div class="fileinput fileinput-new" data-provides="fileinput">
	  <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
	    <img src="{{ $placeholder }}" alt="Select your logo">
	  </div>
	  <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
	  <div>
	    <span class="btn btn-outline-info btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span>
				{!! Form::file('logo_image', null, ['class' => 'form-control '.$logo_image['invalid'], 'id' => 'logo', 'required']) !!}
	  	</span>
	    <a href="#" class="btn btn-outline-secondary fileinput-exists" data-dismiss="fileinput">Remove</a>
	  </div>
	</div>

	{!! $logo_image['feedback'] !!}
</div>

<div class="d-flex justify-content-center">
	<div>
		<a href="{{ route('organizations.page') }}" class="btn btn-secondary"> Cancel </a>
		<button type="submit" class="btn btn-info">Submit</button>
	</div>
</div>

@section('script')
<script src="/js/app.js"></script>
<script src="/js/textnumber.js"></script>
<!-- Jasny Bootstrap -->
<script src="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/js/jasny-bootstrap.min.js"></script>
@endsection

@section('style')
<!-- Jasny Bootstrap -->
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css">
@endsection