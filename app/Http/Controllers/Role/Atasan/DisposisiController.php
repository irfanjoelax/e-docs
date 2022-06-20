<?php

namespace App\Http\Controllers\Role\Atasan;

use App\Http\Controllers\Controller;
use App\Models\Disposisi;
use App\Models\Instansi;
use Illuminate\Http\Request;

class DisposisiController extends Controller
{
    public function index()
    {
        return view('role.atasan.disposisi.index', [
            'active'     => 'laporan-disposisi',
            'disposisis' => Disposisi::latest()->paginate(20)
        ]);
    }

    public function print(Request $request)
    {
        $tgl_awal = $request->tgl_awal;
        $tgl_akhir = $request->tgl_akhir;

        $disposisis = Disposisi::whereBetween('batas_waktu', [$tgl_awal, $tgl_akhir])->latest()->get();

        return view('role.atasan.disposisi.print', [
            'instansi' => Instansi::find(1),
            'disposisis'  => $disposisis,
        ]);
    }
}
