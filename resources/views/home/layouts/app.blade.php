<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link href="/assets/images/illumax-icon.png" rel="shortcut icon">
    <title>{{ $title }} - Illumax</title>
    <meta name="keywords" content="illumax">
    <link rel="canonical" href="{{ url()->current() }}">
    <meta property="og:title" content="{{ $title }}">
    <meta property="og:description" content="{!! Str::of(strip_tags($about->description, '<br>'))->explode('<br>')->filter()->first() !!}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">
    <meta name="description" content="{!! Str::of(strip_tags($about->description, '<br>'))->explode('<br>')->filter()->first() !!}">

    @stack('css')
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-ZL2MT0QL26"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-ZL2MT0QL26');
    </script>
</head>

<body style="font-family: Actor, sans-serif;">
    @include('home.layouts.navbar')

    <div class="whatsapp-float">
        <a href="https://wa.me/{{ $contacts->whatsapp }}" target="_blank" class="btn btn-lg">
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
