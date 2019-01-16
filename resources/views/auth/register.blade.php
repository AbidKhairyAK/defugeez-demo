@extends('auth.auth')

@section('title', 'User Register Form')

@php
$organization_id = [
  'invalid' => $errors->has('organization_id') ? 'is-invalid' : '',
  'feedback' => $errors->has('organization_id') ? '<span class="invalid-feedback">'.$errors->first('organization_id').'</span>' : ''
];
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

$current_province = old('province_id');
$current_regency = old('regency_id');
$current_district = old('district_id');
$current_village = old('village_id');
@endphp

@section('content')
{!! Form::model($user, [
  'method' => 'POST',
  'route' => 'register',
  'id' => 'register-form'
]) !!}

<div class="form-group">
  {!! Form::label('organization_id', 'Organisasi', ['class' => 'font-weight-bold']) !!}
  {!! Form::select('organization_id', [
    '' => '', 
    'Tanpa Organisasi' => [1 => 'Menjadi relawan tanpa organisasi'], 
    'Dengan Organisasi' => $organizations
  ], null, ['class' => 'form-control'.$organization_id['invalid'], 'id' => 'organization_id', 'required']) !!}
  {!! $organization_id['feedback'] !!}
</div>

<div class="form-group">
  {!! Form::label('name', 'Nama Lengkap', ['class' => 'font-weight-bold']) !!}
  {!! Form::text('name', null, ['class' => 'form-control '.$name['invalid'], 'id' => 'name', 'required']) !!}
  {!! $name['feedback'] !!}
</div>

<div class="form-group">
  {!! Form::label('nik', 'NIK / Nomor KTP', ['class' => 'font-weight-bold']) !!}
  {!! Form::text('nik', null, ['class' => 'form-control number '.$nik['invalid'], 'id' => 'nik', 'required']) !!}
  {!! $nik['feedback'] !!}
</div>

<div class="form-group">
  {!! Form::label('email', 'Email', ['class' => 'font-weight-bold']) !!}
  {!! Form::text('email', null, ['class' => 'form-control '.$email['invalid'], 'id' => 'email', 'required']) !!}
  {!! $email['feedback'] !!}
</div>

<div class="row">
  <div class="form-group col-md-6">
    {!! Form::label('password', 'Password', ['class' => 'font-weight-bold']) !!}
    {!! Form::password('password', ['class' => 'form-control '.$password['invalid'], 'id' => 'password', 'required']) !!}
    {!! $password['feedback'] !!}
  </div>

  <div class="form-group col-md-6">
    {!! Form::label('password_confirmation', 'Ulangi Password', ['class' => 'font-weight-bold']) !!}
    {!! Form::password('password_confirmation', ['class' => 'form-control '.$password_confirmation['invalid'], 'id' => 'password_confirmation', 'required']) !!}
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
    grid="col-md-6"
  ></location-form>
</div>

<div class="form-group">
  {!! Form::label('phone', 'Nomor HP / WA', ['class' => 'font-weight-bold']) !!}
  {!! Form::text('phone', null, ['class' => 'form-control number'.$phone['invalid'], 'id' => 'phone', 'required']) !!}
  {!! $phone['feedback'] !!}
</div>

<div class="d-flex justify-content-center">
  <div>
    <a href="{{ route('login') }}" class="btn btn-secondary"> Back to Login </a>
    <button type="submit" class="btn btn-info">Register</button>
  </div>
</div>

{!! Form::close() !!}
@endsection

@section('script')
<script type="text/javascript">
  $('#organization_id').select2();
</script>
@endsection