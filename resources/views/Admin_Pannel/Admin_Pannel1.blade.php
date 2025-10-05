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
                Service Management
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
                <h3>Product Quantity</h3>
                <p>{{$service_count}}</p>
            </div>
            <div class="stat-card">
                <h3>Products In Stock</h3>
                <p>{{$instock}}</p>
            </div>
            <div class="stat-card">
                <h3>Products Out of Stock</h3>
                <p>{{$outstock}}</p>
            </div>
        </div>
        
        <div class="action-bar">
            <div class="search-box">
                <i class="fas fa-search"></i>
                <input type="text" placeholder="Search Product..." id="searchInput" oninput="dataFilter()">
            </div>
            <a href="/addProduct" style="text-decoration: none;">
                <button class="btn btn-add">
                    <i class="fas fa-plus"></i> Add Product
                </button>
            </a>
        </div>
        
        <div class="table-container">
            <table id="productTable">
                <thead>
                    <tr>
                        <th>Service_ID</th>
                        <th>Service_Image</th>
                        <th>Service_Name</th>
                        <th>Service_Price</th>
                        <th>Partner_Quantity</th>
                        <th>Location</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($services as $service )
                    <tr>
                        <td>{{$service->service_id}}</td>
                        <td>
                            <img class="h-10 w-10 rounded-full" src="{{ asset('uploads/product/' . $service->service_image) }}" alt="Service Image">
                        </td>
                        <td>{{$service->service_name}}</td>
                        <td>Rp{{ number_format($service->service_price, 0, ',' ,'.')}}</td>
                        <td>{{$service->stock}}</td>
                        <td>{{$service->location}}</td>
                        <td>
                            <a href="{{route('service.edit', $service->service_id)}}"><button class="btn btn-edit"><i class="fas fa-edit"></i> Edit</button></a>
                            <form action="{{route('service.destroy',$service->service_id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-delete" onclick = "return confirm('Yakin hapus?')"><i class="fas fa-trash"></i> Delete</button>
                            </form>
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