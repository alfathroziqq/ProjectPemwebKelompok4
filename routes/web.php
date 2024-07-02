<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminisController;
use App\Http\Controllers\AdminWilayahController;
use App\Http\Controllers\KartuKeluargaController;
use App\Http\Controllers\LaporanRumahController;
use App\Http\Controllers\RiwayatPerubahanRumahController;
use App\Http\Controllers\RumahController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WilayahController;


// Halaman Home View
Route::get('/', function () {
    return view('home_view');
})->name('home');


// Halaman View
Route::get('wilayah_view', [WilayahController::class, 'index'])->name('wilayah_view');
Route::get('kk_view', [KartuKeluargaController::class, 'index'])->name('kk_view');
Route::get('rumah_view', [RumahController::class, 'index'])->name('rumah_view');
Route::get('riwayat_view', [RiwayatPerubahanRumahController::class, 'index'])->name('riwayat_view');
Route::get('laporan_view', [LaporanRumahController::class, 'index'])->name('laporan_view');


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
    Route::get('/admin_wilayah', [AdminWilayahController::class, 'index'])->name('home_admin_wilayah')->middleware('role:admin_wilayah');
    // Logout
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});


// Jobdesc Administrator
Route::middleware(['auth', 'role:administrator'])->group(function () {
    Route::resource('users', UserController::class);
    Route::put('/users/change-password/{user}', [UserController::class, 'changePassword'])->name('users.change-password');

});


// Jobdesc Admin Wilayah
Route::middleware(['auth', 'role:admin_wilayah'])->group(function () {
    // WILAYAH
    Route::resource('wilayah', WilayahController::class)->except(['show']);
    Route::get('wilayah/pdf', [WilayahController::class, 'pdf'])->name('wilayah.pdf');
    Route::get('wilayah/export', [WilayahController::class, 'export'])->name('wilayah.export');

    // KK
    Route::resource('kartu_keluarga', KartuKeluargaController::class);
    Route::get('pdfkkdownload', [KartuKeluargaController::class, 'kkpdf']);
    Route::get('showkkexcel', [KartuKeluargaController::class, 'kkexport']);

    // RUMAH
    Route::resource('rumah', RumahController::class);
    Route::get('pdfrumahdownload', [RumahController::class, 'rumahpdf']);
    Route::get('showrumahexcel', [RumahController::class, 'rumahexport']);

    // RIWAYAT
    Route::resource('riwayat_perubahan_rumah', RiwayatPerubahanRumahController::class);
    Route::get('pdfriwayatdownload', [RiwayatPerubahanRumahController::class, 'riwayatpdf']);
    Route::get('showriwayatexcel', [RiwayatPerubahanRumahController::class, 'riwayatexport']);

    // LAPORAN
    Route::resource('laporan_rumah', LaporanRumahController::class);
    Route::get('pdflaporandownload', [LaporanRumahController::class, 'laporanpdf']);
    Route::get('showlaporanexcel', [LaporanRumahController::class, 'laporanexport']);
});

