	@php
		$status = [
			'invalid' => $errors->has('status') ? 'is-invalid' : null,
			'feedback' => $errors->has('status') ? '<span class="invalid-feedback">'.$errors->first('status').'</span>' : null
		];
		$name = [
			'invalid' => $errors->has('name') ? 'is-invalid' : null,
			'feedback' => $errors->has('name') ? '<span class="invalid-feedback">'.$errors->first('name').'</span>' : null
		];
		$province_id = [
			'feedback' => $errors->has('province_id') ? $errors->first('province_id') : null
		];
		$regency_id = [
			'feedback' => $errors->has('regency_id') ? $errors->first('regency_id') : null
		];
		$damage = [
			'invalid' => $errors->has('damage') ? 'is-invalid' : null,
			'feedback' => $errors->has('damage') ? '<span class="invalid-feedback">'.$errors->first('damage').'</span>' : null
		];
		$latitude = [
			'invalid' => $errors->has('latitude') ? 'is-invalid' : null,
		];
		$longitude = [
			'invalid' => $errors->has('longitude') ? 'is-invalid' : null,
		];
		$coordinate = [
			'feedback' => ($errors->has('latitude') || $errors->has('longitude')) ? '<span class="invalid-feedback">Titik Koordinat wajib ditentukan!</span>' : null
		];

		$current_province = $event->exists ? $event->province_id : null;
		$current_regency = $event->exists ? $event->regency_id : null;
		$marker = $event->exists ? "L.marker([".$event->latitude.",".$event->longitude."]).addTo(mymap)" : null;

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

	<div id="vue">
		<location-form 
			display_province="true" 
			display_regency="true"
			error_province="{{ $province_id['feedback'] }}"
			error_regency="{{ $regency_id['feedback'] }}"
			province_id="{{ $current_province }}"
			regency_id="{{ $current_regency }}"
			grid="col-sm-6"
		></location-form>
	</div>

	<div class="form-group">
		{!! Form::label('coordinate', 'Koordinat', ['class' => 'font-weight-bold']) !!}
		<div id="mapid" style="height: 300px; width: 100%;"></div>
		{!! Form::hidden('latitude', null, ['class' => 'form-control '.$latitude['invalid'], 'id' => 'latitude', 'required']) !!}
		{!! Form::hidden('longitude', null, ['class' => 'form-control '.$longitude['invalid'], 'id' => 'longitude', 'required']) !!}
		{!! $coordinate['feedback'] !!}
	</div>

	<div class="form-group">
		{!! Form::label('damage', 'Tingkat Kerusakan', ['class' => 'font-weight-bold']) !!}
		{!! Form::select('damage', 
		['' => '', 1 => 'Sangat Parah', 'Parah', 'Sedang', 'Ringan'], 
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
			<a href="{{ route('events.index') }}" class="btn btn-secondary"> Cancel </a>
			<button type="submit" class="btn btn-info">Submit</button>
		</div>
	</div>

@section('script')
<script src="/js/app.js"></script>
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

  var marker = {{ $marker }}

  mymap.on('click', function(e){
    var lat = e.latlng.lat;
    var lng = e.latlng.lng;

    if (marker) {
      mymap.removeLayer(marker);
    }

    marker = L.marker([lat, lng]).addTo(mymap);

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