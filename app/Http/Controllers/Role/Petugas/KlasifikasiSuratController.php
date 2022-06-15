<?php

namespace App\Http\Controllers\Role\Petugas;

use App\Http\Controllers\Controller;
use App\Models\Klasifikasi;
use Illuminate\Http\Request;

class KlasifikasiSuratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Klasifikasi $klasifikasis)
    {
        $keyword = $request->input('keyword');

        $klasifikasis = $klasifikasis->when($keyword, function ($query) use ($keyword) {
            return $query->where('nama', 'like', '%' . $keyword . '%');
        })->latest()->paginate(10);

        return view('role.petugas.klasifikasi.index', [
            'active'        => 'klasifikasi',
            'request'       => $request->all(),
            'klasifikasis'  => $klasifikasis
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('role.petugas.klasifikasi.form', [
            'active'    => 'klasifikasi',
            'isEdit'    => false,
            'url'       => url('/petugas/klasifikasi'),
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
        Klasifikasi::create([
            'nama'      => $request->nama,
            'kode'      => $request->kode,
            'uraian'    => $request->uraian,
        ]);

        return redirect('/petugas/klasifikasi')
            ->with('alert-primary', 'Klasifikasi surat has been created');
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
        return view('role.petugas.klasifikasi.form', [
            'active'        => 'klasifikasi',
            'isEdit'        => true,
            'url'           => url('/petugas/klasifikasi/' . $id),
            'klasifikasi'   => Klasifikasi::find($id),
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
        Klasifikasi::find($id)->update([
            'nama'      => $request->nama,
            'kode'      => $request->kode,
            'uraian'    => $request->uraian,
        ]);

        return redirect('/petugas/klasifikasi')
            ->with('alert-warning', 'Klasifikasi surat has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Klasifikasi::find($id)->delete();

        return redirect('/petugas/klasifikasi')
            ->with('alert-danger', 'Klasifikasi surat has been deleted');
    }
}
