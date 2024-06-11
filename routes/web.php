<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminisController;
use App\Http\Controllers\AdminWilayahController;

// Halaman Home View
Route::get('/', function () {
    return view('home_view');
})->name('home');

// Halaman Login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('formlogin');
Route::post('/login', [AuthController::class, 'login'])->name('login');

// Halaman Register
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('formregister');
Route::post('/register', [AuthController::class, 'register'])->name('register');

// Logout
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Administrator
Route::get('/administrator', [AdminisController::class, 'index'])->name('home_administrator')->middleware('role:administrator');

// Admin Wilayah
Route::get('/admin_wilayah', [AdminWilayahController::class, 'index'])->name('home_admin_wilayah')->middleware('role:admin_wilayah');
