<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    function index()
    {
        return view('/loginregister/login');
    }

    function login(Request $request)
    {
        $request->validate([
            'email'=>'required',
            'password'=>'required',
        ],
        [
            'email.required'=>'Email wajib diisi!',
            'password.required'=>'Password wajib diisi!',
        ]);

        $infologin = [
            'email'=>$request->email,
            'password'=>$request->password,
        ];

        if(Auth::attempt($infologin))
        {
            if(Auth::user()->role == 'administrator')
            {
                return redirect('administrator/administrator');
            }
            elseif(Auth::user()->role == 'admin_wilayah')
            {
                return redirect('administrator/admin_wilayah');
            }
        } else
        {
            return redirect('')->withErrors('Username dan Password salah!')->withInput();
        }
    }

    function logout()
    {
        Auth::logout();
        return redirect('');
    }
}
