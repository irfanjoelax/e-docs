<?php

use App\Http\Controllers\Auth\ChangePasswordController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\Role\Admin\GolonganController;
use App\Http\Controllers\Role\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Role\Admin\InstansiController;
use App\Http\Controllers\Role\Admin\JabatanController;
use App\Http\Controllers\Role\Admin\PegawaiController;
use App\Http\Controllers\Role\Admin\UserController;
use App\Http\Controllers\Role\Atasan\HomeController as AtasanHomeController;
use App\Http\Controllers\Role\Atasan\SuratKeluarController;
use App\Http\Controllers\Role\Atasan\SuratMasukController;
use App\Http\Controllers\Role\Petugas\HomeController as PetugasHomeController;
use App\Http\Controllers\Role\Petugas\KlasifikasiSuratController;
use App\Http\Controllers\Role\Petugas\SuratKeluarController as PetugasSuratKeluarController;
use App\Http\Controllers\Role\Petugas\SuratMasukController as PetugasSuratMasukController;
use App\Models\SuratMasuk;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/profile', [ProfileController::class, 'index']);
Route::post('/profile', [ProfileController::class, 'update']);
Route::get('/change-password', [ChangePasswordController::class, 'index']);
Route::post('/change-password', [ChangePasswordController::class, 'update']);

// ROLE ATASAN
Route::get('/atasan/home', [AtasanHomeController::class, 'index']);
Route::resource('/atasan/surat-masuk', SuratMasukController::class)->except('store', 'create', 'edit', 'update', 'destroy');
Route::post('/atasan/surat-masuk/{id}/disposisi/create', [SuratMasukController::class, 'createDisposisi']);
Route::get('/atasan/surat-masuk/disposisi/delete/{idDisposisi}', [SuratMasukController::class, 'deleteDisposisi']);
Route::resource('/atasan/surat-keluar', SuratKeluarController::class)->except('store', 'create', 'edit', 'update', 'destroy');
Route::get('/atasan/surat-keluar/download/{id}', [SuratKeluarController::class, 'download']);

// ROLE ADMIN
Route::get('/admin/home', [AdminHomeController::class, 'index']);
Route::resource('/admin/golongan', GolonganController::class)->except('show');
Route::resource('/admin/jabatan', JabatanController::class)->except('show');
Route::resource('/admin/pegawai', PegawaiController::class)->except('show');
Route::resource('/admin/user', UserController::class)->except('show', 'edit', 'update');
Route::resource('/admin/instansi', InstansiController::class)->except('show', 'store', 'create', 'destroy');

// ROLE PETUGAS
Route::get('/petugas/home', [PetugasHomeController::class, 'index']);
Route::resource('/petugas/klasifikasi', KlasifikasiSuratController::class)->except('show');
Route::resource('/petugas/surat-keluar', PetugasSuratKeluarController::class)->except('show', 'destroy');
Route::get('/petugas/surat-keluar/download/{id}', [PetugasSuratKeluarController::class, 'download']);
Route::get('/petugas/surat-keluar/qr-code/{id}', [PetugasSuratKeluarController::class, 'generateQR']);
Route::resource('/petugas/surat-masuk', PetugasSuratMasukController::class)->except('destroy');
Route::get('/petugas/surat-masuk/download/{id}', [PetugasSuratMasukController::class, 'download']);
Route::get('/petugas/surat-masuk/disposisi/print/{idDisposisi}', [PetugasSuratMasukController::class, 'printDisposisi']);
