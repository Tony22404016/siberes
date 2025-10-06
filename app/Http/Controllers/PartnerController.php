<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partner;

class PartnerController extends Controller
{
    //funsi index
    public function index(){
        $Tukangs = Partner::all(); //Ambil semua data dari model Monitor
        $JumlahTukang = Partner::count();
        $TukangSibuk = Partner::where('status', 'sibuk')->count();
        $TukangBersedia = Partner::where('status', 'bersedia')->count();
        
        return view('Admin_Pannel.Admin_Pannel3', compact('Tukangs', 'JumlahTukang', 'TukangSibuk', 'TukangBersedia'));
    }

    //fungsi create
    public function create(){
        return view('Add_Data.Add_Partner');
    }

    public function store(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'phone_number'=>'required',
            'bank_account_number'=>'required',
            'address'=>'required',
            'skills'=>'required',
            'status'=>'nullable',
        ]);

        Partner::create($request->all());

        return redirect()->back()->with('success', 'Selamat Anda telah Terdaftar sebagai Mitra. kami akan segera menghubungi anda jika ada pesanan');
    }

    //menghapus data pesanan
    public function destroy($id)
    {
        Partner::find($id)->delete();
        return redirect()->route('partner.index');
    }


}
