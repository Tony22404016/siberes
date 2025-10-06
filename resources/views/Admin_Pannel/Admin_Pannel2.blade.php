<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel Siberes</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="Admin_Pannel.css">
    <script src="https://cdn.tailwindcss.com"></script>
    
</head>
<body>
    
    @extends('Layout.Slidebar')
    @section('container')
    <!-- Main Content Section -->
    <div class="main-content">
        <div class="header">
            <h1 class="page-title">
                <i class="fas fa-shopping-cart"></i>
                Order Management
            </h1>

            @auth
                <div class="user-info">
                    <div class="w-9 h-9 flex items-center justify-center rounded-full border border-white bg-blue-600">
                        <i class="fa-solid fa-user text-white text-lg"></i>
                    </div>

                    <span class="admin-name">
                        <span class="text-grey font-medium text-lg">
                            {{ Auth::guard('admin')->user()->name }}
                        </span>
                    </span>
                </div>
            @endauth
            
        </div>
        
        <div class="stats-container">
            <div class="stat-card">
                <h3>Total Order</h3>
                <p>{{$totalOrder}}</p>
            </div>
            <div class="stat-card">
                <h3>Order on prosess</h3>
                <p>{{$on_prosess}}</p>
            </div>
            <div class="stat-card">
                <h3>Order Finish</h3>
                <p>{{$finish}}</p>
            </div>
        </div>
        
        <div class="action-bar">
            <div class="search-box">
                <i class="fas fa-search"></i>
                <input type="text" placeholder="Search Product..." id="searchInput" oninput="dataFilter()">
            </div>
        </div>
        
        <div class="table-container">
            <table id="productTable">
                <thead>
                    <tr>
                        <th>Order_ID</th>
                        <th>Customer_Name</th>
                        <th>Service_Name</th>
                        <th>Price</th>
                        <th>Home_Address</th>
                        <th>Date</th>
                        <th>Whatsapp_Number</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($Orders as $order )
                    <tr>
                        <td>{{$order->order_id}}</td>
                        <td>{{$order->user->username ?? 'N/A' }}</td>
                        <td>{{$order->service->service_name}}</td>
                        <td>Rp{{ number_format($order->service->service_price,0, ',', '.') }}</td>
                        <td>{{$order->home_address}}</td>
                        <td>{{$order->date}}</td>
                        <td>{{$order->whatsapp_number}}</td>
                        <td>{{$order->status}}</td>
                        <td>
                            <div class="flex flex-col items-center space-y-1 text-sm">
                                <!-- Tombol WhatsApp -->
                                <a href="https://wa.me/{{ $order->whatsapp_number }}?text=Halo {{ $order->user->username ?? 'Pelanggan Terhormat' }} Terima kasih telah memesan layanan di *Siberes!*%0A%0ATim kami telah menerima pesanan Anda. Berikut *Detail Pesanan:*%0A • Nama Layanan : {{ $order->service->service_name }}%0A • Harga : Rp{{ number_format($order->service->service_price,0,',','.') }}%0A • Tanggal Pesanan : {{ $order->date }}%0A • Alamat : {{ $order->home_address }}%0A%0ASilakan lanjut ke tahap *pembayaran*, atau hubungi kami jika ada pertanyaan atau ingin *konsultasi lebih lanjut.*%0A%0ATerima kasih telah mempercayakan layanan Anda kepada *Siberes!*" target="_blank" class="flex items-center text-blue-500 hover:text-blue-600 transition-colors duration-200"><i class="fa-brands fa-whatsapp mr-1"></i></a>

                                <!-- Tombol Edit -->
                                <a 
                                    href="{{ route('order.edit', $order->order_id) }}" 
                                    class="flex items-center text-green-500 hover:text-green-600 transition-colors duration-200"
                                >
                                    <i class="fas fa-edit mr-1"></i>
                                </a>

                                <!-- Tombol Hapus -->
                                <form 
                                    action="{{ route('order.destroy', $order->order_id) }}" 
                                    method="POST" 
                                    onsubmit="return confirm('Yakin hapus?')"
                                    class="flex items-center"
                                >
                                    @csrf
                                    @method('DELETE')
                                    <button 
                                        type="submit" 
                                        class="flex items-center text-red-500 hover:text-red-600 transition-colors duration-200"
                                    >
                                        <i class="fas fa-trash mr-1"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endsection

    <script src="Admin_pannel.js"></script>
</body>
</html>