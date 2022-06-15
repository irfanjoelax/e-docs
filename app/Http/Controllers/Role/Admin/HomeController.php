<?php

namespace App\Http\Controllers\Role\Admin;

use App\Http\Controllers\Controller;
use App\Models\Golongan;
use App\Models\Instansi;
use App\Models\Jabatan;
use App\Models\Pegawai;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('role.admin.home', [
            'active'        => 'home',
            'instansi'      => Instansi::find(1),
            'totalJabatan'  => Jabatan::count(),
            'totalGolongan' => Golongan::count(),
            'totalPegawai'  => Pegawai::count(),
            'totalUser'     => User::count(),
        ]);
    }
}
