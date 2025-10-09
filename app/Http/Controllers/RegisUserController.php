<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisUserController extends Controller
{
    //menampilkan data user
    public function index()
    {
        $users = User::all(); //Ambil semua data dari model Monitor
        $totalUser = User::count();
        $newUsersToday = User::whereDate('created_at', now()->today())->count();
        $newUsersThisMonth = User::whereMonth('created_at', now()->month)->whereYear('created_at', now()->year)->count();
        
        return view('Admin_Pannel.Admin_Pannel4', [
            'users'=>$users,
            'totalUser'=>$totalUser,
            'newUsersToday'=>$newUsersToday,
            'newUsersThisMonth'=>$newUsersThisMonth
        ]);
    }

    //menampilkan form tambah user
    public function create(){
        return view('User_Login.User_Regis');
    }

    //mengirim data user
    public function store(Request $request)
    {
        // validasi input
        $request->validate([
            'username' => 'required',
            'email'=>'required',
            'password' => 'required',
        ]);

        // simpan ke database (hash password dulu)
        User::create([
            'username' => $request->username,
            'email'=> $request->email,
            'password' => Hash::make($request->password),
        ]);

        // redirect kembali ke halaman home
        return redirect()->route('register.form');
    }

    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('user.index');
    }

}
