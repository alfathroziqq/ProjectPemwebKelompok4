<?php

use App\Http\Controllers\AdministratorController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;

// LOGIN ADMINISTRATOR
Route::middleware(['guest'])->group(function()
{
    Route::get('/', [RoleController::class,'index'])->name('login');
    Route::post('/', [RoleController::class,'login']);
});

Route::get('/home', function()
{
    return redirect('/administrator');
});

Route::middleware(['auth'])->group(function()
{
    Route::get('/administrator', [AdministratorController::class,'index']);
    Route::get('/administrator/administrator', [AdministratorController::class,'administrator'])->middleware('userAkses:administrator');
    Route::get('/administrator/admin_wilayah', [AdministratorController::class,'admin_wilayah'])->middleware('userAkses:admin_wilayah');
    Route::get('/logout',[RoleController::class,'logout']);
});
