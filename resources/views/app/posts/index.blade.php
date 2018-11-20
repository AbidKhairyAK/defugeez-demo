@extends('app.layouts.app')

@section('title', 'Posko')

@section('style')
<!-- Leaflet -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.4/dist/leaflet.css"
 integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA=="
 crossorigin=""/>
<link rel="stylesheet" href="//unpkg.com/leaflet-gesture-handling/dist/leaflet-gesture-handling.min.css" type="text/css">
@endsection

@section('content')
<div class="container">

  <div class="section">
    <div class="section-separator">
      <hr class="hr-thick">
      <hr class="hr-thin">
      <h3>Info Bencana</h3>
    </div>

    <div class="section-wrapper col-sm-12 rounded bg-light shadow">

      <div class="section-option dropdown mt-3 mr-1">
        <button type="button" class="btn btn-light" data-toggle="dropdown">
          <i class="fa fa-ellipsis-v"></i>
        </button>
        <div class="dropdown-menu dropdown-menu-right border-0 shadow">
          <a class="dropdown-item" href="{{ url('/test/laporan') }}">&rsaquo; Laporkan</a>
          <a class="dropdown-item" href="{{ url('/test/edit') }}">&rsaquo; Edit</a>
          <a class="dropdown-item" href="#">&rsaquo; Arsipkan</a>
          <a class="dropdown-item" href="#">&rsaquo; Hapus</a>
        </div>
      </div>

      <h4 class="section-title border-bottom-0 mt-3"><b>Gempa Bumi Kota Palu</b></h4>
      
      <div class="section-content">
        <div class="row">
          <div class="col-lg-6">
            <table class="table table-hover">
              <tr>
                <th width="150">Lokasi Bencana</th>
                <td class="text-right">Kota Palu, Sulawesi Tengah</td>
              </tr>
              <tr>
                <th>Jumlah Posko</th>
                <td class="text-right">10 Posko</td>
              </tr>
              <tr>
                <th>Status Bencana</th>
                <td class="text-right">Aktif</td>
              </tr>
            </table>
          </div>

          <div class="col-lg-6">
            <table class="table table-hover">
              <tr>
                <th>Tingkat Kerusakan</th>
                <td class="text-right">Sangat Parah</td>
              </tr>
              <tr>
                <th>Pembuat Data Bencana</th>
                <td class="text-right">Ahmad Iyad</td>
              </tr>
            </table>
          </div>

          <div class="col-lg-12">
            <table class="table table-hover">
              <tr>
                <th>Deskripsi</th>
              </tr>
              <tr>
                <td class="border-top-0">
                  <p>Donec tincidunt commodo tellus. Integer mollis nisi sit amet massa vulputate, nec euismod elit aliquet. Aliquam sit amet posuere turpis. Nam lobortis justo sed congue aliquet.</p>
                </td>
              </tr>
            </table>
          </div>
        </div>
      </div>

    </div>
  </div>

  <div class="section">
    <div class="section-separator">
      <div class="row">
        <a href="#" class="btn btn-warning col m-3 py-4 font-weight-bold display-1 shadow">
          Tambah Data Bencana
        </a>
        <a href="#" class="btn btn-info col m-3 py-4 font-weight-bold display-1 shadow">
          Tambah Data Posko
        </a>
        <a href="#" class="btn btn-light col m-3 py-4 font-weight-bold display-1 shadow">
          Tambah Data Pengungsi
        </a>
      </div>
    </div>
  </div>

  <div class="section">
		<div class="section-separator">
			<hr class="hr-thick">
			<hr class="hr-thin">
			<h3>Peta Lokasi Posko</h3>
		</div>

		<div id="map-wrapper" class="section-wrapper col-sm-12 rounded bg-light shadow">
			<div id="map"></div>
		</div>
	</div>

  <div id="list" class="section">

		<div class="section-separator">
			<hr class="hr-thick">
			<hr class="hr-thin">
			<h3>Daftar Posko</h3>
		</div>
    <div class="">
      <a href="{{ route('posts.create') }}" class="btn btn-info center">TAMBAH DATA</a>
    </div>
    <div class="row">
      @foreach($posts as $post)
        <div class="col-md-6">
          <div class="section-wrapper bg-light col-sm-12 mb-4 shadow rounded">

            <div class="section-option dropdown">
              <button type="button" class="btn btn-light" data-toggle="dropdown">
                <i class="fa fa-ellipsis-v"></i>
              </button>
              <div class="dropdown-menu dropdown-menu-right border-0 shadow">
                <a class="dropdown-item" href="{{ url('/test/laporan') }}">&rsaquo; Laporkan</a>
                <a class="dropdown-item" href="{{ route('posts.edit', $post->id) }}">&rsaquo; Edit</a>
                <a class="dropdown-item" href="#">&rsaquo; Hapus</a>
              </div>
            </div>

            <h5 class="section-title"><b>Posko {{ $post->name }}</b></h5>

            <div class="section-content clearfix">
              <p>{{ $post->address }}</p>
              <div class="float-left">
                <p class="mb-auto">Jumlah Pengungsi</p>
                <h5><b class="text-info">300</b> / {{ $post->capacity }} jiwa</h5>
              </div>
              <div class="float-right mt-4">
                <p class="btn btn-info btn-sm mb-0">Status: <b>{{ $post->status ? 'Aktif' : 'Tidak Aktif' }}</b></p>
              </div>
            </div>
            <a href="{{ route('posts.show', $post->id) }}" class="section-more bg-primary">Info Lebih Lanjut</a>
          </div>
        </div>
      @endforeach
    </div>

	</div>

  <div class="pagination-wrap">
    <ul class="pagination pagination-v2 text-center">
      <li><a href="#">«</a></li>
      <li><a href="#">1</a></li>
      <li><a class="active" href="#">2</a></li>
      <li><a href="#">3</a></li>
      <li><a href="#">4</a></li>
      <li><a href="#">»</a></li>
    </ul>
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
</script>
@endsection
