<?php

namespace App\Http\Controllers\Role\Petugas;

use App\Http\Controllers\Controller;
use App\Models\Instansi;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('role.petugas.home', [
            'active' => 'home',
            'instansi' => Instansi::find(1),
        ]);
    }
}
