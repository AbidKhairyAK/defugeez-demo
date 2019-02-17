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
	{{-- Select2 --}}
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
	<!-- Toastr CSS -->
	<link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
	<!-- Layout CSS -->
	<link rel="stylesheet" type="text/css" href="/css/style.css">
  @yield('style')
</head>
<body id="container">

<div class="container d-flex flex-column align-items-center">

	<div class="mb-2">
		<a class="bg-info text-white py-1 px-2 rounded" href="{{ url('/') }}"><i>{{ env('APP_PREFIX') }}</i><b>{{ env('APP_NAME') }}</b></a>
	</div>

  <h2 class="mb-4">@yield('title')</h2>
  
	<div class="col-md-5 mb-5 bg-light shadow rounded p-4">
	  @yield('content')
	</div>

</div>

{{-- Main Script --}}
<script src="/js/app.js"></script>
{{-- Number Text Formatting --}}
<script src="/js/textnumber.js"></script>
<!-- Toastr JS -->
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
{{-- select2 --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

@yield('script')

{!! Toastr::message() !!}

</body>
</html>
