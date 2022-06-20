<?php

namespace App\Http\Controllers\Role\Atasan;

use App\Http\Controllers\Controller;
use App\Models\Disposisi;
use App\Models\Instansi;
use App\Models\SuratMasuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SuratMasukController extends Controller
{
    public function index(Request $request, SuratMasuk $suratMasuks)
    {
        $keyword = $request->input('keyword');

        $suratMasuks = $suratMasuks->when($keyword, function ($query) use ($keyword) {
            return $query->where('perihal', 'like', '%' . $keyword . '%');
        })->with('klasifikasi', 'user')->latest()->paginate(12);

        return view('role.atasan.surat-masuk.index', [
            'active'        => 'surat-masuk',
            'request'       => $request->all(),
            'suratMasuks'  => $suratMasuks
        ]);
    }

    public function show($id)
    {
        $suratMasuk = SuratMasuk::with(['disposisis' => function ($query) {
            $query->orderBy('created_at', 'desc');
        }])->find($id);

        $suratMasuk->update(['dibaca' => 'yes']);

        return view('role.atasan.surat-masuk.show', [
            'active'        => 'surat-masuk',
            'suratMasuk'    => $suratMasuk,
        ]);
    }

    public function download($id)
    {
        $suratMasuk = SuratMasuk::find($id);
        return Storage::download('surat-masuk/' . $suratMasuk->file);
    }

    public function createDisposisi(Request $request, $id)
    {
        Disposisi::create([
            'surat_masuk_id'    => $id,
            'tujuan'            => $request->tujuan,
            'isi'               => $request->isi,
            'batas_waktu'       => $request->batas_waktu,
            'sifat'             => $request->sifat,
            'catatan'           => $request->catatan,
        ]);

        return redirect('atasan/surat-masuk/' . $id)
            ->with('alert-primary', 'Disposisi has been created');
    }

    public function deleteDisposisi($idDisposisi)
    {
        Disposisi::find($idDisposisi)->delete();
        return back();
    }

    public function laporan()
    {
        return view('role.atasan.surat-masuk.report', [
            'active'        => 'laporan-surat-masuk',
            'suratMasuks'  => SuratMasuk::latest()->paginate(20)
        ]);
    }

    public function print(Request $request)
    {
        $tgl_awal = $request->tgl_awal;
        $tgl_akhir = $request->tgl_akhir;

        $suratMasuks = SuratMasuk::whereBetween('tgl_masuk', [$tgl_awal, $tgl_akhir])->latest()->get();

        return view('role.atasan.surat-masuk.print', [
            'instansi' => Instansi::find(1),
            'suratMasuks'  => $suratMasuks,
        ]);
    }
}
