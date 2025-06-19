<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Absensi Siswa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-br from-blue-100 to-blue-300 min-h-screen flex flex-col items-center justify-center">
    <div class="w-full max-w-2xl bg-white rounded-xl shadow-lg p-8 mt-8">
        <a href="{{ url('siswa') }}" class="inline-block mb-4 text-blue-600 hover:underline">← Kembali ke Dashboard</a>
        <h1 class="text-3xl font-bold text-center text-blue-700 mb-6">Data Absensi</h1>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow">
                <thead class="bg-blue-200">
                    <tr>
                        <th class="py-3 px-6 text-left text-xs font-semibold text-blue-800 uppercase tracking-wider">Tanggal</th>
                        <th class="py-3 px-6 text-left text-xs font-semibold text-blue-800 uppercase tracking-wider">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($absensis as $absensi)
                    <tr class="border-b hover:bg-blue-50 transition">
                        <td class="py-3 px-6">{{ $absensi->tanggal }}</td>
                        <td class="py-3 px-6">
                            <span class="inline-block px-3 py-1 rounded-full text-xs font-medium
                                @if($absensi->status == 'Hadir') bg-green-100 text-green-700
                                @elseif($absensi->status == 'Izin') bg-yellow-100 text-yellow-700
                                @else bg-red-100 text-red-700 @endif">
                                {{ $absensi->status }}
                            </span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
