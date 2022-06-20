<?php

namespace App\Http\Controllers\Role\Atasan;

use App\Http\Controllers\Controller;
use App\Models\Instansi;
use App\Models\SuratKeluar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SuratKeluarController extends Controller
{
    public function index(Request $request, SuratKeluar $suratKeluars)
    {
        $keyword = $request->input('keyword');

        $suratKeluars = $suratKeluars->when($keyword, function ($query) use ($keyword) {
            return $query->where('perihal', 'like', '%' . $keyword . '%');
        })->with('klasifikasi', 'user')->latest()->paginate(12);

        return view('role.atasan.surat-keluar.index', [
            'active'        => 'surat-keluar',
            'request'       => $request->all(),
            'suratKeluars'  => $suratKeluars
        ]);
    }

    public function show($id)
    {
        return view('role.atasan.surat-keluar.show', [
            'active'        => 'surat-keluar',
            'suratKeluar'   => SuratKeluar::find($id)
        ]);
    }

    public function download($id)
    {
        $suratKeluar = SuratKeluar::find($id);
        return Storage::download('surat-keluar/' . $suratKeluar->file);
    }

    public function laporan()
    {
        return view('role.atasan.surat-keluar.report', [
            'active'        => 'laporan-surat-keluar',
            'suratKeluars'  => SuratKeluar::latest()->paginate(20)
        ]);
    }

    public function print(Request $request)
    {
        $tgl_awal = $request->tgl_awal;
        $tgl_akhir = $request->tgl_akhir;

        $suratKeluars = SuratKeluar::whereBetween('tgl_keluar', [$tgl_awal, $tgl_akhir])->latest()->get();

        return view('role.atasan.surat-keluar.print', [
            'instansi' => Instansi::find(1),
            'suratKeluars'  => $suratKeluars,
        ]);
    }
}
