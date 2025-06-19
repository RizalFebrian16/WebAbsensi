<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\User;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login-manual');
})->name('login');

Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/admin', function (Request $request) {
    // Pembatasan manual: role diambil dari session
    if (Session::get('role') !== 'admin') {
        abort(403, 'Unauthorized');
    }
    return view('admin');
});

Route::get('/guru', function (Request $request) {
    if (Session::get('role') !== 'guru') {
        abort(403, 'Unauthorized');
    }
    return view('guru');
});

Route::get('/siswa', function (Request $request) {
    if (Session::get('role') !== 'siswa') {
        abort(403, 'Unauthorized');
    }
    return view('siswa');
});

Route::post('/manual-login', function (Request $request) {
    // Contoh login manual: cek email, password, dan role
    $user = \App\Models\User::where('email', $request->email)
        ->where('password', $request->password)
        ->where('role', $request->role)
        ->first();
    if ($user) {
        Session::put('role', $user->role);
        Session::put('user_id', $user->id); // pastikan user_id disimpan di session
        return redirect('/' . $user->role);
    }
    return back()->withErrors(['login' => 'Login gagal']);
})->name('manual.login');

Route::get('/register', function () {
    if (Session::get('role') !== 'admin') {
        abort(403, 'Unauthorized');
    }
    return view('register');
})->name('register');

Route::post('/register', function (Illuminate\Http\Request $request) {
    if (Session::get('role') !== 'admin') {
        abort(403, 'Unauthorized');
    }
    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users,email',
        'password' => 'required',
        'role' => 'required|in:guru,siswa',
    ]);
    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => $request->password, // plain text sesuai sistem login Anda
        'role' => $request->role,
    ]);
    return redirect('/login')->with('success', 'Akun berhasil dibuat, silakan login!');
});

Route::group(['middleware' => function ($request, $next) {
    $role = Session::get('role');
    if ($role !== 'admin' && $role !== 'guru') {
        abort(403, 'Unauthorized');
    }
    return $next($request);
}], function () {
    Route::resource('absensi', AbsensiController::class);
});

Route::get('/absensi-siswa', function () {
    $user_id = Session::get('user_id');
    $absensis = \App\Models\Absensi::where('user_id', $user_id)->get();
    return view('absensi.siswa', compact('absensis'));
});

Route::get('/users', [UserController::class, 'index'])->name('users.index');
