<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LoginAdminController extends Controller
{
    // tampilkan halaman login
    public function showLoginForm()
    {
        // Pastikan view 'login' ada di folder resources/views/
        return view('Admin_Login.Admin_Login'); 
    }

    // proses login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'name'=>'required | string',
            'email'=>'required | string',
            'password'=>'required'
        ]);

        if(Auth::guard('admin')->attempt($credentials)){

            $request->session()->regenerate();
            return redirect()->intended('/Orders');
        }

        return back()->withErrors([
            'login_error' => 'Username atau Password salah. Silakan coba lagi.',]); 
    }

    // Metode untuk Logout
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}