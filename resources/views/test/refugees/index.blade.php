<!DOCTYPE html>
<html>
<head>
	<title>deFugeez</title>
</head>
<body>
	<a href="{{ route('refugees.create') }}">Buat Baru</a>
	<table border="1">
		<thead>
			<tr>
				<th>Nama</th>
				<th>Gender</th>
				<th>Tanggal Lahir</th>
				<th>Kesehatan</th>
				<th>Status</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
		@foreach($refugees as $refugee)
			<tr>
				<td>{{ $refugee->name }}</td>
				<td>{{ $refugee->gender }}</td>
				<td>{{ $refugee->birthdate }}</td>
				<td>{{ $refugee->health }}</td>
				<td>{{ $refugee->status }}</td>
				<td>
					<a href="">Detail</a>
					<a href="{{ route('refugees.edit', $refugee->id) }}">Edit</a>
					<form action="{{ route('refugees.destroy', $refugee->id) }}" method="post">
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