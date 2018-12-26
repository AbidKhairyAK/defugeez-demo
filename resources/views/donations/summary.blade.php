@extends('layouts.app')

@section('title', 'Summary Donations')

@section('content')

	<div class="container">
	
	<div class="centered my-3">
      <h5 class="text-center">Anda Akan Berdonasi untuk</h5>
      <h3 class="text-center text-primary"><b>Bangun Masjid Rusak di Palu karena Gempa</b></h3>
    </div>

    <div class="row justify-content-center">
      <div class="bg-light p-3 rounded shadow col-md-6">
        <h3 class="text-center text-secondary"><b>Intruksi Pembayaran</b></h3>
        <div class="pb-3">
            <p class="text-center">Transfer tepat sesuai nominal berikut</p>
          	<h1 class="text-center"><b>Rp. 1.234.824</b></h1>
          	<div class="alert alert-warning" role="alert">
			  <p class="text-center"><b>PENTING!</b> Mohon transfer tepat sampai 3 angka terakhir agar donasi Anda dapat diproses.</p>
			</div>
			<div class="border rounded">
				<div class="clearfix pt-4 px-3">
					<div class="float-left">
						<p>Jumlah Donasi</p>
					</div>
					<div class="float-right">
						<p>Rp. 1.234.000</p>
					</div>
				</div>
				<hr>
				<div class="clearfix pt-1 px-3">
					<div class="float-left">
						<p>Kode Unik (*)</p>
					</div>
					<div class="float-right">
						<p>824</p>
					</div>
				</div>
			</div>
         </div>
      </div>
    </div>

    <div class="row my-4 justify-content-center">
	    <div class="bg-light p-3 rounded shadow col-md-6">
	    	<h6 class="text-center mt-3">Transfer ke rekening a/n Yayasan Kita Bisa berikut ini :</h6>
	    	<div class="alert alert-primary">
	    		<p class="text-center">BANK BNI</p>
				<h3 class="text-center"><b>78 78 0 27 009</b></h3>
				<p class="text-center">Jati ningrum, Krnggan</p>
			</div>
			<div class="rounded border">
				<p class="text-center p-3">Transfer sebelum <b>24 Nov 2018 15:33 WIB</b> atau donasi Anda otomatis dibatalkan oleh sistem.</p>
			</div>
	    	</div>
	    </div>
	</div>

    </div>

@endsection