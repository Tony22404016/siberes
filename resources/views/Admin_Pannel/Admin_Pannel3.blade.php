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
                <h3>Partner Quantity</h3>
                <p>{{$JumlahTukang}}</p>
            </div>
            <div class="stat-card">
                <h3>Partner Ready</h3>
                <p>{{$TukangBersedia}}</p>
            </div>
            <div class="stat-card">
                <h3>Partner Bussy</h3>
                <p>{{$TukangSibuk}}</p>
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
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone_Number</th>
                        <th>Bank_Account</th>
                        <th>Address</th>
                        <th>Skill</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($Tukangs as $Tukang )
                    <tr>
                        <td>{{$Tukang->id}}</td>
                        <td>{{$Tukang->name }}</td>
                        <td>{{$Tukang->email}}</td>
                        <td>{{$Tukang->phone_number}}</td>
                        <td>{{$Tukang->bank_account_number}}</td>
                        <td>{{$Tukang->address}}</td>
                        <td>{{$Tukang->skills}}</td>
                        <td>{{$Tukang->status}}</td>
                        <td>
                            <a href="{{route('partner.edit', $Tukang->id)}}"><button class="btn btn-edit"><i class="fas fa-edit"></i> Edit</button></a>
                            <form action="{{route('partner.destroy',$Tukang->id)}}" method="POST">
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