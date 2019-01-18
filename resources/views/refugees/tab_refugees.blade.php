<div id="refugees" class="tab-pane  {{ session('refugees_tab') == 'refugees' ? 'active' : 'fade' }}">

  <div class="centered my-3">
    <h3 class="text-center">Data Pengungsi</h3>
  </div>

  
  <div class="text-center mb-3">
    <a href="{{ route('refugees.create') }}" class="btn btn-info px-5 shadow-sm">Tambah Pengungsi</a>
    <b class="p-2 d-block d-md-inline">- OR -</b>
    <a href="#" class="btn btn-success px-5 shadow-sm">Import File Excel</a>
  </div>

  <p class="text-center mt-3">&lArr; swipe &rArr;</p>

  <div id="refugees-section" class="rounded shadow p-3 mb-5 bg-light col-sm-12">

    <table id="refugees-table" class="table table-hover" style="width:100%">
      <thead>
        <tr>
          <th class="d-table-cell d-md-none">Opsi</th>
          <th>Nama</th>
          <th>gender</th>
          <th>Tanggal Lahir</th>
          <th>Kesehatan</th>
          <th>Status</th>
          <th class="d-none d-md-table-cell">Opsi</th>
        </tr>
      </thead>
      <tbody>
        @foreach($refugees as $refugee)
        <tr>
          <td class="d-table-cell d-md-none">
            <a class="btn btn-sm btn-success" href="" data-toggle="modal" data-target="#refugee{{ $refugee->id }}">
              <i class="fa fa-address-card"></i>
            </a>
            <a class="btn btn-sm btn-info" href="{{ route('refugees.edit', $refugee->id) }}">
              <i class="fa fa-edit"></i>
            </a>
            <form class="d-inline" action="{{ route('refugees.destroy', $refugee->id) }}" method="post">
              @csrf
              {{ method_field('DELETE') }}
              <button class="btn btn-sm btn-danger" type="submit">
                <i class="fa fa-trash"></i>
              </button>
            </form>
          </td>
          <td>{{ $refugee->name }}</td>
          <td>{{ $refugee->gender }}</td>
          <td>{{ $refugee->birthdate }}</td>
          <td>{!! $refugee->healthLabel() !!}</td>
          <td>{!! $refugee->statusLabel() !!}</td>
          <td class="d-none d-md-table-cell">
            <a class="btn btn-sm btn-success" href="" data-toggle="modal" data-target="#refugee{{ $refugee->id }}">
              <i class="fa fa-address-card"></i> Detail
            </a>
            <a class="btn btn-sm btn-info" href="{{ route('refugees.edit', $refugee->id) }}">
              <i class="fa fa-edit"></i> Edit
            </a>
            <form class="d-inline" action="{{ route('refugees.destroy', $refugee->id) }}" method="post">
              @csrf
              {{ method_field('DELETE') }}
              <button class="btn btn-sm btn-danger" type="submit">
                <i class="fa fa-trash"></i> Hapus
              </button>
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