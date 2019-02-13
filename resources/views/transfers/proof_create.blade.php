@extends('layouts.app')

@section('title', 'Proof Form')

@php
  $proof_image = [
    'feedback' => $errors->has('proof_image') ? '<span class="invalid-feedback">'.$errors->first('proof_image').'</span>' : ''
  ];
@endphp

@section('content')
  <div class="container">

    <div class="centered my-3">
      <h5 class="text-center">Form Bukti Transfer</h5>
      <h3 class="text-center text-info"><b>{{ $transfer->donation->name }}</b></h3>
    </div>

    <div class="row justify-content-center">
      
      <div class="col-md-6">
        <form action="{{ route('proofs.store', [$donation->slug, $transfer->slug]) }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="bg-light p-3 rounded shadow text-center">
            <h4 class="text-dark"><b>Gambar Bukti</b></h4>
            <p class="small">masukkan foto struk atm atau screenshot aplikasi pengiriman uang</p>
            
            <div class="fileinput fileinput-new" data-provides="fileinput">
              <div class="fileinput-new thumbnail">
                <img src="https://via.placeholder.com/700x300?text=Masukkan+Foto+Atau+Screenshot" alt="proof" class="w-100">
              </div>
              <div class="fileinput-preview fileinput-exists thumbnail w-100"></div>
              <div>
                <span class="btn btn-success btn-file">
                  <span class="fileinput-new">Pilih Gambar</span>
                  <span class="fileinput-exists">Ubah</span>
                  <input type="file" name="proof_image" accept="image/*" required>
                </span>
                <a href="#" class="btn btn-secondary fileinput-exists" data-dismiss="fileinput">Hapus</a>
              </div>
            </div>

            {!! $proof_image['feedback'] !!}

          </div>

          <button type="submit" class="btn btn-lg btn-block btn-info shadow mt-3 mb-5"><small><b>KIRIM BUKTI</b></small></button>
        </form>
      </div>
    
    </div>
  </div>
@endsection

@section('script')
<script src="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/js/jasny-bootstrap.min.js"></script>
<script src="/js/textnumber.js"></script>
@endsection

@section('style')
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css">
@endsection