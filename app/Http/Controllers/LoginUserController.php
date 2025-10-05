<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class LoginUserController extends Controller
{
    // tampilkan halaman login
    public function showLoginForm()
    {
        // Pastikan view 'login' ada di folder resources/views/
        return view('User_Login.User_Login'); 
    }

    // proses login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username'=>'required | string',
            'password'=>'required'
        ]);

        if(Auth::guard('web')->attempt($credentials)){

            $request->session()->regenerate();
            return redirect()->intended('/');
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
