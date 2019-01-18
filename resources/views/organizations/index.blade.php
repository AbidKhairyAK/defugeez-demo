@extends('layouts.app')

@section('title', 'Organisasi')

@section('content')
  <div class="container">

    <div class="centered mb-3 mt-5">
      <h3 class="text-center">Daftar Organisasi</h3>
    </div>

    <div class="text-center">
      <a href="{{ route('organizations.create') }}" class="btn btn-info mb-3 px-5 shadow-sm">Tambah Organisasi</a>
    </div>

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
          <a href="{{ route('users.page', $organization->id) }}" class="text-white h6">Info Lebih Lanjut &raquo;</a>
        </div>
      </div>
      @endforeach

    </div>

  </div>

@endsection