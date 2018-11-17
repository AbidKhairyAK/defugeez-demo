@extends('app.layouts.app')

@section('title', 'Example')

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
          <div class="card flex-md-row mb-4 shadow-sm h-md-250">
             <div class="card-body d-flex flex-column align-items-start">
                <h5>
                  <strong class="d-inline-block mb-2 text-primary">Posko Maguwoharjo</strong>
                </h5>
                <h6 class="mb-3">
                   <a class="text-dark" href="#">Jl. Kepuhsari, Jenengan, Maguwoharjo, Kec. Depok</a>
                </h6>
                <div class="pull-left">
                  <p class="card-text mb-auto">Jumlah Pengungsi
                  <h5><a class="text-primary" href="#"><b>300</b></a> / 400 jiwa</h5>
                  </p>
                </div>
                <div class="pull-right">
                  <a class="btn btn-success btn-sm" role="button" href="#">Status Masih Aktif</a>
                </div>
             </div>
          </div>
       </div>

       <div class="col-md-6">
          <div class="card flex-md-row mb-4 shadow-sm h-md-250">
             <div class="card-body d-flex flex-column align-items-start">
                <h5>
                  <strong class="d-inline-block mb-2 text-primary">Posko Maguwoharjo</strong>
                </h5>
                <h6 class="mb-3">
                   <a class="text-dark" href="#">Jl. Kepuhsari, Jenengan, Maguwoharjo, Kec. Depok</a>
                </h6>
                <div class="pull-left">
                  <p class="card-text mb-auto">Jumlah Pengungsi
                  <h5><a class="text-primary" href="#"><b>300</b></a> / 400 jiwa</h5>
                  </p>
                </div>
                <div class="pull-right">
                  <a class="btn btn-success btn-sm" role="button" href="#">Status Masih Aktif</a>
                </div>
             </div>
          </div>
       </div>
    </div>

    <div class="row">
     <div class="col-md-6">
        <div class="card flex-md-row mb-4 shadow-sm h-md-250">
           <div class="card-body d-flex flex-column align-items-start">
              <h5>
                <strong class="d-inline-block mb-2 text-primary">Posko Maguwoharjo</strong>
              </h5>
              <h6 class="mb-3">
                 <a class="text-dark" href="#">Jl. Kepuhsari, Jenengan, Maguwoharjo, Kec. Depok</a>
              </h6>
              <div class="pull-left">
                <p class="card-text mb-auto">Jumlah Pengungsi
                <h5><a class="text-primary" href="#"><b>300</b></a> / 400 jiwa</h5>
                </p>
              </div>
              <div class="pull-right">
                <a class="btn btn-success btn-sm" role="button" href="#">Status Masih Aktif</a>
              </div>
           </div>
        </div>
     </div>

     <div class="col-md-6">
        <div class="card flex-md-row mb-4 shadow-sm h-md-250">
           <div class="card-body d-flex flex-column align-items-start">
              <h5>
                <strong class="d-inline-block mb-2 text-primary">Posko Maguwoharjo</strong>
              </h5>
              <h6 class="mb-3">
                 <a class="text-dark" href="#">Jl. Kepuhsari, Jenengan, Maguwoharjo, Kec. Depok</a>
              </h6>
              <div class="pull-left">
                <p class="card-text mb-auto">Jumlah Pengungsi
                <h5><a class="text-primary" href="#"><b>300</b></a> / 400 jiwa</h5>
                </p>
              </div>
              <div class="pull-right">
                <a class="btn btn-success btn-sm" role="button" href="#">Status Masih Aktif</a>
              </div>
           </div>
        </div>
     </div>
  </div>

  <div class="row">
   <div class="col-md-6">
      <div class="card flex-md-row mb-4 shadow-sm h-md-250">
         <div class="card-body d-flex flex-column align-items-start">
            <h5>
              <strong class="d-inline-block mb-2 text-primary">Posko Maguwoharjo</strong>
            </h5>
            <h6 class="mb-3">
               <a class="text-dark" href="#">Jl. Kepuhsari, Jenengan, Maguwoharjo, Kec. Depok</a>
            </h6>
            <div class="pull-left">
              <p class="card-text mb-auto">Jumlah Pengungsi
              <h5><a class="text-primary" href="#"><b>300</b></a> / 400 jiwa</h5>
              </p>
            </div>
            <div class="pull-right">
              <a class="btn btn-success btn-sm" role="button" href="#">Status Masih Aktif</a>
            </div>
         </div>
      </div>
   </div>

   <div class="col-md-6">
      <div class="card flex-md-row mb-4 shadow-sm h-md-250">
         <div class="card-body d-flex flex-column align-items-start">
            <h5>
              <strong class="d-inline-block mb-2 text-primary">Posko Maguwoharjo</strong>
            </h5>
            <h6 class="mb-3">
               <a class="text-dark" href="#">Jl. Kepuhsari, Jenengan, Maguwoharjo, Kec. Depok</a>
            </h6>
            <div class="pull-left">
              <p class="card-text mb-auto">Jumlah Pengungsi
              <h5><a class="text-primary" href="#"><b>0</b></a> / 400 jiwa</h5>
              </p>
            </div>
            <div class="pull-right">
              <a class="btn btn-danger btn-sm" role="button" href="#">Status Tidak Aktif</a>
            </div>
         </div>
      </div>
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
</div>
@endsection
