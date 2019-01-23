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
      @can('posts.create')
      <a href="{{ route('posts.create') }}" class="btn btn-info mb-3 px-5 shadow-sm">Tambah Posko</a>
      @else
      <a href="{{ route('login') }}" class="btn btn-info mb-3 px-5 shadow-sm">Tambah Posko</a>
      @endcan
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

              @can('posts.update', $post)
              <a href="{{ route('posts.edit', $post->id) }}" class="dropdown-item">Edit</a>
              @endcan

              @can('posts.delete', $post)
              <form action="{{ route('posts.destroy', $post->id) }}" method="post">
                @csrf
                {{ method_field("DELETE") }}
                <button class="dropdown-item btn" type="submit">Delete</button>
              </form>
              @endcan

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
        <div class="bg-info text-center p-2">
          <a href="{{ route('refugees.page', $post->id) }}" class="text-white h6">Info Lebih Lanjut</a>
        </div>
      </div>
      @endforeach

    </div>
    
    <h5 class="text-right text-info"><a href="{{ route('posts.list', $event->id) }}">Tampilkan lebih banyak &raquo;</a></h5>

    <div class="centered my-3">
      <h3 class="text-center">Grafik Bencana</h3>
    </div>

    <div class="bg-light p-3 mb-4 shadow">
      <h5 class="text-center mb-3">&laquo; Pengungsi Yang Terdata &raquo;</h5>
      <div class="progress" style="height: 40px;">
        <div class="progress-bar bg-info" style="height: 40px;width:100%"><h6 class="m-0"><b>{{ $event->refugees->count() }} Jiwa / {{ $event->posts->count() }} Posko</b></h6></div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6">
        <div class="bg-light p-3 mb-4 shadow">
          <h5 class="text-center mb-3">&laquo; Berdasarkan Gender & Usia &raquo;</h5>
          <canvas id="gender" height="150"></canvas>
        </div>
      </div>
      <div class="col-md-6">
        <div class="bg-light p-3 mb-4 shadow">
          <h5 class="text-center mb-3">&laquo; Berdasarkan Kesehatan &raquo;</h5>
          <canvas id="health" height="150"></canvas>
        </div>
      </div>
    </div>

  </div>
@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
      var health = document.getElementById("health").getContext('2d');
      var healthChart = new Chart(health, {
          type: 'doughnut',
          data: {
              labels: ["Sehat", "Sakit Ringan", "Sakit Parah", "Meninggal"],
              datasets: [{
                  label: '# of Votes',
                  data: [
                    @foreach($healths as $health)
                      {{ $health->total }},
                    @endforeach
                  ],
                  backgroundColor: [
                      '#28a745',
                      '#ffc107',
                      '#dc3545',
                      '#6c757d'
                  ]
              }]
          },
          options: {
            legend: {
              position: 'right',
            },
            layout: {
              padding: {
                right: 30,
              }
            }
          }
      });

      var gender = document.getElementById("gender").getContext('2d');
      var genderChart = new Chart(gender, {
          type: 'pie',
          data: {
              labels: ["Pria Dewasa", "Wanita", "Anak-anak"],
              datasets: [{
                  label: '# of Votes',
                  data: [
                    @foreach($agesCount as $age)
                      {{ $age }},
                    @endforeach
                  ],
                  backgroundColor: [
                      '#28a745',
                      '#007bff',
                      '#ffc107',
                  ]
              }]
          },
          options: {
            legend: {
              position: 'right',
            },
            layout: {
              padding: {
                right: 30,
              }
            }
          }
      });
  });

  var mymap = L.map('mapid', {
      center: [{{ $event->latitude }}, {{ $event->longitude }}],
      zoom: 11,
      minZoom: 5,
      gestureHandling: true,
  }),
  popupText = '';

  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
  }).addTo(mymap);

  @foreach($post_markers as $post)
    popupText = '<div class="my-2"><span><i class="fa fa-fire"></i></span> {{ $post->name }}</div><div class="my-2"><span><i class="fa fa-map-marker"></i></span> {{ $post->village->name }}</div><div class="my-2"><span><i class="fa fa-pie-chart"></i></span> {{ $post->refugees->count() }} pengungsi</div><div class="my-2 text-center"><a href="{{ route('refugees.page', $post->id) }}">info lebih lanjut &raquo;</a></div';

    L.marker(['{{ $post->latitude }}', '{{ $post->longitude }}']).addTo(mymap).bindPopup(popupText);
  @endforeach

</script>
@endsection