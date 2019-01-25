<div id="summary" class="tab-pane {{ session('refugees_tab') == 'summary' ? 'active' : 'fade' }}">
  <div class="centered my-3">
    <h3 class="text-center">- Ringkasan Data Posko -</h3>
  </div>

  <div class="bg-light p-3 mb-4 shadow">
    <h5 class="text-center mb-3">&laquo; Berdasarkan Kapasitas &raquo;</h5>
    <div class="progress" style="height: 40px;">
      <?php
        $count = $refugees->count();
        $capacity = $post->capacity;
        $percent = round(($count / $capacity) * 100);
        if ($percent < 30) {
          $bg = 'success';
        } else if ($percent < 60) {
          $bg = 'info';
        } else if ($percent < 90) {
          $bg = 'warning';
        } else {
          $bg = 'danger';
        }
      ?>
      <div class="progress-bar bg-{{ $bg }}" style="height: 40px;width:{{ $percent.'%' }}"><h6 class="m-0"><b>{{ $count }} Jiwa / {{ $capacity }} Kuota</b></h6></div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-6">
      <div class="bg-light p-3 mb-4 shadow">
        <h5 class="text-center mb-3">&laquo; Berdasarkan Gender & Usia &raquo;</h5>
        <canvas id="gender" height="150"></canvas>
      </div>
    </div>
    <div class="col-md-6">
      <div class="bg-light p-3 mb-4 shadow">
        <h5 class="text-center mb-3">&laquo; Berdasarkan Kesehatan &raquo;</h5>
        <canvas id="health" height="150"></canvas>
      </div>
    </div>
  </div>
</div>
