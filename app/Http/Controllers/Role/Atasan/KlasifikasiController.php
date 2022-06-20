<?php

namespace App\Http\Controllers\Role\Atasan;

use App\Http\Controllers\Controller;
use App\Models\Instansi;
use App\Models\Klasifikasi;
use Illuminate\Http\Request;

class KlasifikasiController extends Controller
{
    public function index()
    {
        return view('role.atasan.klasifikasi.index', [
            'active'        => 'laporan-klasifikasi-surat',
            'klasifikasis'  => Klasifikasi::with('surat_masuk', 'surat_keluar')->latest()->get(),
        ]);
    }

    public function print()
    {
        return view('role.atasan.klasifikasi.print', [
            'instansi'       => Instansi::find(1),
            'klasifikasis'  => Klasifikasi::with('surat_masuk', 'surat_keluar')->latest()->get(),
        ]);
    }

    public function report($idKlasifikasi)
    {
        return view('role.atasan.klasifikasi.report', [
            'active'        => 'laporan-klasifikasi-' . $idKlasifikasi,
            'klasifikasi'  => Klasifikasi::with('surat_masuk', 'surat_keluar')->find($idKlasifikasi),
        ]);
    }

    public function reportPrint($idKlasifikasi)
    {
        return view('role.atasan.klasifikasi.report_print', [
            'instansi'     => Instansi::find(1),
            'klasifikasi'  => Klasifikasi::with('surat_masuk', 'surat_keluar')->find($idKlasifikasi),
        ]);
    }
}
