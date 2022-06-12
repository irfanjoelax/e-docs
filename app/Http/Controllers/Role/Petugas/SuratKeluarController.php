<?php

namespace App\Http\Controllers\Role\Petugas;

use App\Http\Controllers\Controller;
use App\Models\Klasifikasi;
use App\Models\SuratKeluar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SuratKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('role.petugas.surat-keluar.form', [
            'active'        => 'surat-keluar',
            'isEdit'        => false,
            'url'           => url('/petugas/surat-keluar'),
            'klasifikasis'  => Klasifikasi::latest()->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = $request->file('file');
        $nameFile = $file->hashName();

        Storage::putFile('/surat-keluar', $file);

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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $suratKeluar = SuratKeluar::find($id);
        $nameFile = $suratKeluar->file;

        if (!empty($file = $request->file('file'))) {
            Storage::delete('surat-keluar/' . $suratKeluar->file);

            $nameFile = $file->hashName();
            Storage::putFile('/surat-keluar', $file);
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function download($id)
    {
        $suratKeluar = SuratKeluar::find($id);
        return Storage::download('surat-keluar/' . $suratKeluar->file);
    }
}
