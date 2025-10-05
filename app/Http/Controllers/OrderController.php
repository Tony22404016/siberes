<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $Orders = Order::with(['user', 'product'])->get();
        $totalOrder = Order::count();
        $on_prosess = Order::where('status', 'diproses')->count();
        $finish = Order::where('status', 'selesai')->count();

        return view('Admin_Pannel.Admin_Pannel1', [
            'Orders' => $Orders,
            'totalOrder' => $totalOrder,
            'on_prosess' => $on_prosess,
            'finish' => $finish
        ]);
    }

    public function create($id)
    {
        $service = Service::find($id);
        return view('Checkout', compact('service')); 
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'service_id'      => 'required|exists:services,service_id',
            'home_address'    => 'required|string|max:255',
            'date'            => 'required|date',
            'whatsapp_number' => 'required|string|max:15',
        ]);

        $number = $request->whatsapp_number;

        //Normalisasi format ke 628xxxxxxxxx
        $number = preg_replace('/[^0-9+]/', '', $number); // hapus spasi atau simbol lain

        if (substr($number, 0, 1) === '0') {
            $number = '62' . substr($number, 1);
        } elseif (substr($number, 0, 3) === '+62') {
            $number = substr($number, 1); // hilangkan tanda +
        }

        // otomatis ambil user login
        $validated['user_id'] = Auth::id();

        Order::create($validated);

        return redirect()->route('checkout.form', ['id' => $validated['service_id']])
                 ->with('success', 'Pesanan berhasil dibuat!');
    }
}
