<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Regis</title>
    <link rel="stylesheet" href="Login.css">
</head>
<body>
    <section class="container">
        <div class="login-form">
            <h2>Get Started with Us</h2>
            <p class="welcome-text">Register now and be part of us</p>

            <form action="{{route('register.store')}}" method="POST">
                @csrf
                <div class="input-group">
                    <input type="text" placeholder="Enter your name" name="username">
                </div>

                <div class="input-group">
                    <input type="text" placeholder="Enter your email" name="email">
                </div>
                
                <div class="input-group">
                    <input type="password" placeholder="Enter your password" name="password">
                </div>
                
                <div class="remember-me">
                    <input type="checkbox" id="remember">
                    <label for="remember">Remember me</label>
                </div>
                
                <button class="btn-signin" type="submit">Sign up</button>
                
                <div class="signup-link">
                    <p>Already have an account? <a href="#">Sign in</a></p>
                </div>
            </form>
            
        </div>
        
        <div class="login-image">
            <!-- Ganti dengan URL gambar Anda sendiri -->
            <img src="asset/Login_Image.png" alt="Login Image">
        </div>
    </section>
</body>
</html>