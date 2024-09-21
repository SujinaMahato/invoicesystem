<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    //
    public function login(){
        return view('auth.login');
    }
    public function AdminLogin(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required|min:6',
    ]);

    $credentials = $request->only('email', 'password');

    if (Auth::guard('admin')->attempt($credentials)) {
        
        //dd('Admin authenticated successfully');
        return redirect()->route('admin.dashboard');
    }
    return redirect()->back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
    ]);
    }

    public function dashboard(){
        return view('admin.dashboard');
        
    }
}
