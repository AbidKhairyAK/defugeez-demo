	@php
		$name = [
			'invalid' => $errors->has('name') ? 'is-invalid' : '',
			'feedback' => $errors->has('name') ? '<span class="invalid-feedback">'.$errors->first('name').'</span>' : ''
		];
		$status = [
			'invalid' => $errors->has('status') ? 'is-invalid' : '',
			'feedback' => $errors->has('status') ? '<span class="invalid-feedback">'.$errors->first('status').'</span>' : ''
		];
		$type = [
			'invalid' => $errors->has('type') ? 'is-invalid' : '',
			'feedback' => $errors->has('type') ? '<span class="invalid-feedback">'.$errors->first('type').'</span>' : ''
		];
	@endphp

	<div class="form-group">
		{!! Form::label('type', 'Tipe Kebutuhan :', ['class' => 'label mr-4 font-weight-bold']) !!}
		<div class="custom-control custom-radio custom-control-inline">
			{!! Form::radio('type', '0', null, ['class' => 'custom-control-input type '.$type['invalid'], 'id' => 'type-0', 'required']) !!}
			{!! Form::label('type-0', 'Permintaan Kebutuhan', ['class' => 'custom-control-label']) !!}
		</div>
		<div class="custom-control custom-radio custom-control-inline">
			{!! Form::radio('type', '1', null, ['class' => 'custom-control-input type '.$type['invalid'], 'id' => 'type-1', 'required']) !!}
			{!! Form::label('type-1', 'Kebutuhan Yang Diterima', ['class' => 'custom-control-label']) !!}
		</div>
		{!! $type['feedback'] !!}
	</div>

	<div class="form-group">
		{!! Form::label('name', 'Nama Kebutuhan', ['class' => 'font-weight-bold']) !!}
		{!! Form::text('name', null, ['class' => 'form-control '.$name['invalid'], 'id' => 'name', 'required']) !!}
		{!! $name['feedback'] !!}
	</div>

	<div class="form-group status-form">
		{!! Form::label('status', 'Status :', ['class' => 'label mr-4 font-weight-bold']) !!}
		<div class="custom-control custom-radio custom-control-inline">
			{!! Form::radio('status', '0', null, ['class' => 'custom-control-input status '.$status['invalid'], 'id' => 'status-0', 'required']) !!}
			{!! Form::label('status-0', 'Belum Terpenuhi', ['class' => 'custom-control-label']) !!}
		</div>
		<div class="custom-control custom-radio custom-control-inline">
			{!! Form::radio('status', '1', null, ['class' => 'custom-control-input status '.$status['invalid'], 'id' => 'status-1', 'required']) !!}
			{!! Form::label('status-1', 'Terpenuhi', ['class' => 'custom-control-label']) !!}
		</div>
		{!! $status['feedback'] !!}
	</div>

	<div class="d-flex justify-content-center">
		<div>
			<a href="{{ route('refugees.index', [$event->slug, $post->slug]) }}" class="btn btn-secondary"> Cancel </a>
			<button type="submit" class="btn btn-info">Submit</button>
		</div>
	</div>

@section('script')
<script type="text/javascript">
	$(document).ready(function(){

		var type = $('.type:checked').val();

		function checktype(type){
			if (type == 1) {
				$('.status-form').hide();
				$('.status-form input[value=1]').prop('checked', true);
			} else {	
				$('.status-form').show();
				$('.status-form input[value=0]').prop('checked', true);
			}
		}

		checktype(type);

		$('.type').change(function(){
			type = $('.type:checked').val();
			checktype(type);
		});
	});
</script>
@endsection