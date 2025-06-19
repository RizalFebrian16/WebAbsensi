<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $user = \App\Models\User::where('email', $credentials['email'])->first();
        if ($user && $user->password === $credentials['password']) {
            Auth::login($user);
            Session::put('user_id', $user->id); // simpan user_id ke session
            if ($user->role === 'admin') {
                return redirect('/admin');
            } elseif ($user->role === 'guru') {
                return redirect('/guru');
            } else {
                return redirect('/siswa');
            }
        }
        return back()->withErrors(['email' => 'Email atau password ']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
