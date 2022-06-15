<?php

namespace App\Http\Controllers\Role\Petugas;

use App\Http\Controllers\Controller;
use App\Models\Instansi;
use App\Models\Klasifikasi;
use App\Models\SuratKeluar;
use App\Models\SuratMasuk;

class HomeController extends Controller
{
    public function index()
    {
        return view('role.petugas.home', [
            'active' => 'home',
            'instansi' => Instansi::find(1),
            'totalKlasifikasiSurat' => Klasifikasi::count(),
            'totalSuratMasuk' => SuratMasuk::count(),
            'totalSuratKeluar' => SuratKeluar::count(),
        ]);
    }
}
