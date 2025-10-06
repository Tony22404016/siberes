<?php

namespace App\Http\Controllers;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        $service_count = Service::count();
        $inStock = Service::where('stock', '>=', 1)->count();
        $outStock = Service::where('stock', '<=', 1)->count();
        return view('Admin_Pannel.Admin_Pannel1', ['services'=>$services, 'service_count'=>$service_count, 'instock'=>$inStock, 'outstock'=>$outStock ]);
    }


    public function home()
    {
        $services = Service::all(); //Ambil semua data dari model Monitor
        return view('Home', ['services'=>$services]);
    }

    public function detail($id)
    {
        $services = Service::findOrFail($id); // cari berdasarkan primaryKey (product_id)
        return view('Detail_Service', compact('services'));
    }

    public function create (){
        return view('Add_Data.Add_Service');
    }

    public function store(Request $request)
    {
        $request->validate([
            'service_image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'service_name' => 'required',
            'service_description' => 'required',
            'service_price' => 'required',
            'stock' => 'required',
            'location' => 'required',
        ]);

        $fileName = time() . '.' . $request->service_image->extension();
        $request->service_image->move(public_path('uploads/product'), $fileName);

        // Simpan ke database harus kaya gini biar gambarnya jalan
        Service::create([
            'service_image'         => $fileName, // simpan nama file, bukan object
            'service_name'          => $request->service_name,
            'service_description'   => $request->service_description,
            'service_price'         => $request->service_price,
            'stock'         => $request->stock,
            'location'      => $request->location, 
        ]);

        return redirect()->route('service.index');
    }

    public function edit($id)
    {
        $service = Service::findOrFail($id);
        return view('Update_Data.Update_Service', compact('service'));
    }

    
    public function update(Request $request, $id)
    {
        $service = Service::findOrFail($id);

        $request->validate([
            'service_name' => 'required|string|max:255',
            'service_price' => 'required|numeric',
            'stock' => 'required|integer',
            'location' => 'required|string|max:255',
            'service_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // Update field teks
        $service->service_name = $request->service_name;
        $service->service_price = $request->service_price;
        $service->stock = $request->stock;
        $service->location = $request->location;

        // Update gambar jika ada file baru
        if ($request->hasFile('service_image')) {
            $oldImage = public_path('uploads/product/' . $service->service_image);
            if (file_exists($oldImage)) {
                unlink($oldImage);
            }

            $fileName = time() . '.' . $request->service_image->extension();
            $request->service_image->move(public_path('uploads/product'), $fileName);
            $service->service_image = $fileName;
        }

        $service->save();

        return redirect()->route('service.index')->with('success', 'Produk berhasil diperbarui!');
    }

    public function destroy($id)
    {
        Service::find($id)->delete();
        return redirect()->route('service.index');
    }
}
