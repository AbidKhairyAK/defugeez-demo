@extends('layouts.app')

@section('title', 'Donasi')

@section('content')
<div class="container">

	<div class="centered my-3">
	  <h3 class="text-center">Detail Donasi</h3>
	</div>
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="bg-white px-4 py-5 rounded shadow">
				<div class="row">
					<div class="col-md-8">
	                  <img src="https://ichef.bbci.co.uk/news/976/cpsprodpb/006F/production/_103911100_masjiddantukang.jpg" class="img-fluid mb-4">
	                  <h4 class="font-weight-bold">Bangun Masjid Rusak di Palu karena Gempa</h4>
	                  <hr class="mb-4">
	                  <p>Action handlers receive a context object which exposes the same set of methods/properties on the store instance, so you can call context.commit to commit a mutation, or access the state and getters via context.state and context.getters. We can even call other actions with context.dispatch. We will see why this context object is not the store instance itself when we introduce Modules later.

In practice, we often use ES2015 argument destructuring
to simplify the code a bit (especially when we need to call commit multiple times):</p>
					</div>
					<div class="col-md-4">		
		                <div class="h2 font-weight-bold mb-0">Rp. 8.750.322</div>
		                <div class="mb-3">terkumpul dari Rp. 12.450.322</div>
		                <div class="progress" style="height: 20px;">
		                  <div class="progress-bar" style="height: 20px;width:60%"></div>
		                </div>
		                <div class="small">60% Terkumpul</div>
		                <div class=" text-center">
			                <a  href="{{ route('donations.form') }}" class="btn btn-primary mt-3 col-md-12"><b>Donasi Sekarang</b></a>
		                </div>
		                <div class="mb-3 text-center">
			                <a href="" class="btn btn-outline-success mt-3 col-md-12"><b>Share</b></a>
		                </div>
		                <p>Penggalangan dana dimulai pada <br>
		                	<b>21 Juni 2017</b>
		                </p>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>
