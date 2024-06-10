<?php

use Illuminate\Support\Facades\Route;

// Halaman Home View
Route::get('/', function () {
    return view('home.home_view');
})->name('home');

// Halaman Login
Route::get('/login', function () {
    return view('loginregister.login');
})->name('login');

// Halaman Register
Route::get('/register', function () {
    return view('loginregister.register');
})->name('register');
