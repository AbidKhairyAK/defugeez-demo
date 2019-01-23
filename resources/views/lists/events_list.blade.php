@extends('layouts.app')

@section('title', 'Daftar Bencana')

@section('content')
<div class="container">

	@if(isset($keyword))
	
  <div class="my-4">
    <div class="rounded shadow p-3 bg-light col-sm-12">
    	<h5>Menampilkan hasil pencarian kata: <b>{{ $keyword }}</b></h5>
    	<h5>Berdasarkan filter: <b>Bencana</b></h5>
    </div>
  </div>

  <hr>

  @endif

  <div class="centered my-4">
    <h3 class="text-center">~ Daftar Bencana ~</h3>
  </div>

  @if(!$events->count())

  <div class="my-4">
    <div class="rounded shadow p-3 bg-light col-sm-12">
    	<h6 class="text-center">Maaf, tidak ditemukan data yang sesuai dengan kata kunci pencarian.</h6>
    </div>
  </div>

  @else

  <div class="row">  	
  @foreach($events as $event)

	  <div class="mb-4 col-md-6">
	    <div class="rounded shadow p-3 bg-light col-sm-12">

	      <div class="btn-group dropleft option">
	        <button class="btn bg-light" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	          <i class="fa fa-ellipsis-v"></i>
	        </button>
	        <div class="dropdown-menu shadow" aria-labelledby="dropdownMenu2">
	          <a href="#" class="dropdown-item">Laporkan</a>

	          @can('events.update', $event)
	          <a href="{{ route('events.edit', $event->id) }}" class="dropdown-item">Edit</a>
	          @endcan
	          
	          @can('events.delete', $event)
	          <form action="{{ route('events.destroy', $event->id) }}" method="post">
	            @csrf
	            {{ method_field("DELETE") }}
	            <button class="dropdown-item btn" type="submit">Delete</button>
	          </form>
	          @endcan

	        </div>
	      </div>

	      <h5 class="section-title border-bottom pb-1"><b>{{ $event->name }}</b></h5>
	      <div class="clearfix">
	        <p>{{ $event->regency->name }}, {{ $event->province->name }}</p>
	        <div class="float-left">
	          <p class="mb-auto">Jumlah Pengungsi</p>
	          <h5><b class="text-info">{{ $event->refugees->count() }}</b> jiwa</h5>
	        </div>
	        <div class="float-right mt-4">
	          <p class="btn btn-{{ $event->damageColor() }} btn-sm mb-0">Tingkat: <b>{{ $event->damageName() }}</b></p>
	          <p class="btn btn-{{ $event->statusColor() }} btn-sm mb-0">Status: <b>{{ $event->statusName() }}</b></p>
	        </div>
	      </div>
	    </div>
	    <div class="bg-primary text-center p-2">
	      <a href="{{ route('posts.page', $event->id) }}" class="text-white h6">Info Lebih Lanjut</a>
	    </div>
	  </div>
   
  @endforeach
  </div>

  <div class="my-4 d-flex justify-content-center">   	
  	{{ $events->appends(['keyword' => $keyword, 'filter' => 'bencana'])->links() }}
  </div>

  @endif

</div>
@endsection