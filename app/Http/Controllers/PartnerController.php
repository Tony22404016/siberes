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
        $validated = $request->validate([
            'name'=>'required',
            'email'=>'required',
            'phone_number'=>'required',
            'bank_account_number'=>'required',
            'address'=>'required',
            'skills'=>'required',
            'status'=>'nullable',
        ]);

        $number = $request->phone_number;

        //Normalisasi format ke 628xxxxxxxxx
        $number = preg_replace('/[^0-9+]/', '', $number); // hapus spasi atau simbol lain

        if (substr($number, 0, 1) === '0') {
            $number = '62' . substr($number, 1);
        } elseif (substr($number, 0, 3) === '+62') {
            $number = substr($number, 1); // hilangkan tanda +
        }
        else {
            // Kalau formatnya aneh (misal tanpa 0 atau 62)
            $number = '62' . $number;
        }

        $validated['phone_number'] = $number;

        Partner::create($validated);

        return redirect()->back()->with('success', 'Selamat Anda telah Terdaftar sebagai Mitra. kami akan segera menghubungi anda jika ada pesanan');
    }

    //menghapus data pesanan
    public function destroy($id)
    {
        Partner::find($id)->delete();
        return redirect()->route('partner.index');
    }


}
