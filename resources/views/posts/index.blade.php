@extends('layouts.app')

@section('title', 'Posko')

@section('content')
  <div class="container">

    <div class="centered my-3">
      <h3 class="text-center">Info Bencana</h3>
    </div>


    <div class="bg-light p-3 rounded shadow">

      <h4 class="border-bottom-0 mb-3"><b>{{ $event->name }}</b></h4>

      <div class="row">
          <div class="col-lg-6">
            <table class="table table-hover">
              <tr>
                <th width="150">Lokasi Bencana</th>
                <td class="text-right">{{ $event->regency->name }}, {{ $event->province->name }}</td>
              </tr>
              <tr>
                <th>Jumlah Posko</th>
                <td class="text-right">{{ $event->posts->count() }}</td>
              </tr>
              <tr>
                <th>Status Bencana</th>
                <td class="text-right">{{ $event->statusName() }}</td>
              </tr>
            </table>
          </div>

          <div class="col-lg-6">
            <table class="table table-hover">
              <tr>
                <th>Tingkat Kerusakan</th>
                <td class="text-right">{{ $event->damageName() }}</td>
              </tr>
              <tr>
                <th>Pembuat Data Bencana</th>
                <td class="text-right">{{ $event->user->name }}</td>
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
                  <p>{{ $event->description ?: '-' }}</p>
                </td>
              </tr>
            </table>
          </div>
        </div>
    </div>

    <div class="centered  mb-3 mt-5">
      <h3 class="text-center">Titik Posko</h3>
    </div>

    <div class="bg-light rounded shadow">
      <div id="mapid" style="height: 400px;"></div>
    </div>

    <div class="centered mb-3 mt-5">
      <h3 class="text-center">Posko</h3>
    </div>

    <div class="text-center">
      <a href="{{ route('posts.create') }}" class="btn btn-primary mb-3 px-5 shadow-sm">Tambah Posko</a>
    </div>

    <div class="row">

      @foreach($posts as $post)
      <div class="col-md-6 mb-4">
        <div class="rounded shadow p-3 bg-light col-sm-12">

          <div class="btn-group dropleft option">
            <button class="btn bg-light" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-ellipsis-v"></i>
            </button>
            <div class="dropdown-menu shadow" aria-labelledby="dropdownMenu2">
              <a href="#" class="dropdown-item">Laporkan</a>
              <a href="{{ route('posts.edit', $post->id) }}" class="dropdown-item">Edit</a>
              <form action="{{ route('posts.destroy', $post->id) }}" method="post">
                @csrf
                {{ method_field("DELETE") }}
                <button class="dropdown-item btn" type="submit">Delete</button>
              </form>
            </div>
          </div>

          <h5 class="section-title border-bottom pb-1"><b>{{ $post->name }}</b></h5>
          <div class="clearfix">
            <p>{{ $post->district->name }}, {{ $post->village->name }}</p>
            <div class="float-left">
              <p class="mb-auto">Jumlah Pengungsi</p>
              <h5><b class="text-info">{{ $post->refugees->count() }}</b> jiwa / <b class="text-secondary">{{ $post->capacity }}</b> kuota</b></h5>
            </div>
            <div class="float-right mt-4">
              <p class="btn btn-{{ $post->statusColor() }} btn-sm mb-0">Status: <b>{{ $post->statusName() }}</b></p>
            </div>
          </div>
        </div>
        <div class="bg-primary text-center p-2">
          <a href="{{ route('refugees.page', $post->id) }}" class="text-white h6">Info Lebih Lanjut</a>
        </div>
      </div>
      @endforeach
    </div>

  </div>
@endsection

@section('script')
<script type="text/javascript">
  var mymap = L.map('mapid', {
      center: [-1.0878905, 119.7075195],
      zoom: 13,
      minZoom: 10,
      gestureHandling: true,
  });

  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
  }).addTo(mymap);

  L.marker([-1.0868905, 119.7075195]).addTo(mymap).bindPopup('hehe');
  L.marker([-1.0828905, 119.7015195]).addTo(mymap).bindPopup('hehe');
  L.marker([-1.0808905, 119.7205195]).addTo(mymap).bindPopup('hehe');
  L.marker([-1.0808905, 119.7275195]).addTo(mymap).bindPopup('hehe');
  L.marker([-1.0908905, 119.6875195]).addTo(mymap).bindPopup('hehe');

</script>
@endsection