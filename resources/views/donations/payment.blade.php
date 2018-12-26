@extends('layouts.app')

@section('title', 'Payment Donations')

@section('content')
  <div class="container">

    <div class="centered my-3">
      <h5 class="text-center">Anda Akan Berdonasi untuk</h5>
      <h3 class="text-center text-primary"><b>Bangun Masjid Rusak di Palu karena Gempa</b></h3>
    </div>

    <div class="row justify-content-center">
      <div class="bg-light p-3 rounded shadow col-md-6">
        <h3 class="text-center text-secondary"><b>Lengkapi Indentitas</b></h3>
        <div class="row justify-content-center border-bottom pb-3">
            <div class="col-md-6">
              <input class="form-control" type="text" name="" value="" placeholder="Nama Lengkap">
            </div>
            <div class="col-md-6">
              <input class="form-control" type="text" name="" value="" placeholder="Alamat Email">
            </div>
            <div class="col-sm-12 mt-3">
              <input class="form-control" type="text" name="" value="" placeholder="Alamat Email">
            </div>
          </div>
        <div class="">
          <h4 class="pt-3 text-secondary text-center"><b>Metode Pembayaran</b></h4>
          <ul class="list-group">
            <li class="list-group-item">
              <div class="custom-control custom-radio">
                <input type="radio" class="custom-control-input" id="defaultGroupExample1" name="groupOfDefaultRadios">
                <label class="custom-control-label" for="defaultGroupExample1">Transfer <b>BCA</b></label>
              </div>
            </li>
            <li class="list-group-item">
              <div class="custom-control custom-radio">
                <input type="radio" class="custom-control-input" id="defaultGroupExample2" name="groupOfDefaultRadios">
                <label class="custom-control-label" for="defaultGroupExample2">Transfer <b>BNI</b></label>
              </div>
            </li>
            <li class="list-group-item">
              <div class="custom-control custom-radio">
                <input type="radio" class="custom-control-input" id="defaultGroupExample3" name="groupOfDefaultRadios">
                <label class="custom-control-label" for="defaultGroupExample3">Transfer <b>BRI</b></label>
              </div>
            </li>
          </ul>
        </div>

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
              <input type="checkbox" id="s&k" aria-label="Checkbox for following text input">
            </div>
          </div>
          <label class="form-control" for="s&k"><small>Saya setuju dengan <a href="#" class="text-primary" data-toggle="modal" data-target="#exampleModal">Syarat & Ketentuan Donasi</a> di deFugeez.com</small></label>
        </div>
      </div>
    </div>

    <div class="row justify-content-center">
      <a href="{{ route('donations.summary') }}" class="btn btn-primary px-5 mt-3 col-sm-6 mb-5 font-weight-bold py-3">Lanjut</a>
    </div>

    </div>
  </div>
@endsection
