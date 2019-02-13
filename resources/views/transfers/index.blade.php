@extends('layouts.app')

@section('title', 'Transfers List');

@section('content')
<div class="container">

  <div class="centered mb-3 mt-4">
    <h3 class="text-center">- Daftar Transfer -</h3>
  </div>

  @if(!$transfers->count())

  <div class="my-4">
    <div class="rounded shadow p-3 bg-light col-sm-12">
    	<h6 class="text-center">Data not found.</h6>
    </div>
  </div>

  @else

	<div id="transfers-section" class="rounded shadow p-3 mb-5 bg-light col-sm-12">
	  
	  <table id="transfers-table" class="table table-hover" style="width:100%">
	    <thead>
	      <tr>
	        <th class="d-table-cell d-md-none">Opsi</th>
	        <th>Nama Donatur</th>
	        <th>Jumlah Donasi</th>
	        <th>Bank</th>
	        <th>Status</th>
	        <th class="d-none d-md-table-cell">Opsi</th>
	      </tr>
	    </thead>
	    <tbody>
	      @foreach($transfers as $transfer)
	      <tr>
          <td class="d-table-cell d-md-none">
            <a class="btn btn-sm btn-success" href="" data-toggle="modal" data-target="#transfer{{ $transfer->id }}">
              <i class="fa fa-address-card"></i>
            </a>

            <form class="d-inline" action="{{ route('transfers.update', [$transfer->donation->slug, $transfer->slug]) }}" method="post">
            	@csrf @method('PUT')
              <button class="btn btn-sm btn-info">
                <i class="fa fa-check"></i>
              </button>
            </form>

            <form class="d-inline" action="{{ route('transfers.destroy', [$transfer->donation->slug, $transfer->slug]) }}" method="post">
              @csrf @method('DELETE')
              <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Apakah anda yakin?')">
                <i class="fa fa-trash"></i>
              </button>
            </form>

          </td>
	        <td>{{ $transfer->user->name }}</td>
	        <td>{{ $transfer->present()->amount_real }}</td>
	        <td>{{ $transfer->bank }}</td>
	        <td><span class="badge badge-{{ $transfer->present()->curr_status['color'] }}">{{ $transfer->present()->curr_status['text'] }}</span></td>
            <td class="d-none d-md-table-cell">
              <a class="btn btn-sm btn-success" href="" data-toggle="modal" data-target="#transfer{{ $transfer->id }}">
                <i class="fa fa-address-card"></i> Detail
              </a>

              <form class="d-inline" action="{{ route('transfers.update', [$transfer->donation->slug, $transfer->slug]) }}" method="post">
              	@csrf @method('PUT')
	              <button class="btn btn-sm btn-info">
	                <i class="fa fa-check"></i> Setujui
	              </button>
              </form>

              <form class="d-inline" action="{{ route('transfers.destroy', [$transfer->donation->slug, $transfer->slug]) }}" method="post">
                @csrf @method('DELETE')
                <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Apakah anda yakin?')">
                  <i class="fa fa-trash"></i> Hapus
                </button>
              </form>

            </td>
	      </tr>

	      <!-- The Modal -->
	      <div class="modal fade" id="transfer{{ $transfer->id }}">
	        <div class="modal-dialog modal-dialog-centered">
	          <div class="modal-content">

	            <!-- Modal Header -->
	            <div class="modal-header bg-info">
	              <h4 class="modal-title text-white">Detail Transfer</h4>
	              <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
	            </div>

	            <!-- Modal body -->
	            <div class="modal-body">
	              <div class="row py-2">
	                <span class="col-4"><b>Donasi Ke :</b></span>
	                <span class="col-8 text-right">{{ $transfer->donation->name }}</span>
	              </div>
	              <div class="row py-2">
	                <span class="col-4"><b>Nama Donatur :</b></span>
	                <span class="col-8 text-right">{{ $transfer->user->name }}</span>
	              </div>
	              <div class="row py-2">
	                <span class="col-4"><b>Bank :</b></span>
	                <span class="col-8 text-right">{{ $transfer->bank }}</span>
	              </div>
	              <div class="row py-2">
	                <span class="col-4"><b>Jumlah :</b></span>
	                <span class="col-8 text-right">{{ $transfer->present()->amount_real }}</span>
	              </div>
	              <div class="row py-2">
	                <span class="col-4"><b>Nomor Rekening :</b></span>
	                <span class="col-8 text-right">{{ $transfer->account_number }}</span>
	              </div>
	              <div class="row py-2">
	                <span class="col-4"><b>Status :</b></span>
	                <span class="col-8 text-right"><span class="badge badge-{{ $transfer->present()->curr_status['color'] }}">{{ $transfer->present()->curr_status['text'] }}</span></span>
	              </div>
	              <div class="row py-2">
	                <span class="col-4"><b>Bukti :</b></span>
	                <span class="col-8 text-right">{!! $transfer->proof ? "<img src='".$transfer->proof->image."'>" : '-' !!}</span>
	              </div>
	              <div class="row py-2">
	                <span class="col-4"><b>Dibuat Pada :</b></span>
	                <span class="col-8 text-right">{{ $transfer->present()->date_formatted }}</span>
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
  	{{ $transfers->links() }}
  </div>

  @endif

</div>
@endsection