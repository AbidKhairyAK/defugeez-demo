@extends('layouts.app')

@section('title', 'Bencana')

@section('content')
  <div class="container">

    @if(auth()->check())
    @if(auth()->user()->transfers()->count())
    <div class="centered mb-3 mt-4">
      <h3 class="text-center">- Donasi Anda -</h3>
    </div>

    <div class="bg-light rounded shadow p-3 mb-4">

      @foreach(auth()->user()->transfers()->get() as $transfer)
      <div class="row" style="position: relative;">
        <div class="col-md-3">
          <img src="/img/donation/{{ $transfer->donation->image }}" class="mb-2 w-100">
        </div>
        <div class="col-md-9">
          <h5 class="text-black w-75">{{ $transfer->donation->name }}</h5>
          <small class="mt-3">Jumlah Donasi:</small>
          <h3 class="text-black"><b>{{ $transfer->present()->amount_real }}</b></h3>

          @if($transfer->present()->curr_status['status'] == 'not')
            <small>Batas Transfer:</small><b> {{ $transfer->present()->due_date }}</b>
          @elseif($transfer->present()->curr_status['status'] == 'wait')
            <small>Silahkan tunggu, transfer anda sedang diperiksa</small>
          @elseif($transfer->present()->curr_status['status'] == 'approved')
            <small>transfer anda telah terbukti, silahkan klik tombol hapus untuk menghapus riwayat transfer</small>
          @endif

          @php
            $transfer_params = [$transfer->donation->slug, $transfer->slug];
          @endphp

          @if($transfer->present()->curr_status['status'] == 'not')
            <form action="{{ route('transfers.destroy', $transfer_params) }}" method="post" class="donation-button">
              @csrf @method('DELETE')
              <a href="{{ route('transfers.show', $transfer_params) }}" class="btn btn-sm btn-info mt-2">
                Detail Transfer
              </a>
              <a href="{{ route('proofs.create', $transfer_params) }}" class="btn btn-sm btn-success mt-2">
                Kirim Bukti Transfer
              </a>
              <button class="btn btn-sm btn-danger mt-2" onclick="return confirm('Apakah anda yakin?')">
                Batalkan Donasi
              </button>
            </form>
          @elseif($transfer->present()->curr_status['status'] == 'wait')
            <div>
              <a href="{{ route('transfers.show', $transfer_params) }}" class="btn btn-sm btn-info mt-2">Detail Transfer</a>
            </div>
          @elseif($transfer->present()->curr_status['status'] == 'approved')
            <form action="{{ route('transfers.delete', $transfer_params) }}" method="post" class="donation-button">
              @csrf @method('DELETE')
              <a href="{{ route('transfers.show', $transfer_params) }}" class="btn btn-sm btn-info mt-2">Detail Transfer</a>
              <button class="btn btn-sm btn-danger mt-2" data-toggle="tooltip" title="Hanya menghapus dari tampilan. Data transfer tetap tersimpan di sistem">Hapus Riwayat Donasi</button>
            </form>
          @endif

        </div>
        <span class="donation-status px-2 py-1 bg-{{ $transfer->present()->curr_status['color'] }} text-white"><small>Status: <b>{{ $transfer->present()->curr_status['text'] }}</b></small></span>
      </div>
      <hr>
      @endforeach

    </div>
    @endif
    @endif

    <div class="centered mb-3 mt-4">
      <h3 class="text-center">- Daftar Penggalangan Dana -</h3>
    </div>

    <div class="text-center">
      <a href="{{ route('donations.create') }}" class="btn btn-info mb-3 px-5 shadow-sm">Buat Pengalangan Dana</a>
    </div>

    <div class="owl-carousel owl-theme">
      @foreach($donations as $donation)
      <div class="item">
        <div class="card rounded overflow-hidden shadow">
          <div class="card-img-top" style="height: 150px; overflow: hidden;">
            <img class="owl-lazy" data-src="/img/donation/{{ $donation->image }}" style="width: 100%;">
          </div>
          <div class="card-body" style="min-height: 210px; display: flex; flex-direction: column; justify-content: space-between;">
            <div>
              <h6 class="card-title">{{ $donation->name }}</h6>
            </div>
            <div>
              <hr>
              <div class="progress" style="height: 20px;">
                <div class="progress-bar bg-info" style="height: 20px;width:{{ $donation->present()->percentage }}%"></div>
              </div>
              <div class="small">Terkumpul</div>
              <div>{{ $donation->present()->collected }}</div>
            </div>
          </div>
          <div class="bg-info text-center p-2">
            <a href="{{ route('donations.show', $donation->slug) }}" class="text-white h6">Info Lebih Lanjut</a>
          </div>
        </div>
      </div>
      @endforeach
    </div>

    <h5 class="text-right text-info mb-5"><a href="{{ route('donations.list') }}">Tampilkan lebih banyak &raquo;</a></h5>

    <div class="centered my-3">
      <h3 class="text-center">- Titik Bencana -</h3>
    </div>

    <div class="bg-light rounded shadow">
      <div id="mapid" style="height: 400px;"></div>
    </div>

    <div class="centered mb-3 mt-5">
      <h3 class="text-center">- Daftar Bencana -</h3>
    </div>

    @can('events.create')
    <div class="text-center">
      <a href="{{ route('events.create') }}" class="btn btn-info mb-3 px-5 shadow-sm">Tambah Bencana</a>
    </div>
    @endcan

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

              @can('events.update', $event)
              <a href="{{ route('events.edit', $event->slug) }}" class="dropdown-item">Edit</a>
              @endcan
              
              @can('events.delete', $event)
              <form action="{{ route('events.destroy', $event->slug) }}" method="post">
                @csrf @method("DELETE")
                <button class="dropdown-item btn" onclick="return confirm('Apakah anda yakin?')" type="submit">Delete</button>
              </form>
              @endcan

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
          <a href="{{ route('posts.index', $event->slug) }}" class="h6 text-white">Info Lebih Lanjut &raquo;</a>
        </div>
      </div>
      @endforeach

    </div>

    <h5 class="text-right text-info mb-5"><a href="{{ route('events.list') }}">Tampilkan lebih banyak &raquo;</a></h5>
  
  </div>

@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script src="/js/markers.js"></script>
<script type="text/javascript">

  $('.owl-carousel').owlCarousel({
      loop:true,
      margin:10,
      nav:true,
      lazyLoad:true,
      autoplay: true,
      autoplayHoverPause: true,
      autoplayTimeout: 3000,
      navText : ['<i class="fa fa-angle-left" aria-hidden="true"></i>','<i class="fa fa-angle-right" aria-hidden="true"></i>'],
      responsive:{
          0:{
              items:1
          },
          400:{
              items:2
          },
          600:{
              items:3
          },
          1000:{
              items:4
          }
      }
  });


  var mymap = L.map('mapid', {
      center: [-1.0878905, 117.7075195],
      zoom: 5,
      minZoom: 5,
      gestureHandling: true,
  });

  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
  }).addTo(mymap);

  var damage = '',
      icon = '',
      popupText = '';

  @foreach($event_markers as $event)
    damage = {{ $event->damage }}

    switch(damage){
      case 1: icon = redIcon; break;
      case 2: icon = yellowIcon; break;
      case 3: icon = blueIcon; break;
      case 4: icon = greenIcon; break;
    }

    popupText = '<div class="my-2"><span><i class="fa fa-fire"></i></span> {{ $event->name }}</div><div class="my-2"><span><i class="fa fa-map-marker"></i></span> {{ $event->regency->name }}</div><div class="my-2"><span><i class="fa fa-bolt"></i></span> {{ $event->damageName() }}</div><div class="my-2"><span><i class="fa fa-pie-chart"></i></span> {{ $event->refugees->count() }} pengungsi</div><div class="my-2 text-center"><a href="{{ route('posts.index', $event->slug) }}">info lebih lanjut &raquo;</a></div';

    L.marker(['{{ $event->latitude }}', '{{ $event->longitude }}'], {icon: icon}).addTo(mymap).bindPopup(popupText);
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

@section('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />
@endsection