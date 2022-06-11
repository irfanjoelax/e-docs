<?php

namespace App\Http\Controllers\Role\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jabatan;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Jabatan $jabatans)
    {
        $keyword = $request->input('keyword');

        $jabatans = $jabatans->when($keyword, function ($query) use ($keyword) {
            return $query->where('jabatan', 'like', '%' . $keyword . '%');
        })->latest()->paginate(10);

        return view('role.admin.jabatan.index', [
            'active'        => 'jabatan',
            'request'       => $request->all(),
            'jabatans'  => $jabatans
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('role.admin.jabatan.form', [
            'active'    => 'jabatan',
            'isEdit'    => false,
            'url'       => url('/admin/jabatan'),
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
        Jabatan::create([
            'jabatan'      => $request->jabatan,
        ]);

        return redirect('/admin/jabatan')
            ->with('alert-primary', 'Jabatan has been created');
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
        return view('role.admin.jabatan.form', [
            'active'        => 'jabatan',
            'isEdit'        => true,
            'url'           => url('/admin/jabatan/' . $id),
            'jabatan'   => Jabatan::find($id),
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
        Jabatan::find($id)->update([
            'jabatan'      => $request->jabatan,
        ]);

        return redirect('/admin/jabatan')
            ->with('alert-warning', 'Jabatan has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Jabatan::find($id)->delete();

        return redirect('/admin/jabatan')
            ->with('alert-danger', 'Jabatan has been deleted');
    }
}
