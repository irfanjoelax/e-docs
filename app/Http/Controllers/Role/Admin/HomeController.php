<?php

namespace App\Http\Controllers\Role\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('role.admin.home');
    }
}
