<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="{{ route('users.update', $user->id) }}" method="post">
		@csrf
		{{ method_field('PUT') }}
		<input type="text" name="nik" placeholder="nik" value="{{ $user->nik }}"><br>
		<input type="text" name="name" placeholder="name" value="{{ $user->name }}"><br>
		<input type="text" name="address" placeholder="address" value="{{ $user->address }}"><br>
		<input type="text" name="email" placeholder="email" value="{{ $user->email }}"><br>
		<input type="password" name="password" placeholder="password"><br>
		<input type="password" name="password_confirmation" placeholder="password_confirmation"><br>
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
		<select type="text" name="district_id" placeholder="district_id">
			<option value="1111111">District 1</option>
			<option value="2222222">District 2</option>
			<option value="3333333">District 3</option>
		</select><br>
		<select type="text" name="village_id" placeholder="village_id">
			<option value="1111111111">Village 1</option>
			<option value="2222222222">Village 2</option>
			<option value="3333333333">Village 3</option>
		</select><br>
		<a href="{{ route('users.index') }}"></a>
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