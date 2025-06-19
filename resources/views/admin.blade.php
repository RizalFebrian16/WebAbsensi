<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light min-vh-100">
    <div class="container py-5">
        <div class="card shadow p-4 mx-auto" style="max-width: 500px;">
            <h1 class="mb-4 text-center text-primary">Dashboard Admin</h1>
            <nav class="mb-4">
                <ul class="nav nav-pills justify-content-center gap-2">
                    <li class="nav-item"><a href="{{ route('absensi.index') }}" class="nav-link btn btn-outline-primary">Kelola Absensi Sekolah</a></li>
                    <li class="nav-item"><a href="{{ route('users.index') }}" class="nav-link btn btn-outline-secondary">Daftar User</a></li>
                </ul>
            </nav>
            <form method="POST" action="{{ route('logout') }}" class="text-center mt-4">
                @csrf
                <button type="submit" class="btn btn-danger w-100">Logout</button>
            </form>
        </div>
    </div>
</body>
</html>
