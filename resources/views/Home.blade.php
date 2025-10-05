<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Siberes | Jasa perawatan dan perbaikan apa rumah</title>
    <link rel="stylesheet" href="Home.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        wattup: 'tomato',
                        wattupDark: '#3aa142'
                    }
                }
            }
        }
    </script>
</head>
<body>
    <header class="header">
        <!-- Logo -->
        <div class="logo">
            <img src="asset/siberes logo.png" alt="logo siberes">
        </div>

        <!-- Navbar (Desktop) -->
        <nav class="navbar">
            <a href="#" class="nav-link">Beranda</a>
            <a href="#" class="nav-link">Layanan</a>
            <a href="#" class="nav-link">Tentang Kami</a>
            <a href="#" class="nav-link">Pesanan Saya</a>
            <a href="#" class="nav-link">Kontak</a>
        </nav>

        <!-- Search dan Login (Desktop) -->
        <div class="search-login">
            <div class="search-container">
                <input type="text" class="search-input" placeholder="Cari..." id="searchInput" oninput="filterProducts()">
                <button class="search-button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                    </svg>
                </button>
            </div>
            @guest
            <a href="/portal"><button class="login-button">Login</button></a>
            @endguest
            @auth
                <div class="hidden sm:flex items-center gap-2 px-3 py-1 bg-gray-100 rounded-full shadow-md hover:bg-gray-200 transition duration-200 cursor-pointer">
                    <i class="fa-solid fa-user text-blue-500 text-lg"></i>
                    <span class="font-semibold text-gray-800">{{ Auth::user()->username }}</span>
                </div>
            @endauth
        </div>

        <!-- Hamburger Menu (Mobile) -->
        <div class="hamburger" id="hamburger">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </header>

    <!-- Mobile Sidebar -->
    <div class="mobile-sidebar" id="mobileSidebar">
        <button class="close-sidebar" id="closeSidebar">&times;</button>
        
        <!-- Navbar (Mobile) -->
        <nav class="mobile-navbar">
            <a href="#" class="mobile-nav-link">Beranda</a>
            <a href="#" class="mobile-nav-link">Layanan</a>
            <a href="#" class="mobile-nav-link">Tentang Kami</a>
            <a href="#" class="mobile-nav-link">Pesanan Saya</a>
            <a href="#" class="mobile-nav-link">Kontak</a>
        </nav>

        <!-- Login (Mobile) -->
        @guest
        <a href="/portal"><button class="mobile-login-button">Login</button></a>
        @endguest
        @auth
            <div class="flex items-center gap-2 px-3 py-1 bg-gray-100 rounded-full shadow-md hover:bg-gray-200 transition duration-200 cursor-pointer">
                <i class="fa-solid fa-user text-blue-500 text-lg"></i>
                <span class="font-semibold text-gray-800">{{ Auth::user()->username }}</span>
            </div>
        @endauth
    </div>

    <!-- Overlay -->
    <div class="overlay" id="overlay"></div>

    <section class="hero-section">
        <!-- Video Background -->
        <video class="video-background" autoplay muted loop playsinline>
            <source src="asset/cinematic_builder.mp4" type="video/mp4">
            Browser Anda tidak mendukung tag video.
        </video>
        
        <!-- Layer Hitam Transparan -->
        <div class="Hero_overlay"></div>
        
        <!-- Konten Teks -->
        <div class="hero-content">
            <h1>SIBERES</h1>
            <p>Butuh bantuan apa aja? Dari angkat barang, bersih-bersih, sampai perbaikan kecil, Siberes siap dipanggil!</p>
            <a href="#layanan" class="cta-button">Lihat Layanan</a>
        </div>
    </section>

    <section style="padding: 1rem;">
        <h2 style="color: #333; font-family:poppins; font-weight:bold;">Kategori</h2>
        <div class="kategori-wrapper">
            
            <div class="kategori-item">
                <img src="asset/1.png" alt="Sepeda Listrik">
                <span>Listrik</span>
            </div>
            
            <div class="kategori-item">
                <img src="asset/2.png" alt="Baterai">
                <span>Ledeng & Air</span>
            </div>
            
            <div class="kategori-item">
                <img src="asset/3.png" alt="Charger">
                <span>Bangunan & Renovasi</span>
            </div>
            
            <div class="kategori-item">
                <img src="asset/4.png" alt="Spare Part">
                <span>Tukang Kayu</span>
            </div>
            
            <div class="kategori-item">
                <img src="asset/5.png" alt="Aksesoris">
                <span>Ac & Elektronik</span>
            </div>
            
            <div class="kategori-item">
                <img src="asset/6.png" alt="Lampu LED">
                <span>Cat & Finishing</span>
            </div>
            
            <div class="kategori-item">
                <img src="asset/7.png" alt="Rem">
                <span>Cleaning Service</span>
            </div>
            
            <div class="kategori-item">
                <img src="asset/8.png" alt="Oli">
                <span>Angkut Barang / Pindahan</span>
            </div>
            
            <div class="kategori-item">
                <img src="asset/9.png" alt="Tools">
                <span>Serabutan Harian</span>
            </div>
            
        </div>
    </section>

    <script src="Home.js"></script>

    <div class="bg-white/50 p-4 rounded-lg">
        <section class="container mx-auto px-4 py-6 bg-white rounded-sm">
            <h2 class="relative inline-block text-2xl font-bold text-blue-900 mb-6 font-[Poppins] after:content-[''] after:block after:w-16 after:h-[3px] after:bg-[tomato] after:mt-1 after:rounded-full">All Services</h2>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
                <!-- Product Card -->
                @foreach ($services as $service)
                <div class="product-card bg-white rounded-lg shadow-lg overflow-hidden">
                    <a href="{{ route('service.detail', $service->service_id) }}">
                        <img src="{{ asset('uploads/product/' . $service->service_image) }}" alt=""class="w-full aspect-[4/4] object-cover">
                    </a>
                    <div class="p-3">
                        <h3 class="product-name || text-sm font-medium mb-2 line-clamp-2">{{$service->service_name}}</h3>
                        <p class="text-wattup font-bold">Rp {{ number_format($service->service_price, 0, ',' ,'.')}}</p>
                        <div class="flex items-center mt-1">
                            <div class="flex text-yellow-400">
                                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>
                            </div>
                            <span class="text-xs text-gray-500 ml-1">(1,234)</span>
                        </div>
                        <p class="text-xs text-gray-500 mt-1">{{$service->location}}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </section>
    </div>


    <footer class="bg-[#192e4a] text-white shadow-xl pt-12 pb-6">
        <div class="container mx-auto px-4">
            <!-- Bagian utama footer (3 kolom di desktop) -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">
                
                <!-- Kolom 1: Logo & Deskripsi -->
                <div class="space-y-4">
                    <!-- Logo -->
                    <div class="flex items-center space-x-2">
                        <div class="w-10 h-10 bg-white rounded-lg flex items-center justify-center">
                            <span class="text-blue-900 font-bold text-xl">S</span>
                        </div>
                        <span class="text-xl font-bold text-white">Siberes</span>
                    </div>
                    
                    <!-- Deskripsi -->
                    <p class="text-blue-100 max-w-xs">
                        Solusi cepat untuk semua kebutuhan pertukangan & Jasa apapun. Dari rumah sampai kantor, kami siap bantu 🚀
                    </p>
                    
                    <!-- Sosial Media -->
                    <div class="flex space-x-4 pt-2">
                        <a href="#" class="text-blue-200 hover:text-white transition-colors">
                            <i class="fab fa-instagram text-xl"></i>
                        </a>
                        <a href="#" class="text-blue-200 hover:text-white transition-colors">
                            <i class="fab fa-facebook text-xl"></i>
                        </a>
                        <a href="#" class="text-blue-200 hover:text-white transition-colors">
                            <i class="fab fa-tiktok text-xl"></i>
                        </a>
                        <a href="#" class="text-blue-200 hover:text-white transition-colors">
                            <i class="fab fa-youtube text-xl"></i>
                        </a>
                    </div>
                </div>
                
                <!-- Kolom 2: Navigasi & Kategori -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <!-- Navigasi Cepat -->
                    <div>
                        <h3 class="text-lg font-semibold text-white mb-4">Navigasi Cepat</h3>
                        <ul class="space-y-2">
                            <li><a href="#" class="text-blue-100 hover:text-white transition-colors">Beranda</a></li>
                            <li><a href="#" class="text-blue-100 hover:text-white transition-colors">Tentang Kami</a></li>
                            <li><a href="#" class="text-blue-100 hover:text-white transition-colors">Layanan</a></li>
                            <li><a href="#" class="text-blue-100 hover:text-white transition-colors">Kategori Jasa</a></li>
                            <li><a href="#" class="text-blue-100 hover:text-white transition-colors">Kontak</a></li>
                        </ul>
                    </div>
                    
                    <!-- Kategori Jasa Populer -->
                    <div>
                        <h3 class="text-lg font-semibold text-white mb-4">Kategori Jasa</h3>
                        <ul class="space-y-2">
                            <li><a href="#" class="text-blue-100 hover:text-white transition-colors">Tukang Bangunan</a></li>
                            <li><a href="#" class="text-blue-100 hover:text-white transition-colors">Perbaikan Listrik</a></li>
                            <li><a href="#" class="text-blue-100 hover:text-white transition-colors">Servis Air & Pipa</a></li>
                            <li><a href="#" class="text-blue-100 hover:text-white transition-colors">Tukang Kebun</a></li>
                            <li><a href="#" class="text-blue-100 hover:text-white transition-colors">Angkut Barang</a></li>
                        </ul>
                    </div>
                </div>
                
                <!-- Kolom 3: Kontak & CTA -->
                <div class="space-y-6">
                    <!-- Kontak -->
                    <div>
                        <h3 class="text-lg font-semibold text-white mb-4">Hubungi Kami</h3>
                        <ul class="space-y-3">
                            <li class="flex items-start space-x-3">
                                <i class="fas fa-map-marker-alt text-blue-200 mt-1"></i>
                                <span class="text-blue-100">Jl. Tukang No. 123, Jakarta Selatan</span>
                            </li>
                            <li class="flex items-center space-x-3">
                                <i class="fas fa-phone text-blue-200"></i>
                                <span class="text-blue-100">(021) 1234-5678</span>
                            </li>
                            <li class="flex items-center space-x-3">
                                <i class="fab fa-whatsapp text-blue-200"></i>
                                <a href="https://wa.me/6281234567890" class="text-blue-100 hover:text-white transition-colors">+62 812-3456-7890</a>
                            </li>
                            <li class="flex items-center space-x-3">
                                <i class="fas fa-envelope text-blue-200"></i>
                                <a href="mailto:info@serabutanku.com" class="text-blue-100 hover:text-white transition-colors">info@serabutanku.com</a>
                            </li>
                        </ul>
                    </div>
                    
                </div>
            </div>
            
            <!-- Garis pemisah -->
            <div class="border-t border-blue-700 pt-6 mt-4">
                <!-- Bagian legal -->
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <p class="text-blue-200 text-sm mb-4 md:mb-0">
                        © 2025 Siberes. All rights reserved.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-blue-200 hover:text-white text-sm transition-colors">Syarat & Ketentuan</a>
                        <a href="#" class="text-blue-200 hover:text-white text-sm transition-colors">Kebijakan Privasi</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>