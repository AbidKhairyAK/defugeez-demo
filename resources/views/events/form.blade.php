	@php
		$status = [
			'invalid' => $errors->has('status') ? 'is-invalid' : '',
			'feedback' => $errors->has('status') ? '<span class="invalid-feedback">'.$errors->first('status').'</span>' : ''
		];
		$name = [
			'invalid' => $errors->has('name') ? 'is-invalid' : '',
			'feedback' => $errors->has('name') ? '<span class="invalid-feedback">'.$errors->first('name').'</span>' : ''
		];
		$province_id = [
			'invalid' => $errors->has('province_id') ? 'is-invalid' : '',
			'feedback' => $errors->has('province_id') ? '<span class="invalid-feedback">'.$errors->first('province_id').'</span>' : ''
		];
		$regency_id = [
			'invalid' => $errors->has('regency_id') ? 'is-invalid' : '',
			'feedback' => $errors->has('regency_id') ? '<span class="invalid-feedback">'.$errors->first('regency_id').'</span>' : ''
		];
		$damage = [
			'invalid' => $errors->has('damage') ? 'is-invalid' : '',
			'feedback' => $errors->has('damage') ? '<span class="invalid-feedback">'.$errors->first('damage').'</span>' : ''
		];
		$latitude = [
			'invalid' => $errors->has('latitude') ? 'is-invalid' : '',
			'feedback' => $errors->has('latitude') ? '<span class="invalid-feedback">'.$errors->first('latitude').'</span>' : ''
		];
		$longitude = [
			'invalid' => $errors->has('longitude') ? 'is-invalid' : '',
			'feedback' => $errors->has('longitude') ? '<span class="invalid-feedback">'.$errors->first('longitude').'</span>' : ''
		];
	@endphp

	@if($event->exists)
	<div class="form-group">
		{!! Form::label('status', 'Status :', ['class' => 'label mr-4 font-weight-bold']) !!}
		<div class="custom-control custom-radio custom-control-inline">
			{!! Form::radio('status', '1', null, ['class' => 'custom-control-input '.$status['invalid'], 'id' => '1', 'required']) !!}
			{!! Form::label('1', 'Aktif', ['class' => 'custom-control-label']) !!}
		</div>
		<div class="custom-control custom-radio custom-control-inline">
			{!! Form::radio('status', '0', null, ['class' => 'custom-control-input ', 'id' => '0', 'required']) !!}
			{!! Form::label('0', 'Nonaktif', ['class' => 'custom-control-label']) !!}
		</div>
		{!! $status['feedback'] !!}
	</div>
	@endif

	<div class="form-group">
		{!! Form::label('name', 'Nama Peristiwa', ['class' => 'font-weight-bold']) !!}
		{!! Form::text('name', null, ['class' => 'form-control '.$name['invalid'], 'id' => 'name', 'required']) !!}
		{!! $name['feedback'] !!}
	</div>

	<div class="form-group">
		{!! Form::label('province_id', 'Provinsi', ['class' => 'font-weight-bold']) !!}
		{!! Form::select('province_id', 
		['11' => 'provinsi1', '12' => 'provinsi2'], 
		null,
		['class' => 'form-control select2'.$province_id['invalid'], 'id' => 'province_id', 'required']) !!}
		{!! $province_id['feedback'] !!}
	</div>

	<div class="form-group">
		{!! Form::label('regency_id', 'Kabupaten', ['class' => 'font-weight-bold']) !!}
		{!! Form::select('regency_id', 
		['1101' => 'kabupaten1', '1102' => 'kabupaten2'], 
		null,
		['class' => 'form-control select2'.$regency_id['invalid'], 'id' => 'regency_id', 'required']) !!}
		{!! $regency_id['feedback'] !!}
	</div>

	<div class="form-group">
		{!! Form::label('coordinate', 'Koordinat', ['class' => 'font-weight-bold']) !!}
		<div id="mapid" style="height: 300px; width: 100%;"></div>
		{!! Form::hidden('latitude', null, ['class' => 'form-control '.$latitude['invalid'], 'id' => 'latitude', 'required']) !!}
		{!! Form::hidden('longitude', null, ['class' => 'form-control '.$longitude['invalid'], 'id' => 'longitude', 'required']) !!}
		{!! $latitude['feedback'] !!}
		{!! $longitude['feedback'] !!}
	</div>

	<div class="form-group">
		{!! Form::label('damage', 'Tingkat Kerusakan', ['class' => 'font-weight-bold']) !!}
		{!! Form::select('damage', 
		[1 => 'Sangat Parah', 2 => 'Parah', 3 => 'Medium'], 
		null,
		['class' => 'form-control select2'.$damage['invalid'], 'id' => 'damage', 'required']) !!}
		{!! $damage['feedback'] !!}
	</div>

	<div class="form-group">
		{!! Form::label('description', 'Keterangan Tambahan', ['class' => 'font-weight-bold']) !!}<span class="small text-muted">  (tidak wajib)</span>
		{!! Form::textarea('description', null, ['class' => 'form-control', 'id' => 'description']) !!}
	</div>
	<div class="d-flex justify-content-center">
		<div>
			<a href="#" class="btn btn-secondary"> Cancel </a>
			<button type="submit" class="btn btn-info">Submit</button>
		</div>
	</div>

@section('script')
<script type="text/javascript">
  var mymap = L.map('mapid', {
      center: [-1.0878905, 117.7075195],
      zoom: 5,
      minZoom: 5,
      gestureHandling: true,
  });

  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
  }).addTo(mymap);

  var marker = {};

  mymap.on('click', function(e){
    var lat = e.latlng.lat;
    var lng = e.latlng.lng;

    if (marker) {
      mymap.removeLayer(marker);
    }

    marker = L.marker([lat, lng])
    .addTo(mymap)

    $('#latitude').val(lat);
    $('#longitude').val(lng);
  });
</script>
@endsection

@section('style')
<style type="text/css">
	#mapid:hover {
		cursor: crosshair;
	}
</style>
@endsection