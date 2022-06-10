<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function index()
    {
        return view('auth.change_password', [
            'active' => 'Change Password'
        ]);
    }

    public function update(Request $request)
    {
        User::find(Auth::id())->update([
            'password' => Hash::make($request->password),
        ]);

        return back()->with('alert-primary', 'Your password has been updated!');
    }
}
