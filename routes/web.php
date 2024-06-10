<?php

use App\Http\Controllers\AdministratorController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;

// Halaman Welcome
Route::get('/', function () {
    return view('/loginregister/login');
});
