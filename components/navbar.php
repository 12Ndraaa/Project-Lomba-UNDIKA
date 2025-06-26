<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- BOOTSTRAP CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- CSS -->
     <link rel="stylesheet" href="../src/style/style.css">
</head>
<body>
    <!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container">
            <a class="navbar-brand fadeInDown" href="#">
                <i class="fas fa-leaf me-2"></i>Smart<span>Farm</span>
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item fadeInDown" style="animation-delay: 0.2s;">
                        <a class="nav-link" href="#"><i class="fas fa-home me-1"></i>Beranda</a>
                    </li>
                    <li class="nav-item fadeInDown" style="animation-delay: 0.3s;">
                        <a class="nav-link" href="#features"><i class="fas fa-lightbulb me-1"></i>Fitur</a>
                    </li>
                    <li class="nav-item fadeInDown" style="animation-delay: 0.4s;">
                        <a class="nav-link" href="#products"><i class="fas fa-box-open me-1"></i>Produk</a>
                    </li>
                    <li class="nav-item fadeInDown" style="animation-delay: 0.5s;">
                        <a class="nav-link" href="manajemen-produk.html"><i class="fas fa-cogs me-1"></i>Manajemen Produk</a>
                    </li>
                    <li class="nav-item fadeInDown" style="animation-delay: 0.6s;">
                        <a class="nav-link" href="#contact"><i class="fas fa-envelope me-1"></i>Kontak</a>
                    </li>
                </ul>
                
                <form class="d-flex search-form fadeInDown" style="animation-delay: 0.7s;">
                    <input class="form-control me-2" type="search" placeholder="Cari produk..." aria-label="Search">
                    <button class="btn search-btn" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
                
                <div class="fadeInDown" style="animation-delay: 0.8s;">
                    <a href="#" class="cart-icon">
                        <i class="fas fa-shopping-cart"></i>
                        <span class="cart-count">0</span>
                    </a>
                </div>
            </div>
        </div>
    </nav>
    
<!-- BOOTSTRAP SCRIPT -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    
    <script>
        $(window).scroll(function() {
            if ($(this).scrollTop() > 50) {
                $('.navbar').addClass('scrolled');
            } else {
                $('.navbar').removeClass('scrolled');
            }
        });
    </script>
</body>
</html>
