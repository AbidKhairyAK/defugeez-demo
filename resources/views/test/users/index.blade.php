<!DOCTYPE html>
<html>
<head>
	<title>deFugeez</title>
</head>
<body>
	<a href="{{ route('users.create') }}">Buat Baru</a>
	<table border="1">
		<thead>
			<tr>
				<th>Nama</th>
				<th>Alamat</th>
				<th>Email</th>
				<th>Status</th>
				<th>Role</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
		@foreach($users as $user)
			<tr>
				<td>{{ $user->name }}</td>
				<td>{{ $user->address }}</td>
				<td>{{ $user->email }}</td>
				<td>{{ $user->statusLabel() }}</td>
				<td>{{ $user->roleLabel() }}</td>
				<td>
					<a href="">Detail</a>
					<a href="{{ route('users.edit', $user->id) }}">Edit</a>
					<form action="{{ route('users.destroy', $user->id) }}" method="post">
						@csrf
						{{ method_field('DELETE') }}
						<button type="submit">Delete</button>
					</form>
				</td>
			</tr>
		@endforeach
		</tbody>
	</table>
</body>
</html>