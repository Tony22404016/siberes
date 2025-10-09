<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\StreamedResponse; //ini buat fitur unduh data

class OrderController extends Controller
{
    //tampilkan semua data kehalaman admin panel
    public function index()
    {
        $Orders = Order::with(['user', 'service'])->get();
        $totalOrder = Order::count();
        $on_prosess = Order::where('status', 'diproses')->count();
        $finish = Order::where('status', 'selesai')->count();

        return view('Admin_Pannel.Admin_Pannel2', [
            'Orders' => $Orders,
            'totalOrder' => $totalOrder,
            'on_prosess' => $on_prosess,
            'finish' => $finish
        ]);
    }


    //tampilkan form checkout
    public function create($id)
    {
        $service = Service::find($id);
        return view('Checkout', compact('service')); 
    }


    //kirim data pesanan ke database
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
        else {
            // Kalau formatnya aneh (misal tanpa 0 atau 62)
            $number = '62' . $number;
        }

        // Masukkan kembali hasil normalisasi ke data validasi
        $validated['whatsapp_number'] = $number;

        // otomatis ambil user login
        $validated['user_id'] = Auth::id();

        Order::create($validated);

        return redirect()->route('checkout.form', ['id' => $validated['service_id']])
                ->with('success', 'Pesanan berhasil dibuat!');
    }

    //hapus data pesanan
    public function destroy($id){
        Order::find($id)->delete();
        return redirect()->route('order.index');
    }

    //Unduh data via CSV
    public function exportOrders()
    {
        $fileName = 'orders_' . date('Y-m-d_H-i-s') . '.csv';

        $response = new StreamedResponse(function () {
            $handle = fopen('php://output', 'w');

            // Header kolom CSV
            fputcsv($handle, [
                'Order_ID',
                'Customer_Name',
                'Service_Name',
                'Price',
                'Address',
                'Date',
                'WhatsApp_Number'
            ]);

            // Ambil semua data order
            $orders = Order::with('user', 'service')->get();

            foreach ($orders as $order) {
                fputcsv($handle, [
                    $order->order_id,
                    $order->user->username ?? '-',
                    $order->service->service_name ?? '-',
                    $order->service->service_price ?? '-',
                    $order->home_address,
                    $order->date,
                   "'".$order->whatsapp_number
                ]);
            }

            fclose($handle);
        });

        $response->headers->set('Content-Type', 'text/csv');
        $response->headers->set('Content-Disposition', 'attachment; filename="'.$fileName.'"');

        return $response;
    }

    public function edit($id)
    {
        $order = Order::findOrFail($id);
        return view('Update_Data.Update_Order', compact('order'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:diproses,selesai,dibatalkan',
        ]);

        $order = Order::findOrFail($id);

        $order->update([
            'status' => $request->status,
        ]);

        return redirect()->route('order.index');
    }

    


}
