<?php

namespace App\Http\Controllers\Role\Petugas;

use App\Http\Controllers\Controller;
use App\Models\Disposisi;
use App\Models\Instansi;
use App\Models\Klasifikasi;
use App\Models\SuratMasuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SuratMasukController extends Controller
{
    public function index(Request $request, SuratMasuk $suratMasuks)
    {
        $keyword = $request->input('keyword');

        $suratMasuks = $suratMasuks->when($keyword, function ($query) use ($keyword) {
            return $query->where('perihal', 'like', '%' . $keyword . '%');
        })->with('klasifikasi')->latest()->paginate(10);

        return view('role.petugas.surat-masuk.index', [
            'active'        => 'surat-masuk',
            'request'       => $request->all(),
            'suratMasuks'  => $suratMasuks
        ]);
    }

    public function create()
    {
        return view('role.petugas.surat-masuk.form', [
            'active'        => 'surat-masuk',
            'isEdit'        => false,
            'url'           => url('/petugas/surat-masuk'),
            'klasifikasis'  => Klasifikasi::latest()->get(),
        ]);
    }

    public function store(Request $request)
    {
        $file = $request->file('file');
        $nameFile = $file->getClientOriginalName();

        Storage::putFileAs('/surat-masuk', $file, $nameFile);

        SuratMasuk::create([
            'no_surat'          => $request->no_surat,
            'asal_surat'        => $request->asal_surat,
            'perihal'           => $request->perihal,
            'klasifikasi_id'    => $request->klasifikasi_id,
            'tgl_surat'         => $request->tgl_surat,
            'tgl_masuk'         => $request->tgl_masuk,
            'keterangan'        => $request->keterangan,
            'file'              => $nameFile,
            'user_id'           => Auth::id(),
        ]);

        return redirect('/petugas/surat-masuk')
            ->with('alert-primary', 'Surat masuk has been created');
    }

    public function show($id)
    {
        return view('role.petugas.surat-masuk.show', [
            'active'       => 'surat-masuk',
            'suratMasuk'   => SuratMasuk::find($id),
        ]);
    }

    public function edit($id)
    {
        return view('role.petugas.surat-masuk.form', [
            'active'        => 'surat-masuk',
            'isEdit'        => true,
            'url'           => url('/petugas/surat-masuk/' . $id),
            'klasifikasis'  => Klasifikasi::latest()->get(),
            'suratMasuk'   => SuratMasuk::find($id),
        ]);
    }

    public function update(Request $request, $id)
    {
        $suratMasuk = SuratMasuk::find($id);
        $nameFile = $suratMasuk->file;

        if (!empty($file = $request->file('file'))) {
            Storage::delete('surat-keluar/' . $suratMasuk->file);

            $nameFile = $file->getClientOriginalName();
            Storage::putFileAs('/surat-masuk', $file, $nameFile);
        };


        $suratMasuk->update([
            'no_surat'          => $request->no_surat,
            'tujuan'            => $request->tujuan,
            'perihal'           => $request->perihal,
            'klasifikasi_id'    => $request->klasifikasi_id,
            'tgl_surat'         => $request->tgl_surat,
            'tgl_keluar'        => $request->tgl_keluar,
            'keterangan'        => $request->keterangan,
            'file'              => $nameFile,
            'user_id'           => Auth::id(),
        ]);

        return redirect('/petugas/surat-masuk')
            ->with('alert-warning', 'Surat masuk has been updated');
    }

    public function destroy($id)
    {
        //
    }

    public function download($id)
    {
        $suratMasuk = SuratMasuk::find($id);
        return Storage::download('surat-masuk/' . $suratMasuk->file);
    }

    public function printDisposisi($idDisposisi)
    {
        return view('role.petugas.surat-masuk.print', [
            'instansi'    => Instansi::find(1),
            'disposisi'   => Disposisi::find($idDisposisi),
        ]);
    }
}
