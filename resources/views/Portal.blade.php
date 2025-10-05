<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Portal</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --navy: #001f3f;
            --navy-light: #003366;
            --white: #ffffff;
            --orange: #FF851B;
            --orange-light: #FFA04D;
            --gray: #f5f5f5;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: var(--gray);
            color: var(--navy);
            line-height: 1.6;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        
        header {
            text-align: center;
            margin-bottom: 3rem;
        }
        
        .logo {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--navy);
            margin-bottom: 1rem;
        }
        
        .logo span {
            color: var(--orange);
        }
        
        .tagline {
            font-size: 1.2rem;
            color: var(--navy-light);
        }
        
        .login-options {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin-bottom: 3rem;
        }
        
        .login-card {
            background: var(--white);
            border-radius: 10px;
            padding: 2rem;
            text-align: center;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
            cursor: pointer;
            border-top: 5px solid var(--orange);
        }
        
        .login-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }
        
        .login-card i {
            font-size: 3rem;
            color: var(--orange);
            margin-bottom: 1.5rem;
        }
        
        .login-card h2 {
            margin-bottom: 1rem;
            color: var(--navy);
        }
        
        .login-card p {
            color: var(--navy-light);
            margin-bottom: 1.5rem;
        }
        
        .btn {
            display: inline-block;
            padding: 0.8rem 1.5rem;
            background: var(--orange);
            color: var(--white);
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            font-weight: 600;
            text-decoration: none;
            transition: background 0.3s;
            cursor: pointer;
        }
        
        .btn:hover {
            background: var(--orange-light);
        }
        
        .register-section {
            text-align: center;
            padding: 2rem;
            background: var(--white);
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        .register-section h2 {
            margin-bottom: 1rem;
            color: var(--navy);
        }
        
        .register-section p {
            color: var(--navy-light);
            margin-bottom: 1.5rem;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }
        
        footer {
            text-align: center;
            margin-top: 3rem;
            color: var(--navy-light);
            font-size: 0.9rem;
        }
        
        @media (max-width: 768px) {
            .login-options {
                grid-template-columns: 1fr;
            }
            
            .logo {
                font-size: 2rem;
            }
            
            .tagline {
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <div class="logo">Portal<span>Login</span></div>
            <p class="tagline">Silakan pilih metode login yang sesuai dengan peran Anda</p>
        </header>
        
        <div class="login-options">
            <div class="login-card">
                <i class="fas fa-user"></i>
                <h2>Login Sebagai Pengguna</h2>
                <p>Akses dashboard pengguna biasa dengan fitur lengkap untuk kebutuhan harian Anda.</p>
                <a href="{{route('login')}}" class="btn">Masuk sebagai User</a>
            </div>
            
            <div class="login-card">
                <i class="fas fa-user-plus"></i>
                <h2>Daftar Akun Baru</h2>
                <p>Bergabunglah dengan kami dan dapatkan akses ke semua fitur yang tersedia.</p>
                <a href="{{route('register.form')}}" class="btn">Daftar Sekarang</a>
            </div>
        </div>
        
        <div class="register-section">
            <h2>Daftar Sebagai Mitra</h2>
            <p>Daftarkan diri Anda sekarang untuk mendapatkan akses penuh ke semua layanan kami. Proses pendaftaran cepat dan mudah, hanya membutuhkan beberapa menit saja.</p>
            <a href="{{route('register.form')}}" class="btn">Buat Akun Baru</a>
        </div>
        
        <footer>
            &copy; 2025 Portal Login. All rights reserved.
        </footer>
    </div>
</body>
</html>