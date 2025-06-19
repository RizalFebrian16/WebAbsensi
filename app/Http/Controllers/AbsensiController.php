<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absensi;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class AbsensiController extends Controller
{
    public function index()
    {
        $absensis = Absensi::all();
        return view('absensi.index', compact('absensis'));
    }

    public function create()
    {
        $siswas = User::where('role', 'siswa')->get();
        return view('absensi.create', compact('siswas'));
    }

    public function store(Request $request)
    {
        Absensi::create([
            'user_id' => $request->user_id,
            'tanggal' => $request->tanggal,
            'status' => $request->status,
        ]);
        return redirect()->route('absensi.index');
    }

    public function edit($id)
    {
        $absensi = Absensi::findOrFail($id);
        $siswas = User::where('role', 'siswa')->get();
        return view('absensi.edit', compact('absensi', 'siswas'));
    }

    public function update(Request $request, $id)
    {
        $absensi = Absensi::findOrFail($id);
        $absensi->update([
            'user_id' => $request->user_id,
            'tanggal' => $request->tanggal,
            'status' => $request->status,
        ]);
        return redirect()->route('absensi.index');
    }

    public function destroy($id)
    {
        $absensi = Absensi::findOrFail($id);
        $absensi->delete();
        return redirect()->route('absensi.index');
    }
}
