<!-- filepath: c:\xampp\htdocs\trya\resources\views\siswa.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Siswa</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow">
        <div class="container">
            <a class="navbar-brand" href="#">Siswa Dashboard</a>
            <form method="POST" action="{{ route('logout') }}" class="d-flex ms-auto">
                @csrf
                <button type="submit" class="btn btn-outline-light">Logout</button>
            </form>
        </div>
    </nav>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg border-0">
                    <div class="card-body text-center">
                        <h1 class="display-5 mb-4 text-primary">Selamat Datang, Siswa!</h1>
                        <p class="lead mb-4">Akses data absensi dan informasi penting lainnya di dashboard ini.</p>
                        <a href="{{ url('absensi-siswa') }}" class="btn btn-primary btn-lg shadow-sm">
                            <i class="bi bi-calendar-check"></i> Lihat Data Absensi
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap Icons CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>