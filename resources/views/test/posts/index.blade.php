<!DOCTYPE html>
<html>
<head>
	<title>deFugeez</title>
</head>
<body>
	<a href="{{ route('posts.create') }}">Buat Baru</a>
	<table border="1">
		<thead>
			<tr>
				<th>Nama</th>
				<th>Alamat</th>
				<th>Kapasitas</th>
				<th>Barak</th>
				<th>Status</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
		@foreach($posts as $post)
			<tr>
				<td>{{ $post->name }}</td>
				<td>{{ $post->address }}</td>
				<td>{{ $post->capacity }}</td>
				<td>{{ $post->barracks }}</td>
				<td>{{ $post->status }}</td>
				<td>
					<a href="">Detail</a>
					<a href="{{ route('posts.edit', $post->id) }}">Edit</a>
					<form action="{{ route('posts.destroy', $post->id) }}" method="post">
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