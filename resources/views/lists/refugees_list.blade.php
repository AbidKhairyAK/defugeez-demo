@extends('layouts.app')

@section('title', 'Daftar Pengungsi');

@section('content')
<div id="list" class="container">
	
  @if(isset($keyword))
	
  <div class="my-4">
    <div class="rounded shadow p-3 bg-light col-sm-12">
    	<h5>Menampilkan hasil pencarian kata: <b>{{ $keyword }}</b></h5>
    	<h5>Berdasarkan filter: <b>Pengungsi</b></h5>
    </div>
  </div>

  <hr>

  @endif

  <div class="centered my-4">
    <h3 class="text-center">~ Daftar Pengungsi ~</h3>
  </div>

  @if(!$refugees->count())

  <div class="my-4">
    <div class="rounded shadow p-3 bg-light col-sm-12">
    	<h6 class="text-center">Maaf, tidak ditemukan data yang sesuai dengan kata kunci pencarian.</h6>
    </div>
  </div>

  @else

  <p class="text-center mt-3 d-block d-md-none">&lArr; swipe &rArr;</p>

	<div id="refugees-section" class="rounded shadow p-3 mb-5 bg-light">

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

            @can('refugees.update', $refugee)
            <a class="btn btn-sm btn-info" href="{{ route('refugees.edit', $refugee->id) }}">
              <i class="fa fa-edit"></i>
            </a>
            @else
            <a class="btn btn-sm btn-info" href="{{ route('login') }}">
              <i class="fa fa-edit"></i>
            </a>
            @endcan

            @can('refugees.delete', $refugee)
            <form class="d-inline" action="{{ route('refugees.destroy', $refugee->id) }}" method="post">
              @csrf
              {{ method_field('DELETE') }}
              <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Apakah anda yakin?')">
                <i class="fa fa-trash"></i>
              </button>
            </form>
            @else
            <a class="btn btn-sm btn-danger" href="{{ route('login') }}">
              <i class="fa fa-trash"></i>
            </a>
            @endcan

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

            @can('refugees.update', $refugee)
            <a class="btn btn-sm btn-info" href="{{ route('refugees.edit', $refugee->id) }}">
              <i class="fa fa-edit"></i> Edit
            </a>
            @else
            <a class="btn btn-sm btn-info" href="{{ route('login') }}">
              <i class="fa fa-edit"></i> Edit
            </a>
            @endcan
            
            @can('refugees.delete', $refugee)
            <form class="d-inline" action="{{ route('refugees.destroy', $refugee->id) }}" method="post">
              @csrf
              {{ method_field('DELETE') }}
              <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Apakah anda yakin?')">
                <i class="fa fa-trash"></i> Hapus
              </button>
            </form>
            @else
            <a class="btn btn-sm btn-danger" href="{{ route('login') }}">
              <i class="fa fa-trash"></i> Hapus
            </a>
            @endcan

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

  <div class="my-4 d-flex justify-content-center">   	
  	{{ $refugees->appends(['keyword' => $keyword, 'filter' => 'pengungsi'])->links() }}
  </div>

  @endif

</div>
@endsection