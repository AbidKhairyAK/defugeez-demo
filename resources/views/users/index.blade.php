@extends('layouts.app')

@section('title', 'Relawan')

@section('content')
  <div id="users" class="container">

    <div class="centered my-3">
      <h3 class="text-center">- Info Organisasi -</h3>
    </div>

    <div class="bg-light p-3 rounded shadow">

      <h4 class="border-bottom-0 mb-3"><b>{{ $organization->name }}</b></h4>

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

    <div class="text-center">
      <a href="{{ route('users.create') }}" class="btn btn-info mb-3 px-5 shadow-sm">Tambah Relawan</a>
    </div>

    <div id="users-section" class="rounded shadow p-3 mb-5 bg-light col-sm-12">
      <table id="users-table" class="table table-hover" style="width:100%">
        <thead>
          <tr>
            <th class="d-table-cell d-md-none">Opsi</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Role</th>
            <th>Status</th>
            <th class="d-none d-md-table-cell">Opsi</th>
          </tr>
        </thead>
        <tbody>
          @foreach($users as $user)
          <tr>
            <td class="d-table-cell d-md-none">

              @can('users.view', $organization)
              <a class="btn btn-sm btn-success" href="" data-toggle="modal" data-target="#user{{ $user->id }}">
                <i class="fa fa-address-card"></i>
              </a>
              @endcan

              @can('users.update', $user)
              <a class="btn btn-sm btn-info" href="{{ route('users.edit', $user->id) }}">
                <i class="fa fa-edit"></i>
              </a>
              @endcan

              @can('users.delete', $user)
              <form class="d-inline" action="{{ route('users.destroy', $user->id) }}" method="post">
                @csrf
                {{ method_field('DELETE') }}
                <button class="btn btn-sm btn-danger" type="submit">
                  <i class="fa fa-trash"></i>
                </button>
              </form>
              @endcan

            </td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->present()->roleFormatted }}</td>
            <td>{!! $user->present()->statusFormatted !!}</td>
            <td class="d-none d-md-table-cell">
              
              @can('users.view', $organization)
              <a class="btn btn-sm btn-success" href="" data-toggle="modal" data-target="#user{{ $user->id }}">
                <i class="fa fa-address-card"></i> Detail
              </a>
              @endcan

              @can('users.update', $user)
              <a class="btn btn-sm btn-info" href="{{ route('users.edit', $user->id) }}">
                <i class="fa fa-edit"></i> Edit
              </a>
              @endcan

              @can('users.delete', $user)
              <form class="d-inline" action="{{ route('users.destroy', $user->id) }}" method="post">
                @csrf
                {{ method_field('DELETE') }}
                <button class="btn btn-sm btn-danger" type="submit">
                  <i class="fa fa-trash"></i> Hapus
                </button>
              </form>
              @endcan

            </td>
          </tr>

          <!-- The Modal -->
          <div class="modal fade" id="user{{ $user->id }}">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header bg-info">
                  <h4 class="modal-title text-white">Detail Relawan</h4>
                  <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                  <div class="row py-2">
                    <span class="col-4"><b>Organisasi :</b></span>
                    <span class="col-8 text-right">{{ $user->organization->name }}</span>
                  </div>
                  <div class="row py-2">
                    <span class="col-4"><b>Nama :</b></span>
                    <span class="col-8 text-right">{{ $user->name }}</span>
                  </div>
                  <div class="row py-2">
                    <span class="col-4"><b>Alamat Lengkap :</b></span>
                    <span class="col-8 text-right">{{ $user->present()->fullAddress }}</span>
                  </div>
                  <div class="row py-2">
                    <span class="col-4"><b>Email :</b></span>
                    <span class="col-8 text-right">{{ $user->email }}</span>
                  </div>
                  <div class="row py-2">
                    <span class="col-4"><b>Nomor HP / WA :</b></span>
                    <span class="col-8 text-right">{{ $user->phone }}</span>
                  </div>
                  <div class="row py-2">
                    <span class="col-4"><b>Role / Peran :</b></span>
                    <span class="col-8 text-right">{{ $user->present()->roleFormatted }}</span>
                  </div>
                  <div class="row py-2">
                    <span class="col-4"><b>Status :</b></span>
                    <span class="col-8 text-right">{!! $user->present()->statusFormatted !!}</span>
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
@endsection

@section('script')
<script type="text/javascript">
    $('#users-table').DataTable({
      "order": []
    });
</script>
@endsection