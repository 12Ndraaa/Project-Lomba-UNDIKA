       // Animasi Navbar saat scroll
        $(window).scroll(function() {
            if ($(this).scrollTop() > 50) {
                $('.navbar').addClass('scrolled');
            } else {
                $('.navbar').removeClass('scrolled');
            }
        });
        
        // Animasi saat search bar di focus
        $('.form-control').focus(function() {
            $(this).css('width', '250px');
        }).blur(function() {
            if ($(window).width() > 991) {
                $(this).css('width', '200px');
            }
        });

        // Set tahun saat ini untuk footer
        document.getElementById('year').textContent = new Date().getFullYear();