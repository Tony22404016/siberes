<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <link rel="stylesheet" href="Login.css">
</head>
<body>
    <section class="container">
        <div class="login-form">
            @if ($errors->has('login_error'))
                <p style="color:red;">{{ $errors->first('login_error') }}</p>
            @endif
            <h2>Hallo, Wellcome Back</h2>
            <p class="welcome-text">Wellcome back to your special place</p>
            
            <form action="{{route('login.submit')}}" method="POST">
                @csrf
                <div class="input-group">
                    <input type="text" name="username" placeholder="Enter your name" required>
                </div>
                
                <div class="input-group">
                    <input type="password" name="password" placeholder="Enter your password" required>
                </div>
                
                <div class="remember-me">
                    <input type="checkbox" id="remember">
                    <label for="remember">Remember me</label>
                </div>
                
                <button class="btn-signin" type="submit">Sign in</button>
            </form>
            
            
            <div class="signup-link">
                <p>Don't have an account? <a href="/regis">Sign up</a></p>
            </div>
        </div>
        
        <div class="login-image">
            <!-- Ganti dengan URL gambar Anda sendiri -->
            <img src="asset/Login_Image.png" alt="Login Image">
        </div>
    </section>
</body>
</html>