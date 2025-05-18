<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>{{ $title }} - Illumax</title>
    @stack('css')
</head>

<body style="font-family: Actor, sans-serif;">
    @include('home.layouts.navbar')

    <div class="whatsapp-float">
        <a href="https://wa.me/628123456789" target="_blank" class="btn btn-lg">
            <i class="fab fa-whatsapp"></i>
        </a>
    </div>
    @yield('container')

    @include('home.layouts.footer')

    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/multiple-item-carousel-slider-multiple-item-carousel-slider-bootstrap.min.js"></script>
    <script src="assets/js/bold-and-dark.js"></script>
    <script src="assets/js/Lightbox-Gallery-baguetteBox.min.js"></script>
    <script src="assets/js/Lightbox-Gallery.js"></script>
    <script src="assets/js/Simple-Slider-swiper-bundle.min.js"></script>
    <script src="assets/js/Simple-Slider.js"></script>
</body>

</html>
