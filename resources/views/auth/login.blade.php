@extends('auth.auth')

@section('title', 'Login Form')

@php
$email = [
  'invalid' => $errors->has('email') ? 'is-invalid' : '',
  'feedback' => $errors->has('email') ? '<span class="invalid-feedback">'.$errors->first('email').'</span>' : ''
];
$password = [
  'invalid' => $errors->has('password') ? 'is-invalid' : '',
  'feedback' => $errors->has('password') ? '<span class="invalid-feedback">'.$errors->first('password').'</span>' : ''
];

$invalid_message = '';

if (session('invalid')) {
  $invalid_message = "<div class='alert alert-danger'>".session('invalid')."</div>";
  $email['invalid'] = 'is-invalid';
  $password['invalid'] = 'is-invalid';
}
@endphp

@section('content')
{!! Form::open([
  'method' => 'POST',
  'route' => 'login',
  'id' => 'login-form'
]) !!}

{!! $invalid_message !!}

<div class="form-group">
  {!! Form::label('email', 'Email', ['class' => 'font-weight-bold']) !!}
  {!! Form::text('email', null, ['class' => 'form-control '.$email['invalid'], 'id' => 'email', 'required']) !!}
  {!! $email['feedback'] !!}
</div>

<div class="form-group">
  {!! Form::label('password', 'Password', ['class' => 'font-weight-bold']) !!}
  {!! Form::password('password', ['class' => 'form-control '.$password['invalid'], 'id' => 'password', 'required']) !!}
  {!! $password['feedback'] !!}
</div>

<button type="submit" class="btn btn-block btn-info"><b>LOGIN</b></button>

<p class="text-center my-3"><b>- atau -</b></p>

<a href="{{ route('register') }}" class="btn btn-block btn-outline-info">Daftar Akun</a>

{!! Form::close() !!}
@endsection