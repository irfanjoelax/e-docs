<?php

namespace App\Http\Controllers\Role\Petugas;

use App\Http\Controllers\Controller;
use App\Models\Klasifikasi;
use App\Models\SuratKeluar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class SuratKeluarController extends Controller
{
    public function index(Request $request, SuratKeluar $suratKeluars)
    {
        $keyword = $request->input('keyword');

        $suratKeluars = $suratKeluars->when($keyword, function ($query) use ($keyword) {
            return $query->where('perihal', 'like', '%' . $keyword . '%');
        })->with('klasifikasi')->latest()->paginate(10);

        return view('role.petugas.surat-keluar.index', [
            'active'        => 'surat-keluar',
            'request'       => $request->all(),
            'suratKeluars'  => $suratKeluars
        ]);
    }

    public function create()
    {
        return view('role.petugas.surat-keluar.form', [
            'active'        => 'surat-keluar',
            'isEdit'        => false,
            'url'           => url('/petugas/surat-keluar'),
            'klasifikasis'  => Klasifikasi::latest()->get(),
        ]);
    }

    public function store(Request $request)
    {
        $file = $request->file('file');
        $nameFile = $file->getClientOriginalName();

        Storage::putFileAs('/surat-keluar', $file, $nameFile);

        SuratKeluar::create([
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

        return redirect('/petugas/surat-keluar')
            ->with('alert-primary', 'Surat keluar has been created');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        return view('role.petugas.surat-keluar.form', [
            'active'        => 'surat-keluar',
            'isEdit'        => true,
            'url'           => url('/petugas/surat-keluar/' . $id),
            'klasifikasis'  => Klasifikasi::latest()->get(),
            'suratKeluar'   => SuratKeluar::find($id),
        ]);
    }

    public function update(Request $request, $id)
    {
        $suratKeluar = SuratKeluar::find($id);
        $nameFile = $suratKeluar->file;

        if (!empty($file = $request->file('file'))) {
            Storage::delete('surat-keluar/' . $suratKeluar->file);

            $nameFile = $file->getClientOriginalName();
            Storage::putFileAs('/surat-keluar', $file, $nameFile);
        };


        $suratKeluar->update([
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

        return redirect('/petugas/surat-keluar')
            ->with('alert-warning', 'Surat keluar has been updated');
    }

    public function destroy($id)
    {
        //
    }

    public function download($id)
    {
        $suratKeluar = SuratKeluar::find($id);
        return Storage::download('surat-keluar/' . $suratKeluar->file);
    }

    public function generateQR($id)
    {
        $suratKeluar = SuratKeluar::find($id);
        $fileQR = 'storage/qr-code/surat-keluar/' . str_replace(' ', '-', strtolower($suratKeluar->perihal) . '.svg');
        $redirectQR = url('/petugas/surat-keluar/download/' . $id);
        QrCode::format('svg')->size(500)->generate($redirectQR, $fileQR);

        return response()->download($fileQR);
    }
}
