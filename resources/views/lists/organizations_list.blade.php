@extends('layouts.app')

@section('title', 'Daftar Organisasi')

@section('content')
<div class="container">

	@if(isset($keyword))
	
  <div class="my-4">
    <div class="rounded shadow p-3 bg-light col-sm-12">
    	<h5>Menampilkan hasil pencarian kata: <b>{{ $keyword }}</b></h5>
    	<h5>Berdasarkan filter: <b>Organisasi</b></h5>
    </div>
  </div>

  <hr>

  @endif

  <div class="centered my-4">
    <h3 class="text-center">~ Daftar Organisasi ~</h3>
  </div>

  @if(!$organizations->count())

  <div class="my-4">
    <div class="rounded shadow p-3 bg-light col-sm-12">
    	<h6 class="text-center">Maaf, tidak ditemukan data yang sesuai dengan kata kunci pencarian.</h6>
    </div>
  </div>

  @else

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

  <div class="my-4 d-flex justify-content-center">   	
  	{{ $organizations->appends(['keyword' => $keyword, 'filter' => 'organisasi'])->links() }}
  </div>

  @endif

</div>
@endsection