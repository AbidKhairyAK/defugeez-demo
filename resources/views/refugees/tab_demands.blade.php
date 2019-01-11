<div id="demands" class="tab-pane {{ session('refugees_tab') == 'demands' ? 'active' : 'fade' }}">
  <div class="centered my-3">
    <h3 class="text-center">Kebutuhan Posko</h3>
  </div>

  <div class="text-center">
    <a href="{{ route('demands.create') }}" class="btn btn-primary mb-3 px-5 shadow-sm">Tambah Kebutuhan</a>
  </div>

  <div class="row">

    <div class="col-md-6 mb-5">
      <div class="rounded shadow p-3 bg-light col-sm-12">

        <h5 class="section-title pb-1"><b>Permintaan Kebutuhan</b></h5>
        <table class="table table-hover ">
          <thead>
            <tr class="bg-secondary text-white">
              <th width="80">Opsi</th>
              <th>Nama Kebutuhan</th>
              <th>status</th>
            </tr>
          </thead>
          <tbody>
          @foreach($requested_demands as $demand)
            <tr>
              <td>
                <form action="{{ route('demands.destroy', $demand->id) }}" method="post">
                  {{ method_field('DELETE') }}
                  @csrf
                  <a data-toggle="tooltip" title="Edit data" class="btn btn-sm btn-success" href="{{ route('demands.edit', $demand->id) }}"><i class="fa fa-edit"></i></a>
                  <button data-toggle="tooltip" title="Hapus data" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                </form>
              </td>
              <td>{{ $demand->name }}</td>
              <td>{!! $demand->present()->statusFormatted !!}</td>
            </tr>
          @endforeach
          </tbody>
        </table>
      </div>
    </div>

    <div class="col-md-6 mb-5">
      <div class="rounded shadow p-3 bg-light col-sm-12">

        <h5 class="section-title border-bottom pb-1"><b>Kebutuhan Diterima</b></h5>
        
        <table class="table table-hover ">
          <thead>
            <tr class="bg-secondary text-white">
              <th width="80">#</th>
              <th>Nama Kebutuhan</th>
              <th>Tanggal</th>
            </tr>
          </thead>
          <tbody>
          @foreach($received_demands as $demand)
            <tr>
              <td>
                <form action="{{ route('demands.destroy', $demand->id) }}" method="post">
                  {{ method_field('DELETE') }}
                  @csrf
                  <a data-toggle="tooltip" title="Edit data" class="btn btn-sm btn-success" href="{{ route('demands.edit', $demand->id) }}"><i class="fa fa-edit"></i></a>
                  <button data-toggle="tooltip" title="Hapus data" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                </form>
              </td>
              <td>{{ $demand->name }}</td>
              <td>{{ $demand->present()->dateFormatted }}</td>
            </tr>
          @endforeach
          </tbody>
        </table>
      </div>
    </div>

  </div>
</div>