<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="HandheldFriendly" content="true">
	<title>{{ env('APP_PREFIX').env('APP_NAME') }} | @yield('title')</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Raleway:200,400,400i,700" rel="stylesheet">
	<!-- Layout CSS -->
	<link rel="stylesheet" type="text/css" href="/css/style.css">
</head>
<body>

<div class="container">

  <div class="row justify-content-center" style="margin-top:80px">
      <div class=" col-md-6 col-sm-offset-2 col-md-offset-3 bg-light shadow rounded p-4">
  		<form role="form" action="{{ route('login') }}" method="post">
          @csrf
  				<h2 class="text-center">Please Sign In</h2>
  				<hr>
  				<div class="form-group">
            <input type="email" name="email" id="email" class="form-control" placeholder="Email Address">
  				</div>
  				<div class="form-group">
            <input type="password" name="password" id="password" class="form-control" placeholder="Password">
  				</div>
  				<span class="button-checkbox">
  					<button type="button" class="btn" data-color="info">Remember Me</button>
              <input type="checkbox" name="remember_me" id="remember_me" checked="checked" class="hidden">
            <div class="pull-right">
              <input type="submit" class="btn btn-success btn-block px-5" value="Sign In">
  					</div>
  				</span>
  				<hr>
  				<div class="row">
  					<div class="col-xs-12 col-sm-12 col-md-12">
  						<a href="{{ route('register') }}" class="btn btn-primary btn-block">Register</a>
  					</div>
  				</div>
  		</form>
  	</div>
  </div>
</div>

</body>
</html>
