<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registrasi Akun</title>
</head>
<body>
    <h2>Registrasi Akun Guru/Siswa</h2>
    @if ($errors->any())
        <div style="color:red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <label>Nama:</label><br>
        <input type="text" name="name" required><br>
        <label>Email:</label><br>
        <input type="email" name="email" required><br>
        <label>Password:</label><br>
        <input type="password" name="password" required><br>
        <label>Role:</label><br>
        <select name="role" required>
            <option value="guru">Guru</option>
            <option value="siswa">Siswa</option>
        </select><br><br>
        <button type="submit">Daftar</button>
    </form>
    <a href="/login">Kembali ke Login</a>
</body>
</html>
