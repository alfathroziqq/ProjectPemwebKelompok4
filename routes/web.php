<?php

use App\Http\Controllers\AdministratorController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;

// Halaman Login
Route::get('/', function () {
    return view('loginregister.login');
})->name('login');

// Halaman Register
// Route::get('/', function () {
//     return view('loginregister.register');
// })->name('register');

// Halaman Home Views
Route::get('/', function () {
    return view('home.homeViews');
})->name('homeViews');
