<?php

namespace App\Http\Controllers\Role\Admin;

use App\Http\Controllers\Controller;
use App\Models\Golongan;
use Illuminate\Http\Request;

class GolonganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Golongan $golongans)
    {
        $keyword = $request->input('keyword');

        $golongans = $golongans->when($keyword, function ($query) use ($keyword) {
            return $query->where('golongan', 'like', '%' . $keyword . '%');
        })->latest()->paginate(10);

        return view('role.admin.golongan.index', [
            'active'        => 'golongan',
            'request'       => $request->all(),
            'golongans'  => $golongans
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('role.admin.golongan.form', [
            'active'    => 'golongan',
            'isEdit'    => false,
            'url'       => url('/admin/golongan'),
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
        Golongan::create([
            'golongan'      => $request->golongan,
        ]);

        return redirect('/admin/golongan')
            ->with('alert-primary', 'Golongan has been created');
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
        return view('role.admin.golongan.form', [
            'active'        => 'golongan',
            'isEdit'        => true,
            'url'           => url('/admin/golongan/' . $id),
            'golongan'   => Golongan::find($id),
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
        Golongan::find($id)->update([
            'golongan'      => $request->golongan,
        ]);

        return redirect('/admin/golongan')
            ->with('alert-warning', 'Golongan has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Golongan::find($id)->delete();

        return redirect('/admin/golongan')
            ->with('alert-danger', 'Golongan has been deleted');
    }
}
