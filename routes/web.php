<?php

use App\Http\Controllers\AdministratorController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;

// Halaman Login Register
Route::get('/', function () {
    return view('loginregister.login');
})->name('login');

// Halaman Login Register
// Route::get('/', function () {
//     return view('loginregister.register');
// })->name('register');
