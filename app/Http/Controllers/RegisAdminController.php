<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisAdminController extends Controller
{
    public function index()
    {
        $admins = Admin::all(); //Ambil semua data dari model Monitor
        $totalAdmin = Admin::count();
        
        return view('Admin_Pannel.Admin_Pannel4', [
            'admins'=>$admins,
            'totalAdmin'=>$totalAdmin
        ]);
    }

    public function create(){
        return view('Admin_Login.Admin_Regis');
    }

     public function store(Request $request)
    {
        // validasi input
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:admins,email',
            'password' => 'required',
        ], [
        'email.unique' => 'maaf sepertinya akun tersebut telah terdaftar',]);

        // simpan ke database (hash password dulu)
        Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect(route('product.home'));
    }
}
