<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    // Tampilkan formulir pendaftaran
    public function showRegisterForm()
    {
        return view('loginregister.register');
    }

    // Tangani pendaftaran pengguna
    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|max:255|unique:users',
            'password' => 'required|min:8',
            'role' => 'required|in:administrator,admin_wilayah'
        ]);

        $user = new User();
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;
        $user->save();

        return redirect()->route('login')->with('success', 'Registration successful. Please login.');
    }

    // Tampilkan formulir login
    public function showLoginForm()
    {
        return view('loginregister.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->role === 'administrator') {
                return redirect()->route('home_administrator');
            } elseif ($user->role === 'admin_wilayah') {
                return redirect()->route('home_admin_wilayah');
            }
        }

        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ]);
    }

    // Tangani logout pengguna
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
