<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/profile', [App\Http\Controllers\Auth\ProfileController::class, 'index']);
Route::post('/profile', [App\Http\Controllers\Auth\ProfileController::class, 'update']);
Route::get('/change-password', [App\Http\Controllers\Auth\ChangePasswordController::class, 'index']);
Route::post('/change-password', [App\Http\Controllers\Auth\ChangePasswordController::class, 'update']);

// ROLE ATASAN
Route::get('/atasan/home', [App\Http\Controllers\Role\Atasan\HomeController::class, 'index']);

// ROLE ADMIN
Route::get('/admin/home', [App\Http\Controllers\Role\Admin\HomeController::class, 'index']);
Route::resource('/admin/klasifikasi', App\Http\Controllers\Role\Admin\KlasifikasiSuratController::class);
Route::resource('/admin/golongan', App\Http\Controllers\Role\Admin\GolonganController::class);

// ROLE PETUGAS
Route::get('/petugas/home', [App\Http\Controllers\Role\Petugas\HomeController::class, 'index']);
