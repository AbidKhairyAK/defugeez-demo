@extends('layouts.app')

@section('title', 'Bencana')

@section('content')
  <div class="container">

    <div class="centered my-3">
      <h3 class="text-center">Titik Bencana</h3>
    </div>

    <div class="bg-light rounded shadow">
      <div id="mapid" style="height: 400px;"></div>
    </div>

    <div class="centered mb-3 mt-5">
      <h3 class="text-center">Daftar Bencana</h3>
    </div>

    <div class="text-center">
      <a href="{{ route('events.create') }}" class="btn btn-info mb-3 px-5 shadow-sm">Tambah Bencana</a>
    </div>

    <div class="row">

      @foreach($events as $event)
      <div class="col-md-6 mb-4">
        <div class="rounded shadow p-3 bg-light col-sm-12">

          <div class="btn-group dropleft option">
            <button class="btn bg-light" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-ellipsis-v"></i>
            </button>
            <div class="dropdown-menu shadow" aria-labelledby="dropdownMenu2">
              <a href="#" class="dropdown-item">Laporkan</a>
              <a href="{{ route('events.edit', $event->id) }}" class="dropdown-item">Edit</a>
              <form action="{{ route('events.destroy', $event->id) }}" method="post">
                @csrf
                {{ method_field("DELETE") }}
                <button class="dropdown-item btn" type="submit">Delete</button>
              </form>
            </div>
          </div>

          <h5 class="section-title border-bottom pb-1"><b>{{ $event->name }}</b></h5>
          <div class="clearfix">
            <p>{{ $event->regency->name }}, {{ $event->province->name }}</p>
            <div class="float-left">
              <p class="mb-auto">Jumlah Pengungsi</p>
              <h5><b class="text-info">{{ $event->refugees->count() }}</b> jiwa</h5>
            </div>
            <div class="float-right mt-4">
              <p class="btn btn-{{ $event->damageColor() }} btn-sm mb-0">Tingkat: <b>{{ $event->damageName() }}</b></p>
              <p class="btn btn-{{ $event->statusColor() }} btn-sm mb-0">Status: <b>{{ $event->statusName() }}</b></p>
            </div>
          </div>
        </div>
        <div class="bg-info text-center p-2">
          <a href="{{ route('posts.page', $event->id) }}" class="text-white h6">Info Lebih Lanjut</a>
        </div>
      </div>
      @endforeach

    </div>

    <h5 class="text-right mb-5"><a href="{{ route('events.list') }}">Tampilkan lebih banyak &raquo;</a></h5>

    {{-- <div class="centered mb-3 mt-4">
      <h3 class="text-center">Donasi</h3>
    </div>

    <div class="row mb-5">
      <div class="col-md-4">
        <div class="card rounded overflow-hidden shadow">
            <div class="card-img-top">
              <img src="https://ichef.bbci.co.uk/news/976/cpsprodpb/4633/production/_103917971_rumahsementarapalu.jpg" style="width: 100%;">
            </div>
          <div class="card-body">
            <h4 class="card-title">Pembangunan Sekolah untuk Palu</h4>
            <hr>
            <div class="progress" style="height: 20px;">
              <div class="progress-bar" style="height: 20px;width:48%"></div>
            </div>
            <div class="small">Terkumpul</div>
            <div>Rp. 21.590.834</div>
          </div>
          <div class="bg-info text-center p-2">
            <a href="{{ route('donations') }}" class="text-white h6">Info Lebih Lanjut</a>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card rounded overflow-hidden shadow">
            <div class="card-img-top">
              <img src="https://ichef.bbci.co.uk/news/976/cpsprodpb/006F/production/_103911100_masjiddantukang.jpg" style="width: 100%;">
            </div>
          <div class="card-body">
            <h4 class="card-title">Bangun Masjid Rusak di Palu karena Gempa</h4>
            <hr>
            <div class="progress" style="height: 20px;">
              <div class="progress-bar" style="height: 20px;width:60%"></div>
            </div>
            <div class="small">Terkumpul</div>
            <div>Rp. 8.750.322</div>
          </div>
          <div class="bg-info text-center p-2">
            <a href="{{ route('donations') }}" class="text-white h6">Info Lebih Lanjut</a>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card rounded overflow-hidden shadow">
            <div class="card-img-top">
              <img src="https://statik.tempo.co/data/2018/10/17/id_743039/743039_720.jpg" style="width: 100%;">
            </div>
          <div class="card-body">
            <h4 class="card-title">Donasi Korban Gempa Palu & Donggala</h4>
            <hr>
            <div class="progress" style="height: 20px;">
              <div class="progress-bar" style="height: 20px;width:60%"></div>
            </div>
            <div class="small">Terkumpul</div>
            <div>Rp. 87.983.992 </div>
          </div>
          <div class="bg-info text-center p-2">
            <a href="{{ route('donations') }}" class="text-white h6">Info Lebih Lanjut</a>
          </div>
        </div>
      </div>
    </div> --}}
  
  </div>


@endsection

@section('script')
<script type="text/javascript">
  var mymap = L.map('mapid', {
      center: [-1.0878905, 117.7075195],
      zoom: 5,
      minZoom: 5,
      gestureHandling: true,
  });

  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
  }).addTo(mymap);

  @foreach($event_markers as $event)
    L.marker(['{{ $event->latitude }}', '{{ $event->longitude }}']).addTo(mymap).bindPopup('<a href="{{ route('posts.page', $event->id) }}">{{ $event->name }}</a>');
  @endforeach

  // var marker = {};

  // mymap.on('click', function(e){
  //   var lat = e.latlng.lat;
  //   var lng = e.latlng.lng;

  //   if (marker) {
  //     mymap.removeLayer(marker);
  //   }

  //   marker = L.marker([lat, lng])
  //   .addTo(mymap)
  //     .bindPopup(lat+', '+lng)
  //     .openPopup();
  // });
</script>
@endsection