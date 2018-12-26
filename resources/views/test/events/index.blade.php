<!DOCTYPE html>
<html>
<head>
	<title>deFugeez</title>
</head>
<body>
	<a href="{{ route('events.create') }}">Buat Baru</a>
	<table border="1">
		<thead>
			<tr>
				<th>Nama</th>
				<th>Tingkat</th>
				<th>Lokasi</th>
				<th>Tanggal</th>
				<th>Status</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
		@foreach($events as $event)
			<tr>
				<td>{{ $event->name }}</td>
				<td>{{ $event->damage }}</td>
				<td>{{ $event->regency_id }}</td>
				<td>{{ $event->created_at }}</td>
				<td>{{ $event->status }}</td>
				<td>
					<a href="">Detail</a>
					<a href="{{ route('events.edit', $event->id) }}">Edit</a>
					<form action="{{ route('events.destroy', $event->id) }}" method="post">
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