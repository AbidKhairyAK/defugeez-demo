@extends('layouts.app')

@section('title', 'Daftar Donasi')

@section('content')
<div class="container">

	@if(isset($keyword))
	
  <div class="my-4">
    <div class="rounded shadow p-3 bg-light col-sm-12">
    	<h5>Menampilkan hasil pencarian kata: <b>{{ $keyword }}</b></h5>
    	<h5>Berdasarkan filter: <b>Donasi</b></h5>
    </div>
  </div>

  <hr>

  @endif

  <div class="centered my-4">
    <h3 class="text-center">~ Daftar Penggalangan Dana ~</h3>
  </div>

  @if(!$donations->count())

  <div class="my-4">
    <div class="rounded shadow p-3 bg-light col-sm-12">
    	<h6 class="text-center">Maaf, tidak ditemukan data yang sesuai dengan kata kunci pencarian.</h6>
    </div>
  </div>

  @else

  <div class="row">
  @foreach($donations as $donation)

    <div class="col-md-3 mb-4">
      <div class="card rounded overflow-hidden shadow">
        <div class="card-img-top" style="height: 150px; overflow: hidden;">
          <img src="/img/donation/{{ $donation->image }}" style="width: 100%;">
        </div>
        <div class="card-body" style="min-height: 210px; display: flex; flex-direction: column; justify-content: space-between;">
          <div>
            <h6 class="card-title">{{ $donation->name }}</h6>
          </div>
          <div>
            <hr>
            <div class="progress" style="height: 20px;">
              <div class="progress-bar bg-info" style="height: 20px;width:{{ $donation->present()->percentage }}%"></div>
            </div>
            <div class="small">Terkumpul</div>
            <div>{{ $donation->present()->collected }}</div>
          </div>
        </div>
        <div class="bg-info text-center p-2">
          <a href="{{ route('donations.show', $donation->slug) }}" class="text-white h6">Info Lebih Lanjut</a>
        </div>
      </div>
    </div>
   
  @endforeach
  </div>

  <div class="my-4 d-flex justify-content-center">   	
  	{{ $donations->appends(['keyword' => $keyword, 'filter' => 'donasi'])->links() }}
  </div>

  @endif

</div>
@endsection