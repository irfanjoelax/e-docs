<?php

namespace App\Http\Controllers\Role\Atasan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('role.atasan.home', [
            'active' => 'home'
        ]);
    }
}
