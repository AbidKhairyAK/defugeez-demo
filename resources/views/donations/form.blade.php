@php
	$name = [
		'invalid' => $errors->has('name') ? 'is-invalid' : '',
		'feedback' => $errors->has('name') ? '<span class="invalid-feedback">'.$errors->first('name').'</span>' : ''
	];
	$target = [
		'invalid' => $errors->has('target') ? 'is-invalid' : '',
		'feedback' => $errors->has('target') ? '<span class="invalid-feedback">'.$errors->first('target').'</span>' : ''
	];
	$limit = [
		'invalid' => $errors->has('limit') ? 'is-invalid' : '',
		'feedback' => $errors->has('limit') ? '<span class="invalid-feedback">'.$errors->first('limit').'</span>' : ''
	];
	$donation_image = [
		'invalid' => $errors->has('donation_image') ? 'is-invalid' : '',
		'feedback' => $errors->has('donation_image') ? '<span class="invalid-feedback">'.$errors->first('donation_image').'</span>' : ''
	];
	$description = [
		'invalid' => $errors->has('description') ? 'is-invalid' : '',
		'feedback' => $errors->has('description') ? '<span class="invalid-feedback">'.$errors->first('description').'</span>' : ''
	];
@endphp

<div class="form-group">
	{!! Form::label('name', 'Judul Pengalangan Dana', ['class' => 'font-weight-bold']) !!}
	{!! Form::text('name', null, ['class' => 'form-control '.$name['invalid'], 'id' => 'name', 'required']) !!}
	{!! $name['feedback'] !!}
</div>

<div class="form-group">
	{!! Form::label('target', 'Target Dana (Rp)', ['class' => 'font-weight-bold']) !!}
	{!! Form::text('target', null, ['class' => 'form-control number '.$target['invalid'], 'id' => 'target', 'required']) !!}
	{!! $target['feedback'] !!}
</div>

<div class="form-group">
	{!! Form::label('limit', 'Batas Penggalangan Dana', ['class' => 'font-weight-bold']) !!}
	{!! Form::text('limit', null, ['class' => 'form-control '.$limit['invalid'], 'id' => 'limit', 'required']) !!}
	{!! $limit['feedback'] !!}
</div>

<div class="form-group">
	{!! Form::label('description', 'Isi Penggalangan Dana', ['class' => 'font-weight-bold']) !!}
	{!! Form::textarea('description', null, ['class' => 'form-control', 'id' => 'description']) !!}
</div>

<div class="row">
	<div class="form-group col-md-4">
		
		{!! Form::label('donation_image', 'Gambar Utama', ['class' => 'font-weight-bold']) !!}
		
		<div class="fileinput fileinput-new" data-provides="fileinput">
		  <div class="fileinput-new thumbnail">
		    <img src="https://via.placeholder.com/700x300?text=Masukkan+Gambar+Utama" alt="proof" class="w-100">
		  </div>
		  <div class="fileinput-preview fileinput-exists thumbnail w-100"></div>
		  <div>
		    <span class="btn btn-success btn-file">
		      <span class="fileinput-new">Pilih Gambar</span>
		      <span class="fileinput-exists">Ubah</span>
		      <input type="file" name="donation_image" accept="image/*" required>
		    </span>
		    <a href="#" class="btn btn-secondary fileinput-exists" data-dismiss="fileinput">Hapus</a>
		  </div>
		</div>

		{!! $donation_image['feedback'] !!}

	</div>
</div>

<div class="d-flex justify-content-center">
	<div>
		<a href="{{ url('/') }}" class="btn btn-secondary"> Cancel </a>
		<button type="submit" class="btn btn-info">Submit</button>
	</div>
</div>

@section('script')
<script src="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/js/jasny-bootstrap.min.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/11.2.0/classic/ckeditor.js"></script>
<script src="https://unpkg.com/gijgo@1.9.11/js/gijgo.min.js"></script>
<script src="/js/textnumber.js"></script>
<script type="text/javascript">
	ClassicEditor
    .create( document.querySelector( '#description' ) )
    .catch( error => {
        console.error( error );
    } );

	$('#limit').datepicker({
    uiLibrary: 'bootstrap4',
    format: 'dd-mm-yyyy'
  });
</script>
@endsection

@section('style')
<link href="https://unpkg.com/gijgo@1.9.11/css/gijgo.min.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css">
<style type="text/css">
	.ck-content {
		min-height: 300px;
	}
</style>
@endsection