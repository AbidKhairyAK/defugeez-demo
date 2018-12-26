	@php
		$text = [
			'invalid' => $errors->has('text') ? 'is-invalid' : '',
			'feedback' => $errors->has('text') ? '<span class="invalid-feedback">'.$errors->first('text').'</span>' : ''
		];
		$select = [
			'invalid' => $errors->has('select') ? 'is-invalid' : '',
			'feedback' => $errors->has('select') ? '<span class="invalid-feedback">'.$errors->first('select').'</span>' : ''
		];
		$radio = [
			'invalid' => $errors->has('radio') ? 'is-invalid' : '',
			'feedback' => $errors->has('radio') ? '<span class="invalid-feedback">'.$errors->first('radio').'</span>' : ''
		];
		$textarea = [
			'invalid' => $errors->has('textarea') ? 'is-invalid' : '',
			'feedback' => $errors->has('textarea') ? '<span class="invalid-feedback">'.$errors->first('textarea').'</span>' : ''
		];
	@endphp

	<div class="form-group">
		{!! Form::label('text', 'Text', ['class' => 'font-weight-bold']) !!}
		{!! Form::text('text', null, ['class' => 'form-control '.$text['invalid'], 'id' => 'text', 'required']) !!}
		{!! $text['feedback'] !!}
	</div>

	<div class="form-group">
		{!! Form::label('select', 'Select', ['class' => 'font-weight-bold']) !!}
		{!! Form::select('select', 
		['Select1' => 'valve', 'Select2' => 'valve2'], 
		null,
		['class' => 'form-control select2'.$select['invalid'], 'id' => 'select', 'required']) !!}
		{!! $select['feedback'] !!}
	</div>

	<div class="form-group">
		{!! Form::label('radio', 'Status :', ['class' => 'label mr-4 font-weight-bold']) !!}
		<div class="custom-control custom-radio custom-control-inline">
			{!! Form::radio('radio', '1', false, ['class' => 'custom-control-input '.$radio['invalid'], 'id' => 'radio', 'required']) !!}
			{!! Form::label('radio', 'Zero', ['class' => 'custom-control-label']) !!}
		</div>
		<div class="custom-control custom-radio custom-control-inline">
			{!! Form::radio('radio', '0', false, ['class' => 'custom-control-input ', 'id' => 'radio1', 'required']) !!}
			{!! Form::label('radio1', 'One', ['class' => 'custom-control-label']) !!}
		</div>
		{!! $radio['feedback'] !!}
	</div>

	<div class="form-group">
		{!! Form::label('textarea', 'Textarea', ['class' => 'font-weight-bold']) !!}
		{!! Form::textarea('textarea', null, ['class' => 'form-control '.$textarea['invalid'], 'id' => 'textarea', 'required']) !!}
		{!! $textarea['feedback'] !!}
	</div>
	<div class="d-flex justify-content-center">
		<div>
			<a href="#" class="btn btn-secondary"> Cancel </a>
			<button type="submit" class="btn btn-info">Submit</button>
		</div>
	</div>