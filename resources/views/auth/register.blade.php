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

	@if ($errors->any())
	    <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	@endif
  <div class="row justify-content-center">
      <div class=" col-md-6 col-sm-offset-2 col-md-offset-3 bg-light shadow rounded p-4">
  		<form role="form" action="{{ route('register') }}" method="post"> 
  				@csrf
  				<h2 class="text-center">Please Register</h2>
  				<hr>
  				<div class="form-group">
            <input type="text" name="name" id="full_name" class="form-control" placeholder="Full Name">
  				</div>
  				<div class="form-group">
            <input type="email" name="email" id="email" class="form-control" placeholder="Email Address">
  				</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<input type="password" name="password" id="password" class="form-control" placeholder="Password">
							</div>
						</div>
						<div class="col-md-6">
						<div class="form-group">
							<input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Re-type Password">
						</div>
					</div>
					</div>
					<div class="form-group">
            <input type="text" name="address" id="address" class="form-control" placeholder="Address">
  				</div>
					<div class="row">
            <div class="col-md-3">
                <div class="form-group">
									<select class="form-control" name="province_id" id="province">
										<option value="11">Province 1</option>
								    <option value="11">Province 2</option>
								    <option value="11">Province 3</option>
								    <option value="11">Province 4</option>
									</select>
                </div>
            </div>

						<div class="col-md-3">
                <div class="form-group">
									<select class="form-control" name="regency_id" id="regency">
										<option value="1111">Regency 1</option>
								    <option value="1111">Regency 2</option>
								    <option value="1111">Regency 3</option>
								    <option value="1111">Regency 4</option>
									</select>
                </div>
            </div>

						<div class="col-md-3">
                <div class="form-group">
									<select class="form-control" name="district_id" id="district">
										<option value="1101010">District 1</option>
								    <option value="1101010">District 2</option>
								    <option value="1101010">District 3</option>
								    <option value="1101010">District 4</option>
									</select>
                </div>
            </div>

						<div class="col-md-3">
                <div class="form-group">
									<select class="form-control" name="village_id" id="village">
										<option value="1101010001">Village 1</option>
								    <option value="1101010001">Village 2</option>
								    <option value="1101010001">Village 3</option>
								    <option value="1101010001">Village 4</option>
									</select>
                </div>
            </div>
        </div>
				<div class="form-group">
					<input type="text" name="nik" id="nik" class="form-control" placeholder="NIK">
				</div>
				<div class="form-group">
					<input type="text" name="phone" id="phone" class="form-control" placeholder="Phone Number">
				</div>
  				<span class="button-checkbox">
            <div class="">
              <input type="submit" class="btn btn-success px-5 float-right" value="Register">
  						<a href="{{ route('login') }}" class="btn btn-link float-left">I have an account!</a>
  					</div>
  				</span>
  		</form>
  	</div>
  </div>
</div>

</body>
</html>
