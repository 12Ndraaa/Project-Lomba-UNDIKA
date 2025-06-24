<?php 
    require "../connection.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- BOOTSTRAP CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Document</title>

    <!-- STYLE -->
     <style>
body {
    overflow: hidden !important; /* Mencegah scroll saat ada elemen animasi */
}

.login-container {
    background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%) !important;
    height: 100vh !important;
    position: relative !important;
    overflow: hidden !important;
    animation: gradientShift 15s ease infinite !important; /* Animasi latar belakang */
}

/* Keyframes untuk animasi latar belakang */
@keyframes gradientShift {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
}

/* Efek partikel atau elemen dekorasi */
.login-container::before, .login-container::after {
    content: '' !important;
    position: absolute !important;
    top: 0 !important;
    left: 0 !important;
    width: 100% !important;
    height: 100% !important;
    background: radial-gradient(circle at top left, rgba(255,255,255,0.1) 10%, transparent 50%),
                radial-gradient(circle at bottom right, rgba(255,255,255,0.1) 10%, transparent 50%) !important;
    opacity: 0.8 !important;
    animation: floatEffect 20s ease-in-out infinite !important;
}

.login-container::after {
    background: radial-gradient(circle at bottom left, rgba(255,255,255,0.1) 10%, transparent 50%),
                radial-gradient(circle at top right, rgba(255,255,255,0.1) 10%, transparent 50%) !important;
    animation-delay: 5s !important;
}

@keyframes floatEffect {
    0% { transform: translate(0, 0) scale(1); }
    25% { transform: translate(10px, 10px) scale(1.02); }
    50% { transform: translate(0, 0) scale(1); }
    75% { transform: translate(-10px, -10px) scale(0.98); }
    100% { transform: translate(0, 0) scale(1); }
}


.login-card {
    border-radius: 1.5rem !important;
    border: none !important;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2) !important;
    background-color: rgba(255, 255, 255, 0.95) !important;
    transition: all 0.3s ease-in-out !important; /* Transisi saat hover atau fokus */
}

.login-card:hover {
    transform: translateY(-5px) !important;
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.3) !important;
}

.login-title {
    font-weight: 800 !important;
    color: #343a40 !important;
    text-shadow: 1px 1px 2px rgba(0,0,0,0.1) !important;
}

/* Floating Label Group */
.floating-label-group {
    position: relative !important;
    margin-bottom: 2rem !important; /* Ruang untuk label */
}

.floating-label-group input {
    height: 50px !important;
    padding-top: 1.5rem !important;
    padding-bottom: 0.5rem !important;
    border-radius: 0.75rem !important;
    border: 1px solid #ced4da !important;
    transition: border-color 0.3s ease, box-shadow 0.3s ease !important;
}

.floating-label-group label {
    position: absolute !important;
    top: 15px !important;
    left: 1rem !important;
    font-size: 1rem !important;
    color: #6c757d !important;
    pointer-events: none !important;
    transition: all 0.2s ease-out !important;
}

.floating-label-group input:focus + label,
.floating-label-group input:not(:placeholder-shown) + label {
    top: 5px !important;
    left: 1rem !important;
    font-size: 0.75rem !important;
    color: #007bff !important;
    font-weight: bold !important;
}

.floating-label-group input:focus {
    border-color: #007bff !important;
    box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25) !important;
}


.login-button {
    background-color: #007bff !important;
    border-color: #007bff !important;
    font-weight: 700 !important;
    padding: .85rem 1.5rem !important;
    border-radius: .75rem !important;
    letter-spacing: 0.5px !important;
    transition: all 0.3s ease !important;
    transform: scale(1) !important;
}

.login-button:hover {
    background-color: #0056b3 !important;
    border-color: #004085 !important;
    transform: scale(1.02) !important;
    box-shadow: 0 5px 15px rgba(0, 123, 255, 0.3) !important;
}

.register-link a {
    color: #007bff !important;
    text-decoration: none !important;
    font-weight: 600 !important;
    transition: color 0.2s ease !important;
}

.register-link a:hover {
    color: #0056b3 !important;
    text-decoration: underline !important;
}
     </style>
</head>
<body>
    <div class="container-fluid login-container">
        <div class="row justify-content-center align-items-center min-vh-100">
            <div class="col-12 col-md-8 col-lg-5 col-xl-4">
                <div class="card shadow-lg p-4">
                    <div class="card-body">
                        <h3 class="card-title text-center mb-4">Login Akun Anda</h3>
                        <form id="loginForm">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" placeholder="Masukkan username" required>
                            </div>
                            <div class="form-group mb-4">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" placeholder="Masukkan password" required>
                            </div>
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="rememberMe">
                                <label class="form-check-label" for="rememberMe">Ingat saya</label>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                            <p class="text-center mt-3">Belum punya akun? <a href="#">Daftar sekarang</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>

<!-- SCRIPT -->
 <script>
    document.getElementById('loginForm').addEventListener('submit', function(event) {
    event.preventDefault();

    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;

    if (username === 'user' && password === 'pass') {
        alert('Login berhasil!');
        // Redirect ke halaman dashboard atau lain-lain
        // window.location.href = 'dashboard.html';
    } else {
        alert('Username atau password salah.');
    }
});
 </script>

    <!-- BOOTSTRAP JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>