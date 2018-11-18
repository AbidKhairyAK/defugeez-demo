@extends('app.layouts.app')

@section('title', 'Posko')

@section('style')
<style type="text/css">
  a.section-wrapper {
    color: inherit;
    background: white;
    transition: all 0.5s ease;
  }
  a.section-wrapper:hover {
    text-decoration: none !important;
    color: inherit;
    transform: scale(1.05,1.05);
  }
</style>
@endsection

@section('content')
<div class="container">

	<div class="section">

		<div class="section-separator">
			<hr class="hr-thick">
			<hr class="hr-thin">
			<h3>Info Bencana</h3>
		</div>

		<div class="section-wrapper col-sm-12 rounded bg-light shadow">

			<div class="section-content col-sm-12">
				<div class="row">
					<div class="col-sm-6">
						<table class="table table-hover">
							<tr>
								<th>Nama Bencana</th>
								<td class="text-right">Gempa</td>
							</tr>
							<tr>
								<th>Lokasi Bencana</th>
								<td class="text-right">Gravetz 20, 966</td>
							</tr>
							<tr>
								<th>Status</th>
								<td class="text-right">Aktif</td>
							</tr>
						</table>
					</div>
					<div class="col-sm-6">
						<table class="table table-hover">
							<tr>
								<th>Tingkat Kerusakan</th>
								<td class="text-right">Parah</td>
							</tr>
							<tr>
								<th>Deskripsi</th>
								<td class="text-right">-</td>
							</tr>
						</table>
					</div>
				</div>
			</div>

		</div>
	</div>

  <div class="section">
		<div class="section-separator">
			<hr class="hr-thick">
			<hr class="hr-thin">
			<h3>Peta Lokasi Bencana</h3>
		</div>

		<div id="map-wrapper" class="section-wrapper col-sm-12 rounded bg-light shadow">
			<div id="map"></div>
		</div>
	</div>

  <div class="section">

		<div class="section-separator">
			<hr class="hr-thick">
			<hr class="hr-thin">
			<h3>Daftar Posko</h3>
		</div>

    <div class="row">

      <div class="col-md-6">
        <a href="{{ url('/refugees') }}" class="section-wrapper col-sm-12 d-block clearfix mb-4 shadow-sm">
          <div class="section-content">
            <h5 class="mb-2"><b>Posko Maguwoharjo</b></h5>
            <p>Jl. Kepuhsari, Jenengan, Maguwoharjo, Kec. Depok</p>
            <div class="float-left">
              <p class="mb-auto">Jumlah Pengungsi</p>
              <h5><b class="text-info">300</b> / 400 jiwa</h5>
            </div>
            <div class="float-right mt-4">
              <p class="btn btn-info btn-sm">Status: Masih Aktif</p>
            </div>
          </div>
        </a>
      </div>

      <div class="col-md-6">
        <a href="{{ url('/refugees') }}" class="section-wrapper col-sm-12 d-block clearfix mb-4 shadow-sm">
          <div class="section-content">
            <h5 class="mb-2"><b>Posko Maguwoharjo</b></h5>
            <p>Jl. Kepuhsari, Jenengan, Maguwoharjo, Kec. Depok</p>
            <div class="float-left">
              <p class="mb-auto">Jumlah Pengungsi</p>
              <h5><b class="text-info">300</b> / 400 jiwa</h5>
            </div>
            <div class="float-right mt-4">
              <p class="btn btn-info btn-sm">Status: Masih Aktif</p>
            </div>
          </div>
        </a>
      </div>

      <div class="col-md-6">
        <a href="{{ url('/refugees') }}" class="section-wrapper col-sm-12 d-block clearfix mb-4 shadow-sm">
          <div class="section-content">
            <h5 class="mb-2"><b>Posko Maguwoharjo</b></h5>
            <p>Jl. Kepuhsari, Jenengan, Maguwoharjo, Kec. Depok</p>
            <div class="float-left">
              <p class="mb-auto">Jumlah Pengungsi</p>
              <h5><b class="text-info">300</b> / 400 jiwa</h5>
            </div>
            <div class="float-right mt-4">
              <p class="btn btn-warning btn-sm">Status: Tidak Aktif</p>
            </div>
          </div>
        </a>
      </div>

      <div class="col-md-6">
        <a href="{{ url('/refugees') }}" class="section-wrapper col-sm-12 d-block clearfix mb-4 shadow-sm">
          <div class="section-content">
            <h5 class="mb-2"><b>Posko Maguwoharjo</b></h5>
            <p>Jl. Kepuhsari, Jenengan, Maguwoharjo, Kec. Depok</p>
            <div class="float-left">
              <p class="mb-auto">Jumlah Pengungsi</p>
              <h5><b class="text-warning">500</b> / 400 jiwa</h5>
            </div>
            <div class="float-right mt-4">
              <p class="btn btn-info btn-sm">Status: Masih Aktif</p>
            </div>
          </div>
        </a>
      </div>

      <div class="col-md-6">
        <a href="{{ url('/refugees') }}" class="section-wrapper col-sm-12 d-block clearfix mb-4 shadow-sm">
          <div class="section-content">
            <h5 class="mb-2"><b>Posko Maguwoharjo</b></h5>
            <p>Jl. Kepuhsari, Jenengan, Maguwoharjo, Kec. Depok</p>
            <div class="float-left">
              <p class="mb-auto">Jumlah Pengungsi</p>
              <h5><b class="text-info">300</b> / 400 jiwa</h5>
            </div>
            <div class="float-right mt-4">
              <p class="btn btn-info btn-sm">Status: Masih Aktif</p>
            </div>
          </div>
        </a>
      </div>

      <div class="col-md-6">
        <a href="{{ url('/refugees') }}" class="section-wrapper col-sm-12 d-block clearfix mb-4 shadow-sm">
          <div class="section-content">
            <h5 class="mb-2"><b>Posko Maguwoharjo</b></h5>
            <p>Jl. Kepuhsari, Jenengan, Maguwoharjo, Kec. Depok</p>
            <div class="float-left">
              <p class="mb-auto">Jumlah Pengungsi</p>
              <h5><b class="text-info">300</b> / 400 jiwa</h5>
            </div>
            <div class="float-right mt-4">
              <p class="btn btn-warning btn-sm">Status: Tidak Aktif</p>
            </div>
          </div>
        </a>
      </div>

      <div class="col-md-6">
        <a href="{{ url('/refugees') }}" class="section-wrapper col-sm-12 d-block clearfix mb-4 shadow-sm">
          <div class="section-content">
            <h5 class="mb-2"><b>Posko Maguwoharjo</b></h5>
            <p>Jl. Kepuhsari, Jenengan, Maguwoharjo, Kec. Depok</p>
            <div class="float-left">
              <p class="mb-auto">Jumlah Pengungsi</p>
              <h5><b class="text-info">300</b> / 400 jiwa</h5>
            </div>
            <div class="float-right mt-4">
              <p class="btn btn-info btn-sm">Status: Masih Aktif</p>
            </div>
          </div>
        </a>
      </div>

      <div class="col-md-6">
        <a href="{{ url('/refugees') }}" class="section-wrapper col-sm-12 d-block clearfix mb-4 shadow-sm">
          <div class="section-content">
            <h5 class="mb-2"><b>Posko Maguwoharjo</b></h5>
            <p>Jl. Kepuhsari, Jenengan, Maguwoharjo, Kec. Depok</p>
            <div class="float-left">
              <p class="mb-auto">Jumlah Pengungsi</p>
              <h5><b class="text-info">300</b> / 400 jiwa</h5>
            </div>
            <div class="float-right mt-4">
              <p class="btn btn-info btn-sm">Status: Masih Aktif</p>
            </div>
          </div>
        </a>
      </div>

    </div>

	</div>

  <div class="pagination-wrap">
    <ul class="pagination pagination-v2 text-center">
      <li><a href="#">«</a></li>
      <li><a href="#">1</a></li>
      <li><a class="active" href="#">2</a></li>
      <li><a href="#">3</a></li>
      <li><a href="#">4</a></li>
      <li><a href="#">»</a></li>
    </ul>
  </div>

</div>
@endsection
