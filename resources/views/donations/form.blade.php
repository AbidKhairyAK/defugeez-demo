@extends('layouts.app')

@section('title', 'Form Donations')

@section('content')
  <div class="container">

    <div class="centered my-3">
      <h5 class="text-center">Anda Akan Berdonasi untuk</h5>
      <h3 class="text-center text-primary"><b>Bangun Masjid Rusak di Palu karena Gempa</b></h3>
    </div>

    <div class="row justify-content-center">
      <div class="bg-light p-3 rounded shadow col-md-6">
        <h3 class="text-center text-secondary">Jumlah Donasi</h3>
        <p class="text-center">Masukkan nominal donasi minimal Rp 10.000 dengan kelipatan ribuan (contoh: 15.000, 50.000)</p>
        <div class="row justify-content-center border-bottom pb-3">
          <div class="form-inline">
            <span class="h4 pr-1">Rp</span>
            <input class="form-control" type="text" name="" value="">
          </div>
        </div>
        <div class="text-center">
          <h4 class="pt-3 text-secondary"><b>Dukungan</b></h4>
          <span class="form-info">
            Teks saja, tanpa URL/kode html, dan emoticon.
          </span>
          <textarea class="form-control" type="text" name="" value=""></textarea>
          <a href="{{ route('donations.payment') }}" class="btn btn-primary px-5 mt-3">Lanjut</a>
        </div>

      </div>
    </div>
    </div>
  </div>
@endsection
