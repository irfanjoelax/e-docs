<?php

namespace App\Http\Controllers\Role\Atasan;

use App\Http\Controllers\Controller;
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
}
