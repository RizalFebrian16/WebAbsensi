<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Guru</title>
</head>
<body>
    <h1>Selamat datang, Guru!</h1>
    <nav>
        <ul>
            <li><a href="{{ route('absensi.index') }}">Kelola Absensi Sekolah</a></li>
        </ul>
    </nav>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Logout</button>
    </form>
</body>
</html>
