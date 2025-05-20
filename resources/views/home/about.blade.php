@push('css')
    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Inter:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Actor&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Aldrich&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans+Devanagari&amp;display=swap">
    <link rel="stylesheet" href="/assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="/assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="/assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="/assets/css/swiper-icons.css">
    <link rel="stylesheet" href="/assets/css/carousel-logo.compiled.css">
    <link rel="stylesheet" href="/assets/css/content.css">
    <link rel="stylesheet" href="/assets/css/Features-Centered-Icons-icons.css">
    <link rel="stylesheet" href="/assets/css/Features-Small-Icons-icons.css">
    <link rel="stylesheet" href="/assets/css/Hero-Carousel-images.css">
    <link rel="stylesheet" href="/assets/css/Lightbox-Gallery-baguetteBox.min.css">
    <link rel="stylesheet" href="/assets/css/logo-carousel.compiled.css">
    <link rel="stylesheet" href="/assets/css/multiple-item-carousel-slider.css">
    <link rel="stylesheet" href="/assets/css/navbar.css">
    <link rel="stylesheet" href="/assets/css/Simple-Slider-swiper-bundle.min-1.css">
    <link rel="stylesheet" href="/assets/css/Simple-Slider-swiper-bundle.min.css">
    <link rel="stylesheet" href="/assets/css/Simple-Slider.css">
    <link rel="stylesheet" href="/assets/css/video.css">
@endpush
@extends('home.layouts.app')
@section('container')
    <section>
        <div data-bss-parallax-bg="true" class="image-header"
            style="background: linear-gradient(29deg, black, rgba(0,0,0,0.23)), url(/assets/images/aboutus/{{ $about->banneratas }}) center / cover no-repeat;">
            <div class="container h-100">
                <div
                    class="row d-sm-flex d-md-flex d-xl-flex d-xxl-flex justify-content-md-center align-items-md-center justify-content-xl-end justify-content-xxl-end align-items-xxl-center h-100">
                    <div class="col-md-6 text-center text-md-start">
                        <div>
                            <h1 class="paragraph-header" style="font-family: Aldrich, sans-serif;">{{ $about->textatas }}
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <header class="background-content-about p-5"
        style="/*background: linear-gradient(2deg, #000000 0%, rgba(255,255,255,0)), url(&quot;assets/img/bg-illumax.jpg&quot;);*/">
        <div class="container">
            <div class="row">
                <div
                    class="col-sm-12 col-md-12 col-lg-12 col-xl-6 d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center">
                    <div class="mt-3 px-3">
                        <h1 class="fw-bold judul-content" style="font-family: Aldrich, sans-serif;font-size: 55px;">
                            {{ $about->judul }}</h1>
                        <div class="border-judul"></div>
                        <p class="text-start paragraph-content">{!! strip_tags($about->description, '<br>') !!}</p>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-6 p-4">
                    <div class="row d-xxl-flex align-items-xxl-center">
                        <div class="col">
                            <div><img class="img-fluid image-about-us4" alt="aboutus"
                                    src="/assets/images/aboutus/{{ $about->gambar }}"></div>
                        </div>
                        <div class="col">
                            <div><img class="img-fluid image-about-us3" alt="aboutus"
                                    src="/assets/images/aboutus/{{ $about->gambar1 }}"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <header class="bg-bottom-about-us"
        style="background: linear-gradient(167deg, rgb(18,18,18) 0%, rgba(18,18,18,0.84) 62%, rgba(0,0,0,0.61)), url(/assets/images/aboutus/{{ $about->bannerbawah }}) center / cover no-repeat;">
        <div class="container">
            <h2 class="text-uppercase text-center mt-5">"{{ $about->textbawah }}"</h2>
        </div>
    </header>
@endsection
