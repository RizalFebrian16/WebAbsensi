<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Absensi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light min-vh-100">
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <a href="{{ url(Session::get('role', 'admin')) }}" class="btn btn-secondary">Kembali ke Dashboard</a>
            <a href="{{ route('absensi.create') }}" class="btn btn-primary">Tambah Absensi</a>
        </div>
        <div class="card shadow">
            <div class="card-header bg-primary text-white fw-bold">Data Absensi</div>
            <div class="card-body p-0">
                <table class="table table-striped mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Nama Siswa</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th>User ID</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($absensis as $absensi)
                        <tr>
                            <td>{{ $absensi->id }}</td>
                            <td>{{ $absensi->user ? $absensi->user->name : '-' }}</td>
                            <td>{{ $absensi->tanggal }}</td>
                            <td>{{ $absensi->status }}</td>
                            <td>{{ $absensi->user_id }}</td>
                            <td>
                                <a href="{{ route('absensi.edit', $absensi->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('absensi.destroy', $absensi->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
