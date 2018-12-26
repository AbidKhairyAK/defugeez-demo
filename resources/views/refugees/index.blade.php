@extends('layouts.app')

@section('title', 'Refugees')

@section('content')
  <div class="container">

  <ul class="nav nav-pills justify-content-center py-3">
	  <li clas>
	    <a class="border border-primary border-right-0 rounded-0 px-5 shadow nav-link  {{ session('refugees_tab') ? '' : 'active' }}" data-toggle="pill" href="#info">Informasi</a>
	  </li>
	  <li clas>
	    <a class="border border-primary border-right-0 rounded-0 px-5 shadow nav-link" data-toggle="pill" href="#summary">Ringkasan</a>
	  </li>
	  <li clas>
	    <a class="border border-primary border-right-0 rounded-0 px-5 shadow nav-link" data-toggle="pill" href="#demands">Kebutuhan</a>
	  </li>
	  <li clas>
	    <a class="border border-primary rounded-0 px-5 shadow nav-link  {{ session('refugees_tab') ? 'active' : '' }}" data-toggle="pill" href="#refugees">Pengungsi</a>
	  </li>
	</ul>

  <div class="tab-content">
    <div id="info" class="tab-pane {{ session('refugees_tab') ? 'fade' : 'active' }}">

      <div class="centered my-3">
        <h3 class="text-center">Info Posko</h3>
      </div>

      <div class="bg-light p-3 rounded shadow">

      <h4 class="border-bottom-0 mb-3"><b>{{ $post->name }}</b></h4>

        <div class="row">
            <div class="col-lg-6">
              <table class="table table-hover">
                <tr>
                  <th>Alamat</th>
                  <td class="text-right">{{ $post->address }}, {{ $post->village->name }}, {{ $post->district->name }}, {{ $post->regency->name }}</td>
                </tr>
                <tr>
                  <th>Kapasitas</th>
                  <td class="text-right">{{ $post->capacity }} Jiwa</td>
                </tr>
                <tr>
                  <th>Jumlah Barak</th>
                  <td class="text-right">{{ $post->barracks }}</td>
                </tr>
              </table>
            </div>

            <div class="col-lg-6">
              <table class="table table-hover">
                <tr>
                  <th>Penanggung Jawab Posko</th>
                  <td class="text-right">{{ $post->pic }}</td>
                </tr>
                <tr>
                  <th>Pembuat Data Posko</th>
                  <td class="text-right">{{ $post->user->name }}</td>
                </tr>
                <tr>
                  <th>Status</th>
                  <td class="text-right">{{ $post->statusName() }}</td>
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
                    <p>{{ $post->description ?: '-' }}</p>
                  </td>
                </tr>
              </table>
            </div>
          </div>
      </div>
    </div>

    <div id="summary" class="tab-pane fade">
      <div class="centered my-3">
        <h3 class="text-center">Ringkasan Data Posko</h3>
      </div>

      <div class="bg-light p-3 mb-4 shadow">
        <h5 class="text-center mb-3">&laquo; Berdasarkan Kapasitas &raquo;</h5>
        <div class="progress" style="height: 40px;">
          <div class="progress-bar" style="height: 40px;width:60%"><h6 class="m-0"><b>120 / 200</b></h6></div>
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

    <div id="demands" class="tab-pane fade">
      <div class="centered my-3">
        <h3 class="text-center">Kebutuhan Posko</h3>
      </div>

      <div class="text-center">
        <a href="#" class="btn btn-primary mb-3 px-5 shadow-sm">Tambah Kebutuhan</a>
      </div>

      <div class="row">

        <div class="col-md-6 mb-4">
          <div class="rounded shadow p-3 bg-light col-sm-12">

            <h5 class="section-title border-bottom pb-1"><b>Makanan</b></h5>
            <ul class="pl-4">
                <li class="#"> Makanan 1 </li>
                <li class="#"> Makanan 2  </li>
                <li class="#"> Makanan 3 </li>
                <li class="#"> Makanan 4 </li>
            </ul>
          </div>
        </div>

        <div class="col-md-6 mb-4">
          <div class="rounded shadow p-3 bg-light col-sm-12">

            <h5 class="section-title border-bottom pb-1"><b>Pakaian</b></h5>
            <ul class="pl-4">
                <li class="#"> Pakaian 1 </li>
                <li class="#"> Pakaian 2  </li>
                <li class="#"> Pakaian 3 </li>
                <li class="#"> Pakaian 4 </li>
            </ul>
          </div>
        </div>

        <div class="col-md-6 mb-4">
          <div class="rounded shadow p-3 bg-light col-sm-12">

            <h5 class="section-title border-bottom pb-1"><b>Obat-obatan</b></h5>
            <ul class="pl-4">
                <li class="#"> Obat-obatan 1 </li>
                <li class="#"> Obat-obatan 2  </li>
                <li class="#"> Obat-obatan 3 </li>
                <li class="#"> Obat-obatan 4 </li>
            </ul>
          </div>
        </div>

        <div class="col-md-6 mb-4">
          <div class="rounded shadow p-3 bg-light col-sm-12">

            <h5 class="section-title border-bottom pb-1"><b>Lain-lain</b></h5>
            <ul class="pl-4">
                <li class="#"> Lain-lain 1 </li>
                <li class="#"> Lain-lain 2  </li>
                <li class="#"> Lain-lain 3 </li>
                <li class="#"> Lain-lain 4 </li>
            </ul>
          </div>
        </div>

      </div>
    </div>

    <div id="refugees" class="tab-pane  {{ session('refugees_tab') == 'refugees' ? 'active' : 'fade' }}">

      <div class="centered my-3">
        <h3 class="text-center">Data Pengungsi</h3>
      </div>

      
      <div class="text-center">
        <a href="{{ route('refugees.create') }}" class="btn btn-primary mb-3 px-5 shadow-sm">Tambah Pengungsi</a>
        <b class="p-2">- OR -</b>
        <a href="#" class="btn btn-success mb-3 px-5 shadow-sm">Import File Excel</a>
      </div>

      <div class="rounded shadow p-3 bg-light col-sm-12">

        <table id="example" class="table table-hover" style="width:100%">
          <thead>
            <tr>
              <th>Nama</th>
              <th>gender</th>
              <th>Tanggal Lahir</th>
              <th>Kesehatan</th>
              <th>Status</th>
              <th>Opsi</th>
            </tr>
          </thead>
          <tbody>
            @foreach($refugees as $refugee)
            <tr>
              <td>{{ $refugee->name }}</td>
              <td>{{ $refugee->gender }}</td>
              <td>{{ $refugee->birthdate }}</td>
              <td>{!! $refugee->healthLabel() !!}</td>
              <td>{!! $refugee->statusLabel() !!}</td>
              <td>
                <a class="btn btn-sm btn-success" href="" data-toggle="modal" data-target="#refugee{{ $refugee->id }}">Detail</a>
                <a class="btn btn-sm btn-primary" href="{{ route('refugees.edit', $refugee->id) }}">Edit</a>
                <form class="d-inline-block" action="{{ route('refugees.destroy', $refugee->id) }}" method="post">
                  @csrf
                  {{ method_field('DELETE') }}
                  <button class="btn btn-sm btn-danger" type="submit">Delete</button>
                </form>
              </td>
            </tr>

            <!-- The Modal -->
            <div class="modal fade" id="refugee{{ $refugee->id }}">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">

                  <!-- Modal Header -->
                  <div class="modal-header bg-primary">
                    <h4 class="modal-title text-white">Detail Pengungsi</h4>
                    <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
                  </div>

                  <!-- Modal body -->
                  <div class="modal-body">
                    <div class="row py-2">
                      <span class="col"><b>Nama :</b></span>
                      <span class="col text-right">{{ $refugee->name }}</span>
                    </div>
                    <div class="row py-2">
                      <span class="col"><b>Jenis Kelamin :</b></span>
                      <span class="col text-right">{{ $refugee->gender }}</span>
                    </div>
                    <div class="row py-2">
                      <span class="col"><b>Asal :</b></span>
                      <span class="col text-right">{{ $refugee->origin }}</span>
                    </div>
                    <div class="row py-2">
                      <span class="col"><b>Tanggal Lahir :</b></span>
                      <span class="col text-right">{{ $refugee->birthdate }}</span>
                    </div>
                    <div class="row py-2">
                      <span class="col"><b>Kesehatan :</b></span>
                      <span class="col text-right">{!! $refugee->healthLabel() !!}</span>
                    </div>
                    <div class="row py-2">
                      <span class="col"><b>Status :</b></span>
                      <span class="col text-right">{!! $refugee->statusLabel() !!}</span>
                    </div>
                    <div class="row py-2">
                      <span class="col"><b>Golongan Darah :</b></span>
                      <span class="col text-right">{{ $refugee->blood_type }}</span>
                    </div>
                    <div class="row py-2">
                      <span class="col"><b>Barak :</b></span>
                      <span class="col text-right">{{ $refugee->barrack }}</span>
                    </div>
                    <div class="row py-2">
                      <span class="col"><b>Posko :</b></span>
                      <span class="col text-right">{{ $refugee->post->name }}</span>
                    </div>
                    <div class="row py-2">
                      <span class="col"><b>Deskripsi :</b></span>
                      <span class="col text-right">{{ $refugee->description }}</span>
                    </div>
                    <div class="row py-2">
                      <span class="col"><b>Peristiwa :</b></span>
                      <span class="col text-right">{{ $refugee->event->name }}</span>
                    </div>
                    <div class="row py-2">
                      <span class="col"><b>Pembuat Data :</b></span>
                      <span class="col text-right">{{ $refugee->user->name }}</span>
                    </div>
                  </div>

                </div>
              </div>
            </div>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>

  </div>

  </div>
@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
      $('#example').DataTable();

      var health = document.getElementById("health").getContext('2d');
      var healthChart = new Chart(health, {
          type: 'doughnut',
          data: {
              labels: ["Sehat", "Sakit Ringan", "Sakit Parah", "Meninggal"],
              datasets: [{
                  label: '# of Votes',
                  data: [10, 9, 3, 5],
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
                  data: [3, 5, 7],
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
  } );
</script>
@endsection
