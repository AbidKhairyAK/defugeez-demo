@extends('layouts.app')

@section('title', 'Donation Form')

@php
  $amount = [
    'invalid' => $errors->has('amount') ? 'is-invalid' : '',
    'feedback' => $errors->has('amount') ? '<span class="invalid-feedback">'.$errors->first('amount').'</span>' : ''
  ];
  $account_number = [
    'invalid' => $errors->has('account_number') ? 'is-invalid' : '',
    'feedback' => $errors->has('account_number') ? '<span class="invalid-feedback">'.$errors->first('account_number').'</span>' : ''
  ];
  $bank = [
    'invalid' => $errors->has('bank') ? 'is-invalid' : '',
    'feedback' => $errors->has('bank') ? '<span class="invalid-feedback">'.$errors->first('bank').'</span>' : ''
  ];
@endphp

@section('content')
  <div class="container">

    <div class="centered my-3">
      <h5 class="text-center">Anda Akan Berdonasi untuk</h5>
      <h3 class="text-center text-info"><b>{{ $donation->name }}</b></h3>
    </div>

    <div class="row justify-content-center">
      
      <div class="col-md-6">
        <form action="{{ route('transfers.store', $donation->slug) }}" method="post">
          @csrf
          <div class="bg-light p-3 rounded shadow text-center">
            <h4 class="text-dark"><b>Jumlah Donasi</b></h4>
            <p class="small">Masukkan nominal donasi minimal Rp 10.000 dengan kelipatan ribuan.<br>(contoh: 15.000, 50.000)</p>
            <div class="row justify-content-center">
              <div class="form-inline">
                <span class="h4 pr-1">Rp</span>
                <input class="form-control number {{ $amount['invalid'] }}" type="text" name="amount" minlength="4" required>
              </div>
              {!! $amount['feedback'] !!}
            </div>

            <hr>

            <h4 class="text-center text-dark"><b>Nomor Rekening</b></h4>
            <p class="text-center small">silahkan masukkan nomor rekening anda</p>
            <input class="form-control number {{ $account_number['invalid'] }}" type="text" name="account_number" minlength="10" required>
            {!! $account_number['feedback'] !!}

            <hr>

            <h4 class="text-center text-dark"><b>Metode Pembayaran</b></h4>
            <p class="text-center small">silahkan pilih salah satu metode pembayaran yang tersedia</p>
            {!! $account_number['feedback'] !!}
            <ul class="list-group text-left">
              <li class="list-group-item">
                <div class="custom-control custom-radio">
                  <input type="radio" class="custom-control-input {{ $bank['invalid'] }}" id="bank-1" name="bank" value="BCA" required>
                  <label class="custom-control-label" for="bank-1">Transfer Melalui <b>BCA</b></label>
                </div>
              </li>
              <li class="list-group-item">
                <div class="custom-control custom-radio">
                  <input type="radio" class="custom-control-input {{ $bank['invalid'] }}" id="bank-2" name="bank" value="BNI" required>
                  <label class="custom-control-label" for="bank-2">Transfer Melalui <b>BNI</b></label>
                </div>
              </li>
              <li class="list-group-item">
                <div class="custom-control custom-radio">
                  <input type="radio" class="custom-control-input {{ $bank['invalid'] }}" id="bank-3" name="bank" value="BRI" required>
                  <label class="custom-control-label" for="bank-3">Transfer Melalui <b>BRI</b></label>
                </div>
              </li>
              <li class="list-group-item">
                <div class="custom-control custom-radio">
                  <input type="radio" class="custom-control-input {{ $bank['invalid'] }}" id="bank-4" name="bank" value="MANDIRI" required>
                  <label class="custom-control-label" for="bank-4">Transfer Melalui <b>Mandiri</b></label>
                </div>
              </li>
              <li class="list-group-item">
                <div class="custom-control custom-radio">
                  <input type="radio" class="custom-control-input {{ $bank['invalid'] }}" id="bank-5" name="bank" value="OTHER" required>
                  <label class="custom-control-label" for="bank-5">Transfer Melalui <b>Bank Lain</b></label>
                </div>
              </li>
            </ul>

            <div class="modal fade" id="terms" tabindex="-1" role="dialog" aria-labelledby="terms" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ketentuan Berlaku</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <p>
                      Atas sarana teknologi dan layanan yang kami berikan, deFugeez mengenakan biaya senilai 5% dari donasi yang terkumpul.
                    </p>

                    <p>
                      Biaya ini kami gunakan untuk menutup biaya operasional serta pengembangan dan layanan untuk kemudahan menggalang dana dan berdonasi.
                    </p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>

            <div class="input-group my-3">
              <div class="input-group-prepend">
                <div class="input-group-text">
                  <input type="checkbox" id="sk_check" aria-label="Checkbox for following text input" required>
                </div>
              </div>
              <label class="form-control text-left" for="sk_check"><small>Saya setuju dengan <a href="#" class="text-info" data-toggle="modal" data-target="#terms">Syarat & Ketentuan Donasi</a> di deFugeez.com</small></label>
            </div>
          </div>

          <button type="submit" class="btn btn-lg btn-block btn-info shadow mt-3 mb-5"><small><b>DONASI</b></small></button>
        </form>
      </div>
    
    </div>
  </div>
@endsection

@section('script')
<script src="/js/textnumber.js"></script>
@endsection