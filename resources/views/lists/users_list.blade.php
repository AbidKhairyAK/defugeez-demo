@extends('layouts.app')

@section('title', 'Daftar Relawan');

@section('content')
<div id="list" class="container">
	
  @if(isset($keyword))
	
  <div class="my-4">
    <div class="rounded shadow p-3 bg-light col-sm-12">
    	<h5>Menampilkan hasil pencarian kata: <b>{{ $keyword }}</b></h5>
    	<h5>Berdasarkan filter: <b>Relawan</b></h5>
    </div>
  </div>

  <hr>

  @endif

  <div class="centered my-4">
    <h3 class="text-center">~ Daftar Relawan ~</h3>
  </div>

  @if(!$users->count())

  <div class="my-4">
    <div class="rounded shadow p-3 bg-light col-sm-12">
    	<h6 class="text-center">Maaf, tidak ditemukan data yang sesuai dengan kata kunci pencarian.</h6>
    </div>
  </div>

  @else

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
	          <a class="btn btn-sm btn-success" href="" data-toggle="modal" data-target="#user{{ $user->id }}">
	            <i class="fa fa-address-card"></i>
	          </a>
	          <a class="btn btn-sm btn-info" href="{{ route('users.edit', $user->id) }}">
	            <i class="fa fa-edit"></i>
	          </a>
	          <form class="d-inline" action="{{ route('users.destroy', $user->id) }}" method="post">
	            @csrf
	            {{ method_field('DELETE') }}
	            <button class="btn btn-sm btn-danger" type="submit">
	              <i class="fa fa-trash"></i>
	            </button>
	          </form>
	        </td>
	        <td>{{ $user->name }}</td>
	        <td>{{ $user->email }}</td>
	        <td>{{ $user->present()->roleFormatted }}</td>
	        <td>{!! $user->present()->statusFormatted !!}</td>
	        <td class="d-none d-md-table-cell">
	          <a class="btn btn-sm btn-success" href="" data-toggle="modal" data-target="#user{{ $user->id }}">
	            <i class="fa fa-address-card"></i> Detail
	          </a>
	          <a class="btn btn-sm btn-info" href="{{ route('users.edit', $user->id) }}">
	            <i class="fa fa-edit"></i> Edit
	          </a>
	          <form class="d-inline" action="{{ route('users.destroy', $user->id) }}" method="post">
	            @csrf
	            {{ method_field('DELETE') }}
	            <button class="btn btn-sm btn-danger" type="submit">
	              <i class="fa fa-trash"></i> Hapus
	            </button>
	          </form>
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

  <div class="my-4 d-flex justify-content-center">   	
  	{{ $users->appends(['keyword' => $keyword, 'filter' => 'relawan'])->links() }}
  </div>

  @endif

</div>
@endsection