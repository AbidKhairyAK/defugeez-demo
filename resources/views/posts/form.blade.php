	@php
		$name = [
			'invalid' => $errors->has('name') ? 'is-invalid' : '',
			'feedback' => $errors->has('name') ? '<span class="invalid-feedback">'.$errors->first('name').'</span>' : ''
		];
		$status = [
			'invalid' => $errors->has('status') ? 'is-invalid' : '',
			'feedback' => $errors->has('status') ? '<span class="invalid-feedback">'.$errors->first('status').'</span>' : ''
		];
		$pic = [
			'invalid' => $errors->has('pic') ? 'is-invalid' : '',
			'feedback' => $errors->has('pic') ? '<span class="invalid-feedback">'.$errors->first('pic').'</span>' : ''
		];
		$address = [
			'invalid' => $errors->has('address') ? 'is-invalid' : '',
			'feedback' => $errors->has('address') ? '<span class="invalid-feedback">'.$errors->first('address').'</span>' : ''
		];
		$province_id = [
			'invalid' => $errors->has('province_id') ? 'is-invalid' : '',
			'feedback' => $errors->has('province_id') ? '<span class="invalid-feedback">'.$errors->first('province_id').'</span>' : ''
		];
		$regency_id = [
			'invalid' => $errors->has('regency_id') ? 'is-invalid' : '',
			'feedback' => $errors->has('regency_id') ? '<span class="invalid-feedback">'.$errors->first('regency_id').'</span>' : ''
		];
		$district_id = [
			'invalid' => $errors->has('district_id') ? 'is-invalid' : '',
			'feedback' => $errors->has('district_id') ? '<span class="invalid-feedback">'.$errors->first('district_id').'</span>' : ''
		];
		$village_id = [
			'invalid' => $errors->has('village_id') ? 'is-invalid' : '',
			'feedback' => $errors->has('village_id') ? '<span class="invalid-feedback">'.$errors->first('village_id').'</span>' : ''
		];
		$capacity = [
			'invalid' => $errors->has('capacity') ? 'is-invalid' : '',
			'feedback' => $errors->has('capacity') ? '<span class="invalid-feedback">'.$errors->first('capacity').'</span>' : ''
		];
		$barracks = [
			'invalid' => $errors->has('barracks') ? 'is-invalid' : '',
			'feedback' => $errors->has('barracks') ? '<span class="invalid-feedback">'.$errors->first('barracks').'</span>' : ''
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

	@if($post->exists)
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
		{!! Form::label('name', 'Nama Posko', ['class' => 'font-weight-bold']) !!}
		{!! Form::text('name', null, ['class' => 'form-control '.$name['invalid'], 'id' => 'name', 'required']) !!}
		{!! $name['feedback'] !!}
	</div>

	<div class="form-group">
		{!! Form::label('pic', 'Nama Penanggung Jawab', ['class' => 'font-weight-bold']) !!}
		{!! Form::text('pic', null, ['class' => 'form-control '.$pic['invalid'], 'id' => 'pic', 'required']) !!}
		{!! $name['feedback'] !!}
	</div>

	<div class="form-group">
		{!! Form::label('address', 'Alamat', ['class' => 'font-weight-bold']) !!}<span class="small text-muted"></span>
		{!! Form::text('address', null, ['class' => 'form-control', 'id' => 'address', 'required']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('province_id', 'Provinsi', ['class' => 'font-weight-bold']) !!}
		{!! Form::select('province_id', [$event->province_id => $event->province->name], null, 
		['class' => 'form-control select2'.$province_id['invalid'], 'id' => 'province_id', 'required']) !!}
		{!! $province_id['feedback'] !!}
	</div>

	<div class="form-group">
		{!! Form::label('regency_id', 'Kabupaten', ['class' => 'font-weight-bold']) !!}
		{!! Form::select('regency_id', [$event->regency_id => $event->regency->name], null,
		['class' => 'form-control select2'.$regency_id['invalid'], 'id' => 'regency_id', 'required']) !!}
		{!! $regency_id['feedback'] !!}
	</div>

	<div class="form-group">
		{!! Form::label('district_id', 'Kecamatan', ['class' => 'font-weight-bold']) !!}
		{!! Form::select('district_id', 
		['' => '', '1101010' => 'kecamatan1', '1101020' => 'kecamatan2'], 
		null,
		['class' => 'form-control select2'.$district_id['invalid'], 'id' => 'district_id', 'required']) !!}
		{!! $district_id['feedback'] !!}
	</div>

	<div class="form-group">
		{!! Form::label('village_id', 'Kelurahan', ['class' => 'font-weight-bold']) !!}
		{!! Form::select('village_id', 
		['' => '', '1101010001' => 'kelurahan1', '1101010002' => 'kelurahan2'], 
		null,
		['class' => 'form-control select2'.$village_id['invalid'], 'id' => 'village_id', 'required']) !!}
		{!! $village_id['feedback'] !!}
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
		{!! Form::label('capacity', 'Kapasitas', ['class' => 'font-weight-bold']) !!}
		{!! Form::number('capacity', null, ['class' => 'form-control', 'id' => 'capacity', 'required']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('barracks', 'Jumlah Barak', ['class' => 'font-weight-bold']) !!}
		{!! Form::number('barracks', null, ['class' => 'form-control', 'id' => 'barracks', 'required']) !!}
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
      center: [{{ $event->latitude }}, {{ $event->longitude }}],
      zoom: 10,
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