<!DOCTYPE html>
<html>
	<head>
		<title>{{ env('APP_PREFIX').env('APP_NAME') }} | @yield('title')</title>
	</head>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/fontawesome.css" integrity="sha384-u5J7JghGz0qUrmEsWzBQkfvc8nK3fUT7DCaQzNQ+q4oEXhGSx+P2OqjWsfIRB8QT" crossorigin="anonymous"> -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Raleway:200,400,400i,700" rel="stylesheet">
	<!-- Leaflet -->
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.4/dist/leaflet.css"
   integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA=="
   crossorigin=""/>
	<!-- Layout CSS -->
	<link rel="stylesheet" type="text/css" href="/css/style.css">
<body>

	<nav class="navbar navbar-expand-lg navbar-dark bg-primary py-3 fixed-top shadow">
		<div class="container">

			<a class="navbar-brand" href="#"><i>{{ env('APP_PREFIX') }}</i><b>{{ env('APP_NAME') }}</b></a>

		  <!-- Toggler/collapsibe Button -->
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav-links">
		    <span class="fa fa-bars"></span>
		  </button>

		  <div class="collapse navbar-collapse justify-content-end pt-3" id="nav-links">
			  <ul class="navbar-nav">
			    <li class="nav-item">
			      <a class="nav-link text-white pr-3" href="#"><i class="fa fa-home"></i> <b>Beranda</b></a>
			    </li>
			    <hr>
			    <li class="nav-item">
			      <a class="nav-link text-white pr-3" href="#"><i class="fa fa-plus-circle"></i> <b>Tambah</b></a>
			    </li>
			   	<hr>
			    <li class="nav-item">
			      <a class="nav-link text-white pr-3" href="#"><i class="fa fa-sign-in"></i> <b>Login</b></a>
			    </li>
			   	<hr>
			    <li class="nav-item">
			      <a class="nav-link bg-light rounded text-primary" href="#"><i class="fa fa-user-plus"></i> <b>Register</b></a>
			    </li>
			   	<hr>
			    <li class="nav-item">
			      <a class="nav-link text-white" href="#"><i class="fa fa-sign-out"></i> <b>Logout</b></a>
			    </li>
		    	<hr>
			  </ul>
		  </div>

		</div>
	</nav>


	<div class="container">

		<div class="section">
			<div class="section-separator">
				<hr class="hr-thick">
				<hr class="hr-thin">
				<h3>Peta Bencana</h3>
			</div>

			<div id="map-wrapper" class="section-wrapper col-sm-12 rounded bg-light shadow">
				<div id="map"></div>
			</div>
		</div>

		<div class="section">
			
			<div class="section-separator">
				<hr class="hr-thick">
				<hr class="hr-thin">
				<h3>Daftar Bencana</h3>
			</div>

			<div class="section-wrapper col-sm-12 py-4 rounded bg-light shadow">

				<div class="card my-3">
					<div class="card-body pt-40">
						<div class="row">
							<div class="col-sm-8">
								<div class="h3 bold font-weight-bold"><a href="https://www.w3schools.com/bootstrap4/bootstrap_ref_all_classes.asp"> Museum Tsunami Aceh</a></div>
								<div class="h5">Sukaramai, Baiturrahman, Kota Banda Aceh, Aceh 23116</div>
								<div class="">status: level 2</div>
								<div>tingkat kerusakan: level 1</div>
							</div>
							<div class="col-sm-4">
								<div class="h6">jumlah pengungsi yang terdata</div>
								<div class="h1">230/300</div><div class="h5">orang</div>
							</div>
						</div>
					</div>
				</div>

				<div class="card my-3">
					<div class="card-body">
						<div class="row">
							<div class="col-sm-8">
								<div class="h3 bold font-weight-bold">Museum Tsunami Aceh</div>
								<div class="h5">Sukaramai, Baiturrahman, Kota Banda Aceh, Aceh 23116</div>
								<div class="">status: level 2</div>
								<div>tingkat kerusakan: level 1</div>
							</div>
							<div class="col-sm-4">
								<div class="h6">jumlah pengungsi yang terdata</div>
								<div class="h1">230/300</div><div class="h5">orang</div>
							</div>
						</div>
					</div>
				</div>

				<div class="card my-3">
					<div class="card-body">
						<div class="row">
							<div class="col-sm-8">
								<div class="h3 bold font-weight-bold">Museum Tsunami Aceh</div>
								<div class="h5">Sukaramai, Baiturrahman, Kota Banda Aceh, Aceh 23116</div>
								<div class="">status: level 2</div>
								<div>tingkat kerusakan: level 1</div>
							</div>
							<div class="col-sm-4">
								<div class="h6">jumlah pengungsi yang terdata</div>
								<div class="h1">230/300</div><div class="h5">orang</div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

	<nav id="footer" class="navbar navbar-expand bg-dark">
		<div class="container">
		  <ul class="navbar-nav mr-auto">
		    <li class="nav-item">
		      <a class="nav-link text-white" href="#">&copy; Copyright DE.inc. All right reserved.</a>
		    </li>
		  </ul>
		  <ul class="navbar-nav">
		    <li class="nav-item">
		      <a class="nav-link text-white" href="#"><i class="fa fa-github"></i></a>
		    </li>
		    <li class="nav-item">
		      <a class="nav-link text-white" href="#"><i class="fa fa-facebook"></i></a>
		    </li>
		    <li class="nav-item">
		      <a class="nav-link text-white" href="#"><i class="fa fa-instagram"></i></a>
		    </li>
		    <li class="nav-item">
		      <a class="nav-link text-white" href="#"><i class="fa fa-google-plus"></i></a>
		    </li>
		  </ul>
		</div>
	</nav>

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	<!-- Leaflet -->
	<script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js"
   integrity="sha512-nMMmRyTVoLYqjP9hrbed9S+FzjZHW5gY1TWCHA5ckwXZBadntCNs8kEqAWdrb9O7rxbCaA4lKTIWjDXZxflOcA=="
   crossorigin=""></script>
  	<!-- Leaflet Provider -->
  	<script src="/js/leaflet-provider.js"></script>
	<!-- Layout Script -->
	<script src="/js/script.js"></script>
</body>
</html>