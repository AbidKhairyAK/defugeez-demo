<div id="refugees" class="tab-pane  {{ session('refugees_tab') == 'refugees' ? 'active' : 'fade' }}">

  <div class="centered my-3">
    <h3 class="text-center">- Data Pengungsi -</h3>
  </div>

  <div class="text-center mb-3">
    <a href="{{ route('refugees.create', [$event->slug, $post->slug]) }}" class="btn btn-info px-5 shadow-sm @cannot('refugees.create') disabled @endcan">Tambah Pengungsi</a>
    <b class="p-2 d-block d-md-inline">- OR -</b>
    <button type="button" data-toggle="modal" data-target="#excel" class="btn btn-success px-5 shadow-sm">Import / Export Excel</button>
  </div>

  {{-- Modal Import Export Excel --}}

  <div class="modal fade" id="excel">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header bg-success">
          <h4 class="modal-title text-white">Import / Export Excel</h4>
          <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <h5>Import Dari Excel</h5>
          <p class="small">Fitur yang berfungsi untuk memasukkan data pengungsi dari file dengan format Excel kedalam aplikasi <i>de</i><b>Fugeez</b>.</p>
          <span class="small"><i>catatan:</i></span>
          <ul class="pl-3">
            <li class="small"><i>file yang ingin di import harus mengikuti format excel yang telah ditetapkan. silahkan download format file dibawah</i></li>
            <li class="small"><i>usahakan untuk tidak meng-import pengungsi yang sama berkali-kali, untuk menghindari duplikasi data</i></li>
            <li class="small"><i>untuk menghindari duplikasi data, silahkan hapus file / data di dalam file anda setelah mengimport</i></li>
          </ul>
          <div class="row">
            <div class="col-sm-6">
              <a href="{{ route('refugees.format', [$event->slug, $post->slug]) }}" class="btn btn-block btn-secondary" data-toggle="tooltip" title="Download file format excel sebelum meng-import data pengungsi">Download Format File</a>
            </div>
            <div class="col-sm-6">
              <form id="import-form" accept="application/vnd.ms-excel" method="post" action="{{ route('refugees.import', [$event->slug, $post->slug]) }}" enctype="multipart/form-data" class="d-block">
                @csrf
                <label class="d-block">
                  <a class="btn btn-block btn-success text-white" data-toggle="tooltip" title="Import data pengungsi dari file excel">Import Dari Excel</a>
                  <input type="file" name="import" id="import-excel" class="d-none" accept=".xls,.xlsx, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/vnd.ms-excel">
                </label>
              </form>
            </div>
          </div>
          <hr>
          <h5>Export Ke Excel</h5>
          <p class="small">Fitur yang berfungsi untuk mengubah dan mendownload data pengungsi ke dalam file dengan format Excel.</p>
          <a href="{{ route('refugees.export', [$event->slug, $post->slug]) }}" class="btn btn-block btn-success" data-toggle="tooltip" title="export data pengungsi ke file excel">Export Ke Excel</a>
        </div>

      </div>
    </div>
  </div>
  {{-- Modal Import Export Excel --}}

  <p class="text-center mt-3 d-block d-md-none">&lArr; swipe &rArr;</p>

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

            <a class="btn btn-sm btn-info @cannot('refugees.update', $refugee) disabled @endcan" href="{{ route('refugees.edit', [$event->slug, $post->slug, $refugee->slug]) }}">
              <i class="fa fa-edit"></i>
            </a>
            
            <form class="d-inline" action="{{ route('refugees.destroy', [$event->slug, $post->slug, $refugee->slug]) }}" method="post">
              @csrf @method('DELETE')
              <button class="btn btn-sm btn-danger @cannot('refugees.delete', $refugee) disabled @endcan" type="submit" onclick="return @can('refugees.delete', $refugee) confirm('Apakah anda yakin?') @else false @endcan">
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

            <a class="btn btn-sm btn-info @cannot('refugees.update', $refugee) disabled @endcan" href="{{ route('refugees.edit', [$event->slug, $post->slug, $refugee->slug]) }}">
              <i class="fa fa-edit"></i> Edit
            </a>
            
            <form class="d-inline" action="{{ route('refugees.destroy', [$event->slug, $post->slug, $refugee->slug]) }}" method="post">
              @csrf @method('DELETE')
              <button class="btn btn-sm btn-danger @cannot('refugees.delete', $refugee) disabled @endcan" type="submit" onclick="return @can('refugees.delete', $refugee) confirm('Apakah anda yakin?') @else false @endcan">
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

