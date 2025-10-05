<div class="menu-toggle" id="menuToggle">
        <i class="fas fa-bars"></i>
    </div>

    <!-- Sidebar Section -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <div class="logo">S</div>
            <h2>Admin Panel</h2>
            @auth
                <div class="flex items-center gap-3">
                    <div class="w-9 h-9 flex items-center justify-center rounded-full border border-white">
                        <i class="fa-solid fa-user text-white text-lg"></i>
                    </div>
                    <span class="text-white font-medium">
                        {{ Auth::guard('admin')->user()->name }}
                    </span>
                </div>
            @endauth
        </div>
        <div class="sidebar-menu">
            <div class="menu-item active">
                <i class="fas fa-chart-line"></i>
                <a href="" style="text-decoration: none; color:#333"><span>Dashboard</span></a>
            </div>
            <div class="menu-item">
                <i class="fas fa-shopping-cart"></i>
                <a href="" style="text-decoration: none; color:#333"><span>Orders</span></a>
            </div>
            <div class="menu-item">
                <i class="fas fa-users"></i>
                <a href="" style="text-decoration: none; color:#333"><span>Users</span></a>
            </div>
            <div class="menu-item">
                <i class="fas fa-hard-hat"></i>
                <a href="/admins" style="text-decoration: none; color:#333"><span>Partners</span></a>
            </div>
            <div class="menu-item">
                <i class="fas fa-screwdriver-wrench"></i>
                <a href="" style="text-decoration: none; color:#333"><span>Services</span></a>
            </div>
            <div class="menu-item">
                <i class="fas fa-users-cog"></i>
                <a href="/admins" style="text-decoration: none; color:#333"><span>Admins</span></a>
            </div>

            <div class="menu-item">
                <i class="fas fa-sign-out-alt"></i>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            </div>
        </div>
    </div>

    @yield('container')