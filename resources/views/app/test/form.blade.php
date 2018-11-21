
@section('style')
<!-- Leaflet -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.4/dist/leaflet.css"
 integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA=="
 crossorigin=""/>
<link rel="stylesheet" href="//unpkg.com/leaflet-gesture-handling/dist/leaflet-gesture-handling.min.css" type="text/css">
@endsection

@php
	$error_email = [
		'invalid' => $errors->has('email') ? 'is-invalid' : '',
		'feedback' => $errors->has('email') ? '<div class="invalid-feedback">'.$errors->first('email').'</div>' : '',
	];

	$error_class = [
		'invalid' => $errors->has('class') ? 'is-invalid' : '',
		'feedback' => $errors->has('class') ? '<div class="invalid-feedback">'.$errors->first('class').'</div>' : '',
	];

	$error_status = [
		'invalid' => $errors->has('status') ? 'is-invalid' : '',
		'feedback' => $errors->has('status') ? '<div class="invalid-feedback">'.$errors->first('status').'</div>' : '',
	];

	$error_username = [
		'invalid' => $errors->has('username') ? 'is-invalid' : '',
		'feedback' => $errors->has('username') ? '<div class="invalid-feedback">'.$errors->first('username').'</div>' : '',
	];

	$error_password = [
		'invalid' => $errors->has('password') ? 'is-invalid' : '',
		'feedback' => $errors->has('password') ? '<div class="invalid-feedback">'.$errors->first('password').'</div>' : '',
	];

	$error_desc = [
		'invalid' => $errors->has('desc') ? 'is-invalid' : '',
		'feedback' => $errors->has('desc') ? '<div class="invalid-feedback">'.$errors->first('desc').'</div>' : '',
	];
@endphp

<div class="form-group">
	{!! Form::label('username', 'Username :', ['class' => 'label']) !!}
	{!! Form::text('username', null, ['class' => 'form-control '.$error_username['invalid'], 'id' => 'username', 'required']) !!}
	{!! $error_username['feedback'] !!}
</div>

<div class="form-group form-row">
	<div class="col">
		{!! Form::label('email', 'Email :', ['class' => 'label']) !!}
		{!! Form::email('email', null, ['class' => 'form-control '.$error_email['invalid'], 'id' => 'email', 'required']) !!}
		{!! $error_email['feedback'] !!}
	</div>
	<div class="col">
		{!! Form::label('password', 'Password :', ['class' => 'label']) !!}
		{!! Form::password('password', ['class' => 'form-control '.$error_password['invalid'], 'id' => 'password', 'required']) !!}
		{!! $error_password['feedback'] !!}
	</div>
</div>

<div class="form-group">
	{!! Form::label('class', 'Class :', ['class' => 'label']) !!}
	{!! Form::select('class', [
		'' => '', 
		'Hacker' => 'Hacker', 
		'Hipster' => 'Hipster', 
		'Hustler' => 'Hustler'
	], null, ['class' => 'form-control '.$error_class['invalid'], 'id' => 'class', 'required']) !!}
	{!! $error_class['feedback'] !!}
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
	{!! Form::label('desc', 'Description :', ['class' => 'label']) !!}
	<span class="small text-muted"> (optional)</span>
	{!! Form::textarea('desc', null, ['class' => 'form-control '.$error_desc['invalid'], 'id' => 'desc', 'rows' => '5', 'required']) !!}
	{!! $error_desc['feedback'] !!}
</div>

<div id="map-wrapper" class="section-wrapper col-sm-12 rounded bg-light shadow">
	<div id="map"></div>
</div>

<div class="form-group">
	{!! Form::label('lat', 'Latitude :', ['class' => 'label']) !!}
	<span class="small text-muted"> (optional)</span>
	{!! Form::text('lat', null, ['class' => 'form-control', 'id' => 'lat', 'rows' => '5', 'required']) !!}
</div>

<div class="form-group">
	{!! Form::label('lng', 'Longitude :', ['class' => 'label']) !!}
	<span class="small text-muted"> (optional)</span>
	{!! Form::text('lng', null, ['class' => 'form-control', 'id' => 'lng', 'rows' => '5', 'required']) !!}
</div>


<a href="#" class="btn btn-secondary px-5">Cancel</a>
<button type="submit" class="btn btn-primary px-5">Submit</button>

@section('script')
<!-- Leaflet -->
<script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js"
 integrity="sha512-nMMmRyTVoLYqjP9hrbed9S+FzjZHW5gY1TWCHA5ckwXZBadntCNs8kEqAWdrb9O7rxbCaA4lKTIWjDXZxflOcA=="
 crossorigin=""></script>
<!-- Leaflet Provider -->
<script src="/js/leaflet-provider.js"></script>
<script src="//unpkg.com/leaflet-gesture-handling"></script>
<script type="text/javascript">
  var mymap = L.map('map', {
    center: [-1.090675, 114.873782],
    zoom: 11,
    gestureHandling: true,
  });

  var map =  L.tileLayer('https://{s}.tile.openstreetmap.de/tiles/osmde/{z}/{x}/{y}.png', {
    maxZoom: 18,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
  });

    L.marker([-1.090675, 114.713782]).addTo(mymap)
      .bindPopup(`<b>Posko Krapyak</b><br/><a href="{{ url('/refugees') }}">Lebih Lengkap!</a>.`);

    L.marker([-1.010675, 114.953782]).addTo(mymap)
      .bindPopup(`<b>Posko Krapyak</b><br/><a href="{{ url('/refugees') }}">Lebih Lengkap!</a>.`);

    L.marker([-1.151675, 114.893782]).addTo(mymap)
      .bindPopup(`<b>Posko Krapyak</b><br/><a href="{{ url('/refugees') }}">Lebih Lengkap!</a>.`).openPopup();

  map.addTo(mymap);


  mymap.on('click', function(e){
    var lat = e.latlng.lat;
    var lng = e.latlng.lng;
    
    L.marker([lat, lng]).addTo(mymap)
      .bindPopup("<b>Bencana Baru</b>.").openPopup();

    $('#lat').val(lat);
    $('#lng').val(lng);
  });
</script>
@endsection
