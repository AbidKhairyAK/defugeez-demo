@extends('layouts.app')

@section('title', 'Refugees')

@section('style')
<style type="text/css">
  #demands tbody td:first-child {
    padding-left: 0;
    padding-right: 0;
  }
</style>
@endsection

@section('content')
  <div class="container">

  <ul class="nav nav-pills justify-content-center py-3">
	  <li clas>
	    <a class="border border-primary border-right-0 rounded-0 px-5 shadow nav-link  {{ session('refugees_tab') ? '' : 'active' }}" data-toggle="pill" href="#info">Informasi</a>
	  </li>
	  <li clas>
	    <a class="border border-primary border-right-0 rounded-0 px-5 shadow nav-link {{ session('refugees_tab') == 'summary' ? 'active' : '' }}" data-toggle="pill" href="#summary">Ringkasan</a>
	  </li>
	  <li clas>
	    <a class="border border-primary border-right-0 rounded-0 px-5 shadow nav-link {{ session('refugees_tab') == 'demands' ? 'active' : '' }}" data-toggle="pill" href="#demands">Kebutuhan</a>
	  </li>
	  <li clas>
	    <a class="border border-primary rounded-0 px-5 shadow nav-link  {{ session('refugees_tab') == 'refugees' ? 'active' : '' }}" data-toggle="pill" href="#refugees">Pengungsi</a>
	  </li>
	</ul>

  <div class="tab-content">
    
    @include('refugees.tab_info')
    @include('refugees.tab_summary')
    @include('refugees.tab_demands')
    @include('refugees.tab_refugees')

  </div>

  </div>
@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
<script type="text/javascript">
  var mymap = L.map('mapid', {
      center: [{{ $post->latitude }}, {{ $post->longitude }}],
      zoom: 11,
      minZoom: 5,
      gestureHandling: true,
  });

  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
  }).addTo(mymap);

  L.marker(['{{ $post->latitude }}', '{{ $post->longitude }}']).addTo(mymap);

  $('.locate').click(function(){
    mymap.locate({setView: true, maxZoom: 16});
  });

  function onLocationFound(e) {
      var radius = e.accuracy / 2;

      L.marker(e.latlng).addTo(mymap)
          .bindPopup("You are within " + radius + " meters from this point").openPopup();

      L.circle(e.latlng, radius).addTo(mymap);
  }

  mymap.on('locationfound', onLocationFound);

  function onLocationError(e) {
      alert(e.message);
  }

  mymap.on('locationerror', onLocationError);

  $(document).ready(function() {

    $('#example').DataTable();

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
</script>
@endsection
