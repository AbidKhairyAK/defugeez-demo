@extends('layouts.app')

@section('title', 'Summary Donations')

@section('content')

	<div class="container">
	
		<div class="centered my-3">
      <h5 class="text-center">Anda Akan Berdonasi untuk</h5>
      <h3 class="text-center text-info"><b>{{ $transfer->donation->name }}</b></h3>
    </div>

    <div class="row justify-content-center">
      <div class="bg-light p-3 rounded shadow col-md-6">

      	@if($transfer->present()->curr_status['status'] == 'not')
	      	<form action="{{ route('transfers.destroy', [$donation->slug, $transfer->slug]) }}" method="post" class="row">
	      		@csrf @method('DELETE')
		        <span class="col-md-6"><a href="{{ route('proofs.create', [$donation->slug, $transfer->slug]) }}" class="btn btn-block btn-success mt-2">Kirim Bukti Transfer</a></span>
		        <span class="col-md-6"><button class="btn btn-block btn-danger mt-2" onclick="return confirm('Apakah anda yakin?')">Batalkan Donasi</button></span>
	      	</form>
        @elseif($transfer->present()->curr_status['status'] == 'wait')
          <p class="text-center"><small>Silahkan tunggu, transfer anda sedang diperiksa</small></p>
        @elseif($transfer->present()->curr_status['status'] == 'approved')
	      	<form action="{{ route('transfers.delete', [$donation->slug, $transfer->slug]) }}" method="post">
	      		@csrf @method('DELETE')
            <button class="btn btn-block btn-sm btn-danger mt-2" data-toggle="tooltip" title="Hanya menghapus dari tampilan. Data transfer tetap tersimpan di sistem">Hapus Riwayat Donasi</button>
	      	</form>
        @endif

      	<hr>
        <h4 class="text-center text-dark"><b>Intruksi Pembayaran</b></h4>
        <div class="pb-3">
          <p class="text-center"><small>Transfer tepat sesuai nominal berikut</small></p>
        	<h1 class="text-center"><b>{{ $transfer->present()->amount_real }}</b></h1>
        	<div class="alert alert-warning" role="alert">
						<p class="text-center"><b>PENTING!</b> Mohon transfer tepat sampai 3 angka terakhir agar donasi Anda dapat diproses.</p>
					</div>
					<div class="border rounded">
						<div class="clearfix pt-4 px-3">
							<div class="float-left">
								<p>Jumlah Donasi</p>
							</div>
							<div class="float-right">
								<p>{{ $transfer->present()->amount_formatted }}</p>
							</div>
						</div>
						<hr>
						<div class="clearfix pt-1 px-3">
							<div class="float-left">
								<p>Kode Unik (*)</p>
							</div>
							<div class="float-right">
								<p>{{ $transfer->present()->unique_code }}</p>
							</div>
						</div>
					</div>
        </div>
      </div>
    </div>

    <div class="row my-4 justify-content-center mb-5">
	    <div class="bg-light p-3 rounded shadow col-md-6">
	    	<h6 class="text-center mt-3">Transfer ke rekening berikut ini :</h6>
	    	<div class="alert alert-info text-center">
	    		<p>BANK {{ $transfer->bank != "OTHER" ? $transfer->bank : "BRI" }}</p>
					<h3><b>{{ $transfer->present()->bank_number }}</b></h3>
					<p>a/n <b>deFugeez</b></p>
				</div>
				<div class="rounded border">
					<p class="text-center p-3">Transfer sebelum <b>{{ $transfer->present()->due_date }} WIB</b> atau donasi Anda otomatis dibatalkan oleh sistem.</p>
				</div>
    	</div>
    </div>
	</div>
@endsection