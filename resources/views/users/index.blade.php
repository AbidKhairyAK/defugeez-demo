@extends('layouts.app')

@section('title', 'Relawan')

@section('content')
  <div id="users" class="container">

    <div class="centered my-3">
      <h3 class="text-center">- Info Organisasi -</h3>
    </div>

    <div class="bg-light p-3 rounded shadow">

      <div class="d-flex justify-content-between">
        <h4 class="border-bottom-0 mb-3"><b>{{ $organization->name }}</b></h4>

        @can('organizations.update', $organization)
          <a href="{{ route('organizations.edit', $organization->slug) }}" class="text-info"><h3><i class="fa fa-gear"></i></h3></a>
        @endcan
      </div>

      <div class="row">
        <div class="col-lg-6">
          <table class="table table-hover">
            <tr>
              <th width="170">Alamat Kantor</th>
              <td class="text-right">{{ $organization->present()->fullAddress }}</td>
            </tr>
            <tr>
              <th>Ketua Organisasi</th>
              <td class="text-right">{{ $organization->chairman }}</td>
            </tr>
            <tr>
              <th>Email</th>
              <td class="text-right">{{ $organization->email }}</td>
            </tr>
          </table>
        </div>

        <div class="col-lg-6">
          <table class="table table-hover">
            <tr>
              <th>Anggota Terdaftar</th>
              <td class="text-right">{{ $organization->users->count() }} Relawan</td>
            </tr>
            <tr>
              <th>Nomor HP / WA</th>
              <td class="text-right">{{ $organization->phone }}</td>
            </tr>
            <tr>
              <th>Nomor Rekening</th>
              <td class="text-right">{{ $organization->account_number }}</td>
            </tr>
          </table>
        </div>

        <div class="col-lg-3">
          <table class="table table-hover">
            <tr>
              <th>Logo</th>
            </tr>
            <tr>
              <td class="border-top-0 text-center">
                <img class="w-75" src="/img/logo/{{ $organization->logo }}">
              </td>
            </tr>
          </table>
        </div>

        <div class="col-lg-9">
          <table class="table table-hover">
            <tr>
              <th>Profil Singkat</th>
            </tr>
            <tr>
              <td class="border-top-0">
                <p style="line-height: 1.75">{{ $organization->profile ?: '-' }}</p>
              </td>
            </tr>
          </table>
        </div>

      </div>
    </div>

    <div class="centered mb-3 mt-5">
      <h3 class="text-center">- Daftar Relawan -</h3>
    </div>

    @can('users.create', $organization)
      <div class="text-center">
        <a href="{{ route('users.create', $organization->slug) }}" class="btn btn-info mb-3 px-5 shadow-sm">Tambah Relawan</a>
      </div>
    @endcan

    <div id="users-section" class="rounded shadow p-3 mb-5 bg-light col-sm-12">
      <table id="users-table" class="table table-hover" style="width:100%">
        <thead>
          <tr>
            <th class="d-table-cell d-md-none">Opsi</th>
            <th>Nama</th>
            <th>Asal</th>
            <th>Role</th>
            <th>Status</th>
            <th class="d-none d-md-table-cell">Opsi</th>
          </tr>
        </thead>
        
      </table>
    </div>

  </div>
@endsection

@section('script')
<script type="text/javascript">
  $('#users-table').DataTable({
    // order: [],
    processing: true,
    serverSide: true,
    ajax: "{{ route('users.data', $organization->slug) }}",
    columns: [
        {data: 'action_min', searchable: false, orderable: false},
        {data: 'username', name: 'users.name'},
        {data: 'regency.name', name: 'regency.name'},
        {data: 'role', name: 'users.role_id'},
        {data: 'statusf', name: 'users.status'},
        {data: 'action', searchable: false, orderable: false},
    ],
    drawCallback: function(settings) {
      $('#users-table tbody tr td:first-child').addClass('d-table-cell d-md-none');
      $('#users-table tbody tr td:last-child').addClass('d-none d-md-table-cell');
    }
  });
</script>
@endsection