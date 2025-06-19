<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function index()
    {
        if (Session::get('role') !== 'admin') {
            abort(403, 'Unauthorized');
        }
        $users = User::whereIn('role', ['guru', 'siswa'])->get();
        return view('users.index', compact('users'));
    }
}
