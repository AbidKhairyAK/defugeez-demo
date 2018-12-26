<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="{{ route('events.store') }}" method="post">
		@csrf
		<input type="text" name="name" placeholder="name"><br>
		<select type="text" name="province_id" placeholder="province_id">
			<option value="11">Province 1</option>
			<option value="22">Province 2</option>
			<option value="33">Province 3</option>
		</select><br>
		<select type="text" name="regency_id" placeholder="regency_id">
			<option value="1111">Regency 1</option>
			<option value="2222">Regency 2</option>
			<option value="3333">Regency 3</option>
		</select><br>
		<select type="text" name="damage" placeholder="damage">
			<option value="1">Damage 1</option>
			<option value="2">Damage 2</option>
			<option value="3">Damage 3</option>
		</select><br>
		<input type="text" name="description" placeholder="description"><br>
		<input type="radio" name="status" placeholder="status" value="1">Aktif<br>
		<input type="radio" name="status" placeholder="status" value="0">Tidak Aktif<br>
		<a href="{{ route('events.index') }}"></a>
		<button type="submit">Submit</button>
	</form>
	@if ($errors->any())
	    <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	@endif
</body>
</html>