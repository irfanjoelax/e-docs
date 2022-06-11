<?php

namespace App\Http\Controllers\Role\Admin;

use App\Http\Controllers\Controller;
use App\Models\Golongan;
use App\Models\Jabatan;
use App\Models\Pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Pegawai $pegawais)
    {
        $keyword = $request->input('keyword');

        $pegawais = $pegawais->when($keyword, function ($query) use ($keyword) {
            return $query->where('nama', 'like', '%' . $keyword . '%');
        })->with('golongan', 'jabatan')->latest()->paginate(10);

        return view('role.admin.pegawai.index', [
            'active'    => 'pegawai',
            'request'   => $request->all(),
            'pegawais'  => $pegawais
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('role.admin.pegawai.form', [
            'active'    => 'pegawai',
            'isEdit'    => false,
            'url'       => url('/admin/pegawai'),
            'golongans' => Golongan::latest()->get(),
            'jabatans'  => Jabatan::latest()->get(),
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
        Pegawai::create([
            'nip'           => $request->nip,
            'nama'          => $request->nama,
            'golongan_id'   => $request->golongan_id,
            'jabatan_id'    => $request->jabatan_id,
            'tgl_lahir'     => $request->tgl_lahir,
            'telp'          => $request->telp,
            'alamat'        => $request->alamat,
            'status'        => $request->status,
        ]);

        return redirect('/admin/pegawai')
            ->with('alert-primary', 'Data pegawai has been created');
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
        return view('role.admin.pegawai.form', [
            'active'    => 'pegawai',
            'isEdit'    => true,
            'url'       => url('/admin/pegawai/' . $id),
            'pegawai'   => Pegawai::find($id),
            'golongans' => Golongan::latest()->get(),
            'jabatans'  => Jabatan::latest()->get(),
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
        Pegawai::find($id)->update([
            'nip'           => $request->nip,
            'nama'          => $request->nama,
            'golongan_id'   => $request->golongan_id,
            'jabatan_id'    => $request->jabatan_id,
            'tgl_lahir'     => $request->tgl_lahir,
            'telp'          => $request->telp,
            'alamat'        => $request->alamat,
            'status'        => $request->status,
        ]);

        return redirect('/admin/pegawai')
            ->with('alert-warning', 'Data pegawai has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pegawai::find($id)->delete();

        return redirect('/admin/pegawai')
            ->with('alert-danger', 'Data pegawai has been deleted');
    }
}
