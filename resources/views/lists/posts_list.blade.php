@extends('layouts.app')

@section('title', 'Daftar Posko');

@section('content')
<div class="container">
	
  @if(isset($keyword))
	
  <div class="my-4">
    <div class="rounded shadow p-3 bg-light col-sm-12">
    	<h5>Menampilkan hasil pencarian kata: <b>{{ $keyword }}</b></h5>
    	<h5>Berdasarkan filter: <b>Posko</b></h5>
    </div>
  </div>

  <hr>

  @endif

  <div class="centered my-4">
    <h3 class="text-center">~ Daftar Posko ~</h3>
  </div>

  @if(!$posts->count())

  <div class="my-4">
    <div class="rounded shadow p-3 bg-light col-sm-12">
    	<h6 class="text-center">Maaf, tidak ditemukan data yang sesuai dengan kata kunci pencarian.</h6>
    </div>
  </div>

  @else

  <div class="row">  	
  @foreach($posts as $post)

		<div class="col-md-6 mb-4">
		  <div class="rounded shadow p-3 bg-light col-sm-12">

		    <div class="btn-group dropleft option">
		      <button class="btn bg-light" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		        <i class="fa fa-ellipsis-v"></i>
		      </button>
		      <div class="dropdown-menu shadow" aria-labelledby="dropdownMenu2">
		        <a href="#" class="dropdown-item">Laporkan</a>

            @can('posts.update', $post)
		        <a href="{{ route('posts.edit', $post->id) }}" class="dropdown-item">Edit</a>
		        @endcan

		        @can('posts.delete', $post)
		        <form action="{{ route('posts.destroy', $post->id) }}" method="post">
		          @csrf
		          {{ method_field("DELETE") }}
		          <button class="dropdown-item btn" type="submit">Delete</button>
		        </form>
		        @endcan

		      </div>
		    </div>

		    <h5 class="section-title border-bottom pb-1"><b>{{ $post->name }}</b></h5>
		    <div class="clearfix">
		      <p>{{ $post->district->name }}, {{ $post->village->name }}</p>
		      <p>Bencana {{ $post->event->name }}</p>
		      <div class="float-left">
		        <p class="mb-auto">Jumlah Pengungsi</p>
		        <h5><b class="text-info">{{ $post->refugees->count() }}</b> jiwa / <b class="text-secondary">{{ $post->capacity }}</b> kuota</b></h5>
		      </div>
		      <div class="float-right mt-4">
		        <p class="btn btn-{{ $post->statusColor() }} btn-sm mb-0">Status: <b>{{ $post->statusName() }}</b></p>
		      </div>
		    </div>
		  </div>
		  <div class="bg-primary text-center p-2">
		    <a href="{{ route('refugees.page', $post->id) }}" class="text-white h6">Info Lebih Lanjut</a>
		  </div>
		</div>
   
  @endforeach
  </div>

  <div class="my-4 d-flex justify-content-center">
  	@if($keyword)
  		{{ $posts->appends(['keyword' => $keyword, 'filter' => 'posko'])->links() }}
  	@else
  		{{ $posts->links() }}
  	@endif
  </div>

  @endif

</div>
@endsection