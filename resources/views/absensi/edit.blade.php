<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Absensi</title>
</head>
<body>
    <h1>Edit Absensi</h1>
    <form method="POST" action="{{ route('absensi.update', $absensi->id) }}">
        @csrf
        @method('PUT')
        <label>Tanggal:</label><br>
        <input type="date" name="tanggal" value="{{ $absensi->tanggal }}" required><br>
        <label>Status:</label><br>
        <select name="status" required>
            <option value="hadir" @if($absensi->status=='hadir') selected @endif>Hadir</option>
            <option value="izin" @if($absensi->status=='izin') selected @endif>Izin</option>
            <option value="sakit" @if($absensi->status=='sakit') selected @endif>Sakit</option>
            <option value="alfa" @if($absensi->status=='alfa') selected @endif>Alfa</option>
        </select><br>
        <label>Pilih Siswa:</label><br>
        <select name="user_id" required>
            <option value="">-- Pilih Siswa --</option>
            @foreach($siswas as $siswa)
                <option value="{{ $siswa->id }}" @if($absensi->user_id == $siswa->id) selected @endif>{{ $siswa->name }} ({{ $siswa->email }})</option>
            @endforeach
        </select><br><br>
        <button type="submit">Update</button>
    </form>
    <a href="{{ route('absensi.index') }}">Kembali</a>
</body>
</html>
