<?php

namespace App\Http\Controllers\Role\Atasan;

use App\Http\Controllers\Controller;
use App\Models\Instansi;
use App\Models\Pegawai;
use App\Models\SuratKeluar;
use App\Models\SuratMasuk;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('role.atasan.home', [
            'active' => 'home',
            'instansi' => Instansi::find(1),
            'totalPNS'  => Pegawai::where('status', 'pns')->count(),
            'totalHonor'  => Pegawai::where('status', 'honor')->count(),
            'totalSuratMasuk' => SuratMasuk::count(),
            'totalSuratKeluar' => SuratKeluar::count(),
        ]);
    }
}
