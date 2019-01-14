<div id="refugees" class="tab-pane  {{ session('refugees_tab') == 'refugees' ? 'active' : 'fade' }}">

  <div class="centered my-3">
    <h3 class="text-center">Data Pengungsi</h3>
  </div>

  
  <div class="text-center">
    <a href="{{ route('refugees.create') }}" class="btn btn-info mb-3 px-5 shadow-sm">Tambah Pengungsi</a>
    <b class="p-2">- OR -</b>
    <a href="#" class="btn btn-success mb-3 px-5 shadow-sm">Import File Excel</a>
  </div>

  <div class="rounded shadow p-3 mb-5 bg-light col-sm-12">

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
            <a class="btn btn-sm btn-info" href="{{ route('refugees.edit', $refugee->id) }}">Edit</a>
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
              <div class="modal-header bg-info">
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