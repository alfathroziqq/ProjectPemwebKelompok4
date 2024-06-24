<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('home_view');
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

        return redirect()->route('home')->with('success', 'Registration successful. Please login.');
    }

    public function showLoginForm()
    {
        return view('home_view');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ], [
            'username.required' => 'Username wajib diisi!',
            'password.required' => 'Password wajib diisi!',
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->role === 'administrator') {
                return redirect()->route('home_administrator');
            } elseif ($user->role === 'admin_wilayah') {
                return redirect()->route('master');
            }
        }

        return back()->withErrors([
            'credentials' => 'Username atau password salah!'
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
