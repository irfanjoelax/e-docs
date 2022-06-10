<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        return view('auth.profile', [
            'active' => 'User Profile'
        ]);
    }

    public function update(Request $request)
    {
        User::find(Auth::id())->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return back()->with('alert-primary', 'Your profile has been updated!');
    }
}
