@extends('layouts.app')

@section('title', 'Organisasi')

@section('content')
  <div class="container">

    @can('organizations.view', $my_organization)
    <div class="centered my-3">
      <h3 class="text-center">- Organisasi Saya -</h3>
    </div>

    <div class="text-center">
      <a href="{{ route('users.index', $my_organization->slug) }}" class="btn btn-sm btn-info mb-3 px-5 shadow-sm">Info lebih lanjut &raquo;</a>
    </div>

    <div class="bg-light p-3 rounded shadow">

      <div class="d-flex justify-content-between">
        <h4 class="border-bottom-0 mb-3"><b>{{ $my_organization->name }}</b></h4>
        @can('organizations.update', $my_organization)
          <a href="{{ route('organizations.edit', $my_organization->slug) }}" class="text-info"><h3><i class="fa fa-gear"></i></h3></a>
        @endcan
      </div>

      <div class="row">
        <div class="col-lg-6">
          <table class="table table-hover">
            <tr>
              <th width="170">Alamat Kantor</th>
              <td class="text-right">{{ $my_organization->present()->fullAddress }}</td>
            </tr>
            <tr>
              <th>Ketua Organisasi</th>
              <td class="text-right">{{ $my_organization->chairman }}</td>
            </tr>
            <tr>
              <th>Email</th>
              <td class="text-right">{{ $my_organization->email }}</td>
            </tr>
          </table>
        </div>

        <div class="col-lg-6">
          <table class="table table-hover">
            <tr>
              <th>Anggota Terdaftar</th>
              <td class="text-right">{{ $my_organization->users->count() }} Relawan</td>
            </tr>
            <tr>
              <th>Nomor HP / WA</th>
              <td class="text-right">{{ $my_organization->phone }}</td>
            </tr>
            <tr>
              <th>Nomor Rekening</th>
              <td class="text-right">{{ $my_organization->account_number }}</td>
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
                <img class="w-75" src="/img/logo/{{ $my_organization->logo }}">
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
                <p style="line-height: 1.75">{{ $my_organization->profile ?: '-' }}</p>
              </td>
            </tr>
          </table>
        </div>

      </div>
    </div>
    @endcan

    <div class="centered mb-3 mt-5">
      <h3 class="text-center">- Daftar Organisasi -</h3>
    </div>

    @can('organizations.create')
      <div class="text-center">
        <a href="{{ route('organization-register') }}" class="btn btn-info mb-3 px-5 shadow-sm">Tambah Organisasi</a>
      </div>
    @endcan

    <div class="row">

      @foreach($organizations as $organization)
      <div class="col-md-6 mb-4">
        <div class="rounded shadow p-3 bg-light col-sm-12">
          <div class="clearfix">
            <div class="row">
              <div class="col-8">
                <h5 class="section-title border-bottom pb-1"><b>{{ $organization->name }}</b></h5>
                <p>{{ $organization->present()->halfAddress }}</p>
                <p class="mb-auto">Anggota Terdaftar</p>
                <h5><b class="text-info">{{ $organization->users->count() }}</b> relawan</h5>
              </div>
              <div class="col-4 text-right">
                <img class="w-75" src="/img/logo/{{ $organization->logo }}">
              </div>
            </div>
          </div>
        </div>
        <div class="bg-info text-center p-2">
          <a href="{{ route('users.index', $organization->slug) }}" class="text-white h6">Info Lebih Lanjut &raquo;</a>
        </div>
      </div>
      @endforeach

    </div>

  </div>

@endsection