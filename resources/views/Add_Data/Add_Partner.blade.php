<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Mitra - Siberes</title>
    <style>
        :root {
            --primary-blue: #1a73e8;
            --secondary-blue: #4285f4;
            --light-blue: #e8f0fe;
            --dark-blue: #0d47a1;
            --white: #ffffff;
            --light-gray: #f8f9fa;
            --medium-gray: #dadce0;
            --dark-gray: #5f6368;
            --error: #ea4335;
            --success: #34a853;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: var(--light-blue);
            color: var(--dark-gray);
            line-height: 1.6;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        
        header {
            background-color: var(--white);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px 0;
            position: sticky;
            top: 0;
            z-index: 100;
        }
        
        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .logo-icon {
            width: 40px;
            height: 40px;
            background-color: var(--primary-blue);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--white);
            font-weight: bold;
            font-size: 20px;
        }
        
        .logo-text {
            font-size: 24px;
            font-weight: 700;
            color: var(--primary-blue);
        }
        
        .hero {
            padding: 60px 0;
            text-align: center;
            background: linear-gradient(135deg, var(--primary-blue), var(--dark-blue));
            color: var(--white);
            border-radius: 0 0 20px 20px;
            margin-bottom: 40px;
        }
        
        .hero h1 {
            font-size: 2.5rem;
            margin-bottom: 15px;
        }
        
        .hero p {
            font-size: 1.2rem;
            max-width: 700px;
            margin: 0 auto;
        }
        
        .registration-section {
            display: flex;
            flex-wrap: wrap;
            gap: 40px;
            margin-bottom: 60px;
        }
        
        .form-container {
            flex: 1;
            min-width: 300px;
            background-color: var(--white);
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            padding: 30px;
        }
        
        .info-container {
            flex: 1;
            min-width: 300px;
            background-color: var(--white);
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            padding: 30px;
        }
        
        .form-title {
            color: var(--primary-blue);
            margin-bottom: 25px;
            font-size: 1.8rem;
            position: relative;
            padding-bottom: 10px;
        }
        
        .form-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 50px;
            height: 3px;
            background-color: var(--primary-blue);
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: var(--dark-gray);
        }
        
        .input-field {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid var(--medium-gray);
            border-radius: 8px;
            font-size: 16px;
            transition: all 0.3s;
        }
        
        .input-field:focus {
            outline: none;
            border-color: var(--primary-blue);
            box-shadow: 0 0 0 2px rgba(26, 115, 232, 0.2);
        }
        
        .input-error {
            border-color: var(--error);
        }
        
        .error-message {
            color: var(--error);
            font-size: 14px;
            margin-top: 5px;
        }
        
        .skills-container {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 10px;
        }
        
        .skill-tag {
            background-color: var(--light-blue);
            color: var(--primary-blue);
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 5px;
        }
        
        .skill-tag .remove {
            cursor: pointer;
            font-weight: bold;
        }
        
        .skill-input-container {
            display: flex;
            gap: 10px;
        }
        
        .skill-input {
            flex: 1;
        }
        
        .btn {
            padding: 12px 25px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
        }
        
        .btn-primary {
            background-color: var(--primary-blue);
            color: var(--white);
        }
        
        .btn-primary:hover {
            background-color: var(--dark-blue);
        }
        
        .btn-secondary {
            background-color: transparent;
            color: var(--primary-blue);
            border: 1px solid var(--primary-blue);
        }
        
        .btn-secondary:hover {
            background-color: var(--light-blue);
        }
        
        .info-title {
            color: var(--primary-blue);
            margin-bottom: 20px;
            font-size: 1.5rem;
        }
        
        .benefit-list {
            list-style-type: none;
        }
        
        .benefit-list li {
            margin-bottom: 15px;
            display: flex;
            align-items: flex-start;
            gap: 10px;
        }
        
        .benefit-icon {
            color: var(--success);
            font-size: 20px;
            flex-shrink: 0;
        }
        
        .testimonial {
            background-color: var(--light-blue);
            padding: 20px;
            border-radius: 8px;
            margin-top: 30px;
        }
        
        .testimonial-text {
            font-style: italic;
            margin-bottom: 10px;
        }
        
        .testimonial-author {
            font-weight: 600;
            color: var(--primary-blue);
        }
        
        .alert {
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        
        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        
        .alert-error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        
        footer {
            background-color: var(--dark-blue);
            color: var(--white);
            padding: 40px 0;
            text-align: center;
        }
        
        .footer-content {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 20px;
        }
        
        .footer-logo {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .footer-logo-text {
            font-size: 20px;
            font-weight: 700;
        }
        
        .footer-links {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
            justify-content: center;
        }
        
        .footer-links a {
            color: var(--white);
            text-decoration: none;
        }
        
        .footer-links a:hover {
            text-decoration: underline;
        }
        
        .copyright {
            margin-top: 20px;
            font-size: 14px;
            opacity: 0.8;
        }
        
        @media (max-width: 768px) {
            .registration-section {
                flex-direction: column;
            }
            
            .hero h1 {
                font-size: 2rem;
            }
            
            .hero p {
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <div class="header-content">
                <div class="logo">
                    <div class="logo-icon">S</div>
                    <div class="logo-text">Siberes</div>
                </div>
            </div>
        </div>
    </header>
    
    <section class="hero">
        <div class="container">
            <h1>Bergabunglah Sebagai Mitra Teknisi Siberes</h1>
            <p>Tingkatkan penghasilan Anda dengan menjadi bagian dari jaringan teknisi profesional terpercaya di Indonesia</p>
        </div>
    </section>
    
    <div class="container">
        <!-- Menampilkan pesan sukses/error -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-error">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <section class="registration-section">
            <div class="form-container">
                <h2 class="form-title">Form Registrasi</h2>
                <form method="POST" action="{{ route('partner.store') }}">
                    @csrf
                    
                    <div class="form-group">
                        <label for="name">Nama Lengkap</label>
                        <input type="text" id="name" name="name" class="input-field @error('name') input-error @enderror" 
                               placeholder="Masukkan nama lengkap" value="{{ old('name') }}" required>
                        @error('name')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" class="input-field @error('email') input-error @enderror" 
                               placeholder="Masukkan alamat email" value="{{ old('email') }}" required>
                        @error('email')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="phone_number">Nomor Telepon</label>
                        <input type="tel" id="phone_number" name="phone_number" class="input-field @error('phone_number') input-error @enderror" 
                               placeholder="Contoh: 081234567890" value="{{ old('phone_number') }}" required>
                        @error('phone_number')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="bank_account_number">Nomor Rekening Bank</label>
                        <input type="text" id="bank_account_number" name="bank_account_number" class="input-field @error('bank_account_number') input-error @enderror" 
                               placeholder="Masukkan nomor rekening" value="{{ old('bank_account_number') }}" required>
                        @error('bank_account_number')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="address">Alamat</label>
                        <textarea id="address" name="address" class="input-field @error('address') input-error @enderror" 
                                  rows="3" placeholder="Masukkan alamat lengkap" required>{{ old('address') }}</textarea>
                        @error('address')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="skills">Keahlian Teknis</label>
                        <div class="skill-input-container">
                            <input type="text" name="skills" id="skillInput" class="input-field skill-input" placeholder="Tambahkan keahlian (contoh: Jaringan, Elektronik, dll)">
                        </div>
                        @error('skills')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" style="width: 100%;">Daftar Sekarang</button>
                    </div>
                </form>
            </div>
            
            <div class="info-container">
                <h3 class="info-title">Keuntungan Bergabung</h3>
                <ul class="benefit-list">
                    <li>
                        <span class="benefit-icon">✓</span>
                        <div>
                            <strong>Akses ke Pelanggan Berkualitas</strong>
                            <p>Dapatkan akses ke ribuan pelanggan yang membutuhkan jasa teknisi profesional.</p>
                        </div>
                    </li>
                    <li>
                        <span class="benefit-icon">✓</span>
                        <div>
                            <strong>Pembayaran Tepat Waktu</strong>
                            <p>Bayaran Anda akan ditransfer secara otomatis setiap minggu tanpa penundaan.</p>
                        </div>
                    </li>
                    <li>
                        <span class="benefit-icon">✓</span>
                        <div>
                            <strong>Dukungan Teknis 24/7</strong>
                            <p>Tim support kami siap membantu Anda kapan saja dalam menangani pekerjaan.</p>
                        </div>
                    </li>
    
                </ul>
                
                <div class="testimonial">
                    <p class="testimonial-text">"Sejak bergabung dengan Siberes, penghasilan saya meningkat 40%. Sistem yang transparan dan pembayaran tepat waktu membuat saya fokus pada pekerjaan."</p>
                    <p class="testimonial-author">- Andi Pratama, Teknisi Jaringan</p>
                </div>
            </div>
        </section>
    </div>
    
    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-logo">
                    <div class="logo-icon">S</div>
                    <div class="footer-logo-text">Siberes</div>
                </div>
                <p>Platform terdepan untuk menghubungkan teknisi profesional dengan pelanggan yang membutuhkan</p>
                <div class="footer-links">
                    <a href="#">Tentang Kami</a>
                    <a href="#">Kebijakan Privasi</a>
                    <a href="#">Syarat & Ketentuan</a>
                    <a href="#">Kontak</a>
                </div>
                <div class="copyright">
                    &copy; 2025 Siberes. Semua hak dilindungi.
                </div>
            </div>
        </div>
    </footer>
    
</body>
</html>