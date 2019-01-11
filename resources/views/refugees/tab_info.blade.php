<div id="info" class="tab-pane {{ session('refugees_tab') ? 'fade' : 'active' }}">

  <div class="centered my-3">
    <h3 class="text-center">Info Posko</h3>
  </div>

  <div class="bg-light p-3 mb-5 rounded shadow">

    <h4 class="border-bottom-0 mb-3"><b>{{ $post->name }}</b></h4>

    <div class="row">
        <div class="col-lg-6">
          <table class="table table-hover">
            <tr>
              <th>Alamat</th>
              <td class="text-right">{{ $post->address }}, {{ $post->village->name }}, {{ $post->district->name }}, {{ $post->regency->name }}</td>
            </tr>
            <tr>
              <th>Kapasitas</th>
              <td class="text-right">{{ $post->capacity }} Jiwa</td>
            </tr>
            <tr>
              <th>Jumlah Barak</th>
              <td class="text-right">{{ $post->barracks }}</td>
            </tr>
          </table>
        </div>

        <div class="col-lg-6">
          <table class="table table-hover">
            <tr>
              <th>Penanggung Jawab Posko</th>
              <td class="text-right">{{ $post->pic }}</td>
            </tr>
            <tr>
              <th>Pembuat Data Posko</th>
              <td class="text-right">{{ $post->user->name }}</td>
            </tr>
            <tr>
              <th>Status</th>
              <td class="text-right">{{ $post->statusName() }}</td>
            </tr>
          </table>
        </div>

        <div class="col-lg-12">
          <table class="table table-hover">
            <tr>
              <th>Deskripsi</th>
            </tr>
            <tr>
              <td class="border-top-0">
                <p>{{ $post->description ?: '-' }}</p>
              </td>
            </tr>
            <tr>
              <th>Lokasi Peta <button class="btn btn-sm locate">Bandingkan lokasi anda</button></th>
            </tr>
            <tr>
              <td>
                <div id="mapid" style="height: 300px;"></div>
              </td>
            </tr>
          </table>
        </div>
      </div>
  </div>
</div>