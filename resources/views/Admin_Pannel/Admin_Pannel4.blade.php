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
                <h3>Total User</h3>
                <p>{{$totalUser}}</p>
            </div>
            <div class="stat-card">
                <h3>New User</h3>
                <p>{{$newUsersToday}}</p>
            </div>
            <div class="stat-card">
                <h3>New User This Month</h3>
                <p>{{$newUsersThisMonth}}</p>
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
                        <th>User_ID</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Created_At</th>
                        <th>Updated_At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user )
                    <tr>
                        <td>{{$user->user_id}}</td>
                        <td>{{$user->username}}</td>
                        <td>{{$user->email}}</td>
                        <td>••••••••</td>
                        <td>{{$user->created_at}}</td>
                        <td>{{$user->updated_at}}</td>
                        <td>
                            <form action="{{route('user.destroy',$user->user_id)}}" method="POST">
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