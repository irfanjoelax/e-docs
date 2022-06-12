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
Route::resource('/admin/klasifikasi', App\Http\Controllers\Role\Admin\KlasifikasiSuratController::class)->except('show');
Route::resource('/admin/golongan', App\Http\Controllers\Role\Admin\GolonganController::class)->except('show');
Route::resource('/admin/jabatan', App\Http\Controllers\Role\Admin\JabatanController::class)->except('show');
Route::resource('/admin/pegawai', App\Http\Controllers\Role\Admin\PegawaiController::class)->except('show');
Route::resource('/admin/user', App\Http\Controllers\Role\Admin\UserController::class)->except('show', 'edit', 'update');
Route::resource('/admin/instansi', App\Http\Controllers\Role\Admin\InstansiController::class)->except('show', 'store', 'create', 'destroy');

// ROLE PETUGAS
Route::get('/petugas/home', [App\Http\Controllers\Role\Petugas\HomeController::class, 'index']);
Route::resource('/petugas/surat-keluar', App\Http\Controllers\Role\Petugas\SuratKeluarController::class)->except('show', 'destroy');
Route::get('/petugas/surat-keluar/download/{id}', [App\Http\Controllers\Role\Petugas\SuratKeluarController::class, 'download']);
