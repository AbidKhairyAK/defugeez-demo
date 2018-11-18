@extends('app.layouts.app')

@section('title', 'Bencana')

@section('style')
<!-- Leaflet -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.4/dist/leaflet.css"
 integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA=="
 crossorigin=""/>
<style type="text/css">
	#list .section-wrapper {
    background: white;
    transition: all 0.5s ease;
  }
  #list .section-wrapper:hover {
    transform: scale(1.05,1.05);
  }
</style>
@endsection

@section('content')
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


  <div id="list" class="section">

		<div class="section-separator">
			<hr class="hr-thick">
			<hr class="hr-thin">
			<h3>Daftar Bencana</h3>
		</div>

    <div class="row">

      <div class="col-md-6">
        <div class="section-wrapper col-sm-12 mb-4 shadow rounded">
          <h5 class="section-title"><b>Gempa Bumi Maguwoharjo</b></h5>
          <div class="section-content clearfix">
            <p>Kab. Maguwoharjo, Jawa Utara</p>
            <div class="float-left">
              <p class="mb-auto">Jumlah Pengungsi</p>
              <h5><b class="text-info">300</b> jiwa</h5>
            </div>
            <div class="float-right mt-4">
              <p class="btn btn-danger btn-sm mb-0">Tingkat: <b>Sangat Parah</b></p>
              <p class="btn btn-info btn-sm mb-0">Status: <b>Aktif</b></p>
            </div>
          </div>
          <a href="{{ url('/posts') }}" class="section-more bg-primary">Info Lebih Lanjut</a>
        </div>
      </div>

      <div class="col-md-6">
        <div class="section-wrapper col-sm-12 mb-4 shadow rounded">
          <h5 class="section-title"><b>Gempa Bumi Maguwoharjo</b></h5>
          <div class="section-content clearfix">
            <p>Kab. Maguwoharjo, Jawa Utara</p>
            <div class="float-left">
              <p class="mb-auto">Jumlah Pengungsi</p>
              <h5><b class="text-info">300</b> jiwa</h5>
            </div>
            <div class="float-right mt-4">
              <p class="btn btn-danger btn-sm mb-0">Tingkat: <b>Sangat Parah</b></p>
              <p class="btn btn-warning btn-sm mb-0">Status: <b>Nonaktif</b></p>
            </div>
          </div>
          <a href="{{ url('/posts') }}" class="section-more bg-primary">Info Lebih Lanjut</a>
        </div>
      </div>

      <div class="col-md-6">
        <div class="section-wrapper col-sm-12 mb-4 shadow rounded">
          <h5 class="section-title"><b>Gempa Bumi Maguwoharjo</b></h5>
          <div class="section-content clearfix">
            <p>Kab. Maguwoharjo, Jawa Utara</p>
            <div class="float-left">
              <p class="mb-auto">Jumlah Pengungsi</p>
              <h5><b class="text-info">500</b> jiwa</h5>
            </div>
            <div class="float-right mt-4">
              <p class="btn btn-secondary btn-sm mb-0">Tingkat: <b>Sedang</b></p>
              <p class="btn btn-info btn-sm mb-0">Status: <b>Aktif</b></p>
            </div>
          </div>
          <a href="{{ url('/posts') }}" class="section-more bg-primary">Info Lebih Lanjut</a>
        </div>
      </div>

      <div class="col-md-6">
        <div class="section-wrapper col-sm-12 mb-4 shadow rounded">
          <h5 class="section-title"><b>Gempa Bumi Maguwoharjo</b></h5>
          <div class="section-content clearfix">
            <p>Kab. Maguwoharjo, Jawa Utara</p>
            <div class="float-left">
              <p class="mb-auto">Jumlah Pengungsi</p>
              <h5><b class="text-info">300</b> jiwa</h5>
            </div>
            <div class="float-right mt-4">
              <p class="btn btn-warning btn-sm mb-0">Tingkat: <b>Parah</b></p>
              <p class="btn btn-info btn-sm mb-0">Status: <b>Aktif</b></p>
            </div>
          </div>
          <a href="{{ url('/posts') }}" class="section-more bg-primary">Info Lebih Lanjut</a>
        </div>
      </div>

      <div class="col-md-6">
        <div class="section-wrapper col-sm-12 mb-4 shadow rounded">
          <h5 class="section-title"><b>Gempa Bumi Maguwoharjo</b></h5>
          <div class="section-content clearfix">
            <p>Kab. Maguwoharjo, Jawa Utara</p>
            <div class="float-left">
              <p class="mb-auto">Jumlah Pengungsi</p>
              <h5><b class="text-info">300</b> jiwa</h5>
            </div>
            <div class="float-right mt-4">
              <p class="btn btn-danger btn-sm mb-0">Tingkat: <b>Sangat Parah</b></p>
              <p class="btn btn-info btn-sm mb-0">Status: <b>Aktif</b></p>
            </div>
          </div>
          <a href="{{ url('/posts') }}" class="section-more bg-primary">Info Lebih Lanjut</a>
        </div>
      </div>

      <div class="col-md-6">
        <div class="section-wrapper col-sm-12 mb-4 shadow rounded">
          <h5 class="section-title"><b>Gempa Bumi Maguwoharjo</b></h5>
          <div class="section-content clearfix">
            <p>Kab. Maguwoharjo, Jawa Utara</p>
            <div class="float-left">
              <p class="mb-auto">Jumlah Pengungsi</p>
              <h5><b class="text-info">300</b> jiwa</h5>
            </div>
            <div class="float-right mt-4">
              <p class="btn btn-danger btn-sm mb-0">Tingkat: <b>Sangat Parah</b></p>
              <p class="btn btn-info btn-sm mb-0">Status: <b>Aktif</b></p>
            </div>
          </div>
          <a href="{{ url('/posts') }}" class="section-more bg-primary">Info Lebih Lanjut</a>
        </div>
      </div>

    </div>

	</div>

</div>
@endsection

@section('script')
<!-- Leaflet -->
<script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js"
 integrity="sha512-nMMmRyTVoLYqjP9hrbed9S+FzjZHW5gY1TWCHA5ckwXZBadntCNs8kEqAWdrb9O7rxbCaA4lKTIWjDXZxflOcA=="
 crossorigin=""></script>
<!-- Leaflet Provider -->
<script src="/js/leaflet-provider.js"></script>
<script type="text/javascript">
	var mymap = L.map('map').setView([-1.502592, 116.822409], 5);

	var map =  L.tileLayer('https://{s}.tile.openstreetmap.de/tiles/osmde/{z}/{x}/{y}.png', {
		maxZoom: 18,
		attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
	});

		L.marker([-1.090675, 118.873786]).addTo(mymap)
			.bindPopup("<b>TSUNAMI ACEH</b><br />Posko 120").openPopup();

		L.marker([-1.090675, 114.873782]).addTo(mymap)
			.bindPopup("<b>GEMPA BANTUL</b><br />Posko 2.").openPopup();

		L.marker([-7.090675, 119.873782]).addTo(mymap)
			.bindPopup("<b>GEMPA DODIL</b><br />Posko 2.").openPopup();

	map.addTo(mymap);
</script>
@endsection