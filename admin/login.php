<?php
session_start();
require "../connection.php"; // Pastikan ini mengarah ke file connection.php Anda yang sudah diperbaiki

if (isset($_POST['loginbtn'])) {
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    $stmt = $con->prepare("SELECT id, password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        // Penting: Pastikan kolom 'password' di database Anda menyimpan password yang di-hash
        if (password_verify($password, $user['password'])) {
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $user['username'];
            $_SESSION['user_id'] = $user['id'];
            header('Location: index.php'); // <--- BARIS INI YANG DIUBAH
            exit();
        } else {
            $error_message = "Username atau password salah.";
        }
    } else {
        $error_message = "Username atau password salah.";
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body { background-color: #f8f9fa; }
        .login-container { background: linear-gradient(to right, #6a11cb, #2575fc); height: 100vh; }
        .card { border-radius: 1rem; border: none; }
        .card-title { font-weight: 700; color: #343a40; }
        .btn-primary { background-color: #007bff; border-color: #007bff; font-weight: 600; padding: .75rem 1.25rem; border-radius: .5rem; }
        .btn-primary:hover { background-color: #0056b3; border-color: #004085; }
        a { color: #007bff; text-decoration: none; }
        a:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <div class="container-fluid login-container">
        <div class="row justify-content-center align-items-center min-vh-100">
            <div class="col-12 col-md-8 col-lg-5 col-xl-4">
                <div class="card shadow-lg p-4">
                    <div class="card-body">
                        <h3 class="card-title text-center mb-4">Login Akun Anda</h3>
                        <form action="" method="POST">
                            <?php if (isset($error_message)): ?>
                                <div class="alert alert-danger" role="alert">
                                    <?php echo $error_message; ?>
                                </div>
                            <?php endif; ?>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" name="username" id="username" placeholder="Masukkan username" required>
                            </div>
                            <div class="form-group mb-4">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="Masukkan password" required>
                            </div>
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="rememberMe" name="remember_me">
                                <label class="form-check-label" for="rememberMe">Ingat saya</label>
                            </div>
                            <button type="submit" name="loginbtn" class="btn btn-primary btn-block">Login</button>
                            <p class="text-center mt-3">Belum punya akun? <a href="#">Daftar sekarang</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>