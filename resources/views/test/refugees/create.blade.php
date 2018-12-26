<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="{{ route('refugees.store') }}" method="post">
		@csrf
		<input type="text" name="name" placeholder="name"><br>
		<input type="radio" name="gender" value="L">Laki-laki<br>
		<input type="radio" name="gender" value="P">Perempuan<br>
		<input type="text" name="origin" placeholder="origin"><br>
		<input type="date" name="birthdate" placeholder="birthdate"><br>
		<select type="text" name="health" placeholder="health">
			<option value="1">Health 1</option>
			<option value="2">Health 2</option>
			<option value="3">Health 3</option>
		</select><br>
		<select type="text" name="status" placeholder="status">
			<option value="1">Status 1</option>
			<option value="2">Status 2</option>
			<option value="3">Status 3</option>
		</select><br>
		<select type="text" name="blood_type" placeholder="blood_type">
			<option value="A">A</option>
			<option value="B">B</option>
			<option value="AB">AB</option>
			<option value="O">O</option>
		</select><br>
		<input type="number" name="barrack" placeholder="barrack"><br>
		<input type="text" name="description" placeholder="description"><br>
		<a href="{{ route('refugees.index') }}"></a>
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