<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminisController;
use App\Http\Controllers\AdminWilayahController;
use App\Http\Controllers\KartuKeluargaController;
use App\Http\Controllers\LaporanRumahController;
use App\Http\Controllers\RiwayatPerubahanRumahController;
use App\Http\Controllers\RumahController;
use App\Http\Controllers\WilayahController;

// Halaman Home View
Route::get('/', function () {
    return view('home_view');
})->name('home');

// Halaman Login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');

// Halaman Register
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');


Route::middleware(['auth'])->group(function () {
    // Administrator
    Route::get('/administrator', [AdminisController::class, 'index'])->name('home_administrator')->middleware('role:administrator');
    // Admin Wilayah
    Route::get('/admin_wilayah', [AdminWilayahController::class, 'index'])->name('master')->middleware('role:admin_wilayah');
    // Logout
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

//Jobdesc Admin Wilayah
Route::middleware(['auth', 'role:admin_wilayah'])->group(function () {
    Route::resource('wilayah', WilayahController::class);
    Route::resource('kartu_keluarga', KartuKeluargaController::class);
    Route::resource('rumah', RumahController::class);
    Route::resource('riwayat_perubahan_rumah', RiwayatPerubahanRumahController::class);
    Route::resource('laporan_rumah', LaporanRumahController::class);
});
