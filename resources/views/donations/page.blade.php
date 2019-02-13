@extends('layouts.app')

@section('title', 'Donasi')

@section('content')
<div class="container">

	<div class="centered my-3">
	  <h3 class="text-center">- Detail Penggalangan Dana -</h3>
	</div>

	<div class="bg-white p-4 mb-5 rounded shadow">
		<div class="row">
			<div class="col-md-8">
        <img src="/img/donation/{{ $donation->image }}" class="img-fluid mb-4 w-100">
        <h3 class="font-weight-bold">{{ $donation->name }}</h3>
        <hr class="mb-4">
        {!! $donation->description !!}
			</div>
			<div class="col-md-4">		
        <div class="h2 font-weight-bold mb-0">{{ $donation->present()->collected }}</div>
        <div class="mb-3">terkumpul dari {{ $donation->present()->targeted }}</div>
        <div class="progress" style="height: 20px;">
          <div class="progress-bar bg-info" style="height: 20px; width:{{ $donation->present()->percentage }}%"></div>
        </div>
        <div class="small">{{ $donation->present()->percentage }}% Terkumpul</div>
        <div class=" text-center">
          <a  href="{{ route('transfers.create', $donation->slug) }}" class="btn btn-info mt-3 col-md-12"><b>Donasi Sekarang</b></a>
        </div>
        <div class="mb-3 text-center">
          <a href="" class="btn btn-outline-success mt-3 col-md-12"><b>Share</b></a>
        </div>
        <p>Penggalangan dana dimulai pada <br>
        	<b>{{ $donation->present()->date_formatted }}</b>
        </p>


        <h4 class="mt-5"><b>Donatur ({{ $donation->transfers()->withTrashed()->count() }})</b></h4>
        <hr>

        @foreach($donation->transfers()->withTrashed()->limit(10)->get() as $transfer)
        <div class="row my-3">
          <div class="col-2 pr-0">
            <img src="{{ Avatar::create($transfer->user->name)->toBase64() }}" style="width: 100%">
          </div>
          <div class="col-10">
            <h4 class="text-muted"><b>{{ $transfer->present()->amount_formatted }}</b></h4>
            <p>
              <b>{{ $transfer->user->name }}</b><br>
              <small>{{ $transfer->present()->date_formatted }}</small>
            </p>
          </div>
        </div>
        @endforeach

        @if($donation->transfers()->count() > 10)
        <p class="text-center border-bottom pb-2 text-muted"><b>Dan Masih Banyak Lagi..!!</b></p>
        @endif

			</div>
		</div>
	</div>

</div>
@endsection