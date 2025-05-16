@push('css')
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Inter:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Actor&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Aldrich&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans+Devanagari&amp;display=swap">
    <link rel="stylesheet" href="assets/css/swiper-icons.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/carousel-logo.compiled.css">
    <link rel="stylesheet" href="assets/css/content.css">
    <link rel="stylesheet" href="assets/css/Features-Centered-Icons-icons.css">
    <link rel="stylesheet" href="assets/css/Features-Small-Icons-icons.css">
    <link rel="stylesheet" href="assets/css/Hero-Carousel-images.css">
    <link rel="stylesheet" href="assets/css/Lightbox-Gallery-baguetteBox.min.css">
    <link rel="stylesheet" href="assets/css/logo-carousel.compiled.css">
    <link rel="stylesheet" href="assets/css/navbar.css">
    <link rel="stylesheet" href="assets/css/Simple-Slider-swiper-bundle.min-1.css">
    <link rel="stylesheet" href="assets/css/Simple-Slider-swiper-bundle.min.css">
    <link rel="stylesheet" href="assets/css/Simple-Slider.css">
    <link rel="stylesheet" href="assets/css/video.css">
@endpush
@extends('home.layouts.app')
@section('container')
    <!-- Swiper Container -->
    <div class="simple-slider position-relative">
        <!-- Teks Tetap di Atas -->
        <div class="text-center text-white slider-title position-absolute w-100" style="z-index: 10; top: 30%;">
            <h1 class="fw-bold">Selamat Datang di Website Kami</h1>
            <p>Temukan informasi terbaik di sini</p>
        </div>

        <!-- Swiper -->
        <div class="swiper-container">
            <div class="swiper-wrapper">
                @forelse (json_decode($banner->gambar) as $index => $gambar)
                    <div class="swiper-slide"
                        style="background: url('{{ asset('/assets/images/banner/' . $gambar) }}') center center / cover no-repeat;">
                    </div>
                @empty
                    <div class="swiper-slide"
                        style="background: #ccc; display: flex; align-items: center; justify-content: center;">
                        <p>Tidak ada gambar tersedia</p>
                    </div>
                @endforelse
            </div>

            <!-- Navigasi & Pagination -->
            <div class="swiper-pagination"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
    </div>

    <header class="background-content-about"
        style="/*background: linear-gradient(2deg, #000000 0%, rgba(255,255,255,0)), url(&quot;assets/img/bg-illumax.jpg&quot;);*/">
        <div class="container-fluid" style="padding-left:0px;padding-right:50px;">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-6">
                    <div><img class="img-fluid image-about-us1" alt="woman wearing sunglasses"
                            src="assets/img/photo-1562572159-4efc207f5aff.jpg"></div>
                    <div><img class="img-fluid image-about-us2" alt="woman posing beside lite window"
                            src="assets/img/photo-1532800783378-1bed60adaf58.jpg"></div>
                </div>
                <div
                    class="col-sm-12 col-md-12 col-lg-12 col-xl-6 d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center">
                    <div class="mt-3 px-3">
                        <h1 class="fw-bold judul-content" style="font-family: Aldrich, sans-serif;">About Us</h1>
                        <p class="text-start paragraph-content">{!! strip_tags($aboutus->description, '<br>') !!}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <header>
        <div class="container-fluid p-5">
            <div class="wu-bg">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-6 col-xl-4 col-xxl-4">
                        <h1 class="judul-content-service" style="font-family: Aldrich, sans-serif;font-size: 60px;">
                            Why
                            <br>Choose Us
                        </h1><a class="btn btn-git" role="button" href="/contacts">Get In Touch</a>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-6 col-xl-8 col-xxl-8">
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-6">
                                <div class="d-flex mt-4">
                                    <div
                                        class="bs-icon-sm bs-icon-rounded d-flex flex-shrink-0 justify-content-center align-items-center d-inline-block mb-3 bs-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                            fill="currentColor" viewBox="0 0 16 16" class="bi bi-flag">
                                            <path
                                                d="M14.778.085A.5.5 0 0 1 15 .5V8a.5.5 0 0 1-.314.464L14.5 8l.186.464-.003.001-.006.003-.023.009a12.435 12.435 0 0 1-.397.15c-.264.095-.631.223-1.047.35-.816.252-1.879.523-2.71.523-.847 0-1.548-.28-2.158-.525l-.028-.01C7.68 8.71 7.14 8.5 6.5 8.5c-.7 0-1.638.23-2.437.477A19.626 19.626 0 0 0 3 9.342V15.5a.5.5 0 0 1-1 0V.5a.5.5 0 0 1 1 0v.282c.226-.079.496-.17.79-.26C4.606.272 5.67 0 6.5 0c.84 0 1.524.277 2.121.519l.043.018C9.286.788 9.828 1 10.5 1c.7 0 1.638-.23 2.437-.477a19.587 19.587 0 0 0 1.349-.476l.019-.007.004-.002h.001M14 1.221c-.22.078-.48.167-.766.255-.81.252-1.872.523-2.734.523-.886 0-1.592-.286-2.203-.534l-.008-.003C7.662 1.21 7.139 1 6.5 1c-.669 0-1.606.229-2.415.478A21.294 21.294 0 0 0 3 1.845v6.433c.22-.078.48-.167.766-.255C4.576 7.77 5.638 7.5 6.5 7.5c.847 0 1.548.28 2.158.525l.028.01C9.32 8.29 9.86 8.5 10.5 8.5c.668 0 1.606-.229 2.415-.478A21.317 21.317 0 0 0 14 7.655V1.222z">
                                            </path>
                                        </svg><img class="img-fluid icon-" src="assets/img/resources-management.png"
                                            width="32" height="32">
                                    </div>
                                    <div class="px-3">
                                        <h4 class="service-judul">Profesional</h4>
                                        <p class="paragraph-wu">Bekerja dengan standar tinggi, tepat waktu, dan
                                            bertanggung jawab dalam setiap proses.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-6">
                                <div class="d-flex mt-4">
                                    <div
                                        class="bs-icon-sm bs-icon-rounded d-flex flex-shrink-0 justify-content-center align-items-center d-inline-block mb-3 bs-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                            fill="currentColor" viewBox="0 0 16 16" class="bi bi-flag">
                                            <path
                                                d="M14.778.085A.5.5 0 0 1 15 .5V8a.5.5 0 0 1-.314.464L14.5 8l.186.464-.003.001-.006.003-.023.009a12.435 12.435 0 0 1-.397.15c-.264.095-.631.223-1.047.35-.816.252-1.879.523-2.71.523-.847 0-1.548-.28-2.158-.525l-.028-.01C7.68 8.71 7.14 8.5 6.5 8.5c-.7 0-1.638.23-2.437.477A19.626 19.626 0 0 0 3 9.342V15.5a.5.5 0 0 1-1 0V.5a.5.5 0 0 1 1 0v.282c.226-.079.496-.17.79-.26C4.606.272 5.67 0 6.5 0c.84 0 1.524.277 2.121.519l.043.018C9.286.788 9.828 1 10.5 1c.7 0 1.638-.23 2.437-.477a19.587 19.587 0 0 0 1.349-.476l.019-.007.004-.002h.001M14 1.221c-.22.078-.48.167-.766.255-.81.252-1.872.523-2.734.523-.886 0-1.592-.286-2.203-.534l-.008-.003C7.662 1.21 7.139 1 6.5 1c-.669 0-1.606.229-2.415.478A21.294 21.294 0 0 0 3 1.845v6.433c.22-.078.48-.167.766-.255C4.576 7.77 5.638 7.5 6.5 7.5c.847 0 1.548.28 2.158.525l.028.01C9.32 8.29 9.86 8.5 10.5 8.5c.668 0 1.606-.229 2.415-.478A21.317 21.317 0 0 0 14 7.655V1.222z">
                                            </path>
                                        </svg><img class="img-fluid icon-" src="assets/img/design-thinking.png"
                                            width="32" height="32">
                                    </div>
                                    <div class="px-3">
                                        <h4 class="service-judul">Kreatif &amp; Inovatif</h4>
                                        <p class="paragraph-wu">Selalu menghadirkan ide-ide segar dan solusi baru yang
                                            relevan dan berdampak.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-6">
                                <div class="d-flex mt-4">
                                    <div
                                        class="bs-icon-sm bs-icon-rounded d-flex flex-shrink-0 justify-content-center align-items-center d-inline-block mb-3 bs-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                            fill="currentColor" viewBox="0 0 16 16" class="bi bi-flag">
                                            <path
                                                d="M14.778.085A.5.5 0 0 1 15 .5V8a.5.5 0 0 1-.314.464L14.5 8l.186.464-.003.001-.006.003-.023.009a12.435 12.435 0 0 1-.397.15c-.264.095-.631.223-1.047.35-.816.252-1.879.523-2.71.523-.847 0-1.548-.28-2.158-.525l-.028-.01C7.68 8.71 7.14 8.5 6.5 8.5c-.7 0-1.638.23-2.437.477A19.626 19.626 0 0 0 3 9.342V15.5a.5.5 0 0 1-1 0V.5a.5.5 0 0 1 1 0v.282c.226-.079.496-.17.79-.26C4.606.272 5.67 0 6.5 0c.84 0 1.524.277 2.121.519l.043.018C9.286.788 9.828 1 10.5 1c.7 0 1.638-.23 2.437-.477a19.587 19.587 0 0 0 1.349-.476l.019-.007.004-.002h.001M14 1.221c-.22.078-.48.167-.766.255-.81.252-1.872.523-2.734.523-.886 0-1.592-.286-2.203-.534l-.008-.003C7.662 1.21 7.139 1 6.5 1c-.669 0-1.606.229-2.415.478A21.294 21.294 0 0 0 3 1.845v6.433c.22-.078.48-.167.766-.255C4.576 7.77 5.638 7.5 6.5 7.5c.847 0 1.548.28 2.158.525l.028.01C9.32 8.29 9.86 8.5 10.5 8.5c.668 0 1.606-.229 2.415-.478A21.317 21.317 0 0 0 14 7.655V1.222z">
                                            </path>
                                        </svg><img class="img-fluid icon-" src="assets/img/partnership.png"
                                            width="32" height="32">
                                    </div>
                                    <div class="px-3">
                                        <h4 class="service-judul">Berkomitmen</h4>
                                        <p class="paragraph-wu">Fokus dan konsisten dalam memberikan hasil terbaik
                                            sesuai dengan kebutuhan klien</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-6">
                                <div class="d-flex mt-4">
                                    <div
                                        class="bs-icon-sm bs-icon-rounded d-flex flex-shrink-0 justify-content-center align-items-center d-inline-block mb-3 bs-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                            fill="currentColor" viewBox="0 0 16 16" class="bi bi-flag">
                                            <path
                                                d="M14.778.085A.5.5 0 0 1 15 .5V8a.5.5 0 0 1-.314.464L14.5 8l.186.464-.003.001-.006.003-.023.009a12.435 12.435 0 0 1-.397.15c-.264.095-.631.223-1.047.35-.816.252-1.879.523-2.71.523-.847 0-1.548-.28-2.158-.525l-.028-.01C7.68 8.71 7.14 8.5 6.5 8.5c-.7 0-1.638.23-2.437.477A19.626 19.626 0 0 0 3 9.342V15.5a.5.5 0 0 1-1 0V.5a.5.5 0 0 1 1 0v.282c.226-.079.496-.17.79-.26C4.606.272 5.67 0 6.5 0c.84 0 1.524.277 2.121.519l.043.018C9.286.788 9.828 1 10.5 1c.7 0 1.638-.23 2.437-.477a19.587 19.587 0 0 0 1.349-.476l.019-.007.004-.002h.001M14 1.221c-.22.078-.48.167-.766.255-.81.252-1.872.523-2.734.523-.886 0-1.592-.286-2.203-.534l-.008-.003C7.662 1.21 7.139 1 6.5 1c-.669 0-1.606.229-2.415.478A21.294 21.294 0 0 0 3 1.845v6.433c.22-.078.48-.167.766-.255C4.576 7.77 5.638 7.5 6.5 7.5c.847 0 1.548.28 2.158.525l.028.01C9.32 8.29 9.86 8.5 10.5 8.5c.668 0 1.606-.229 2.415-.478A21.317 21.317 0 0 0 14 7.655V1.222z">
                                            </path>
                                        </svg><img class="img-fluid icon-" src="assets/img/digital-marketing.png"
                                            width="32" height="32">
                                    </div>
                                    <div class="px-3">
                                        <h4 class="service-judul">Mengikuti Perkembangan Digital</h4>
                                        <p class="paragraph-wu">Terus beradaptasi dengan teknologi dan tren digital
                                            terbaru untuk solusi yang up-to-date.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-6">
                                <div class="d-flex mt-4">
                                    <div
                                        class="bs-icon-sm bs-icon-rounded d-flex flex-shrink-0 justify-content-center align-items-center d-inline-block mb-3 bs-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                            fill="currentColor" viewBox="0 0 16 16" class="bi bi-flag">
                                            <path
                                                d="M14.778.085A.5.5 0 0 1 15 .5V8a.5.5 0 0 1-.314.464L14.5 8l.186.464-.003.001-.006.003-.023.009a12.435 12.435 0 0 1-.397.15c-.264.095-.631.223-1.047.35-.816.252-1.879.523-2.71.523-.847 0-1.548-.28-2.158-.525l-.028-.01C7.68 8.71 7.14 8.5 6.5 8.5c-.7 0-1.638.23-2.437.477A19.626 19.626 0 0 0 3 9.342V15.5a.5.5 0 0 1-1 0V.5a.5.5 0 0 1 1 0v.282c.226-.079.496-.17.79-.26C4.606.272 5.67 0 6.5 0c.84 0 1.524.277 2.121.519l.043.018C9.286.788 9.828 1 10.5 1c.7 0 1.638-.23 2.437-.477a19.587 19.587 0 0 0 1.349-.476l.019-.007.004-.002h.001M14 1.221c-.22.078-.48.167-.766.255-.81.252-1.872.523-2.734.523-.886 0-1.592-.286-2.203-.534l-.008-.003C7.662 1.21 7.139 1 6.5 1c-.669 0-1.606.229-2.415.478A21.294 21.294 0 0 0 3 1.845v6.433c.22-.078.48-.167.766-.255C4.576 7.77 5.638 7.5 6.5 7.5c.847 0 1.548.28 2.158.525l.028.01C9.32 8.29 9.86 8.5 10.5 8.5c.668 0 1.606-.229 2.415-.478A21.317 21.317 0 0 0 14 7.655V1.222z">
                                            </path>
                                        </svg><img class="img-fluid icon-wu" src="assets/img/handshake.png"
                                            width="32" height="32">
                                    </div>
                                    <div class="px-3">
                                        <h4 class="service-judul">Mampu Berkolaborasi</h4>
                                        <p class="paragraph-wu">Terbuka dalam bekerja sama, membangun komunikasi yang
                                            baik untuk hasil yang optimal.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <header
        style="background: linear-gradient(-1deg, rgb(0,0,0), rgba(255,255,255,0)), url(&quot;assets/img/bg-illumax-service.jpg&quot;) center / cover no-repeat;padding-bottom: 100px;">
        <div class="container">
            <div class="row">
                <div class="col content-bg-us">
                    <h3 class="text-start sub-judul">What we offer</h3>
                    <h1 class="fw-bold d-xxl-flex justify-content-xxl-start judul-content-us">Our Service</h1>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    @foreach ($ourservice->description as $key => $description)
                        <div class="service-content">
                            <div class="row">
                                <div
                                    class="col-sm-12 col-md-12 col-lg-12 col-xl-7 d-xl-flex d-xxl-flex align-items-xl-center align-items-xxl-center hover-service">
                                    <h1 class="judul-service">{{ $ourservice->title[$key] }}</h1>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-5 d-xxl-flex justify-content-xxl-center">
                                    <p class="paragraph-service">{{ $description }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </header>
    <section style="background: url(&quot;assets/img/bg-papper.jpg&quot;) center / cover no-repeat;"><img
            class="img-fluid" src="assets/img/bg-divider-bottom.jpg" style="margin-top: -20px;">
        <div class="container text-center p-5 h-100" style="overflow:hidden;">
            <h1 class="judul-client">Partner</h1>
            <section class="photo-gallery py-4 py-xl-5">
                <div class="container">
                    <div class="row gx-2 gy-2 row-cols-1 row-cols-md-2 row-cols-xl-3 photos" data-bss-baguettebox="">
                        @foreach ($partner as $ourpartner)
                            <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3 col-xxl-3 item">
                                <a href="{{ $ourpartner->url }}" target="_blank"><img class="img-fluid logo-partner"
                                        src="/assets/images/our-partner/{{ $ourpartner->gambar }}"></a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
            <h1 class="judul-client mt-5">Our Project</h1>
            <section class="photo-gallery py-4 py-xl-5">
                <div class="container">
                    <div class="row gx-2 gy-2 row-cols-1 row-cols-md-2 row-cols-xl-3 photos" data-bss-baguettebox="">
                        @foreach ($ourproject as $project)
                            <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3 col-xxl-3 item">
                                <a href="{{ $project->url }}" target="_blank"><img class="img-fluid logo-partner"
                                        src="/assets/images/our-project/{{ $project->gambar }}"></a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        </div><img class="img-fluid" src="assets/img/top.jpg" style="margin-bottom:-20px;">
    </section>
    <section class="section-work">
        <div class="container text-center h-100">
            <div class="row">
                <div class="col">
                    <h3 class="sub-judul mt-4">Our Portfolio</h3>
                    <h3 class="judul-content-us">Lates Work</h3>
                </div>
            </div>
        </div>
        <div class="container py-4 py-xl-5">
            <div class="row w-100">
                @foreach ($porto as $list)
                    <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 col-xxl-3">
                        <div class="movie-card"><img alt="person holding black dslr camera" class="image-porto"
                                src="/assets/images/portofolio/{{ $list->gambar }}">
                            <div class="card-img-overlay text-center d-flex flex-column justify-content-center align-items-center image-cover-portfolio"
                                style="background: linear-gradient(7deg, rgba(0,0,0,0.85) 0%, rgba(255,255,255,0.21) 99%);">
                                <p class="paragraph-portfolio">Lorem Ipsum</p>
                            </div>
                            <div class="hover-popup">
                                <video autoplay muted width="100%">
                                    <source src="/assets/video/portofolio/{{ $list->video }}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                                <div class="hover-info"><button class="btn"
                                        data-bs-target="#videoModal-{{ $list->id }}" data-bs-toggle="modal"><i
                                            class="far fa-play-circle text-white" style="font-size:20px;"></i></button>
                                    <h5>Lorem Ipsum</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row">
                <div class="col text-end"><a class="btn button-all" role="button" href="/portfolio">See All</a>
                </div>
            </div>
        </div>
    </section>
    @foreach ($porto as $modal)
        <div class="modal fade" role="dialog" tabindex="-1" id="videoModal-{{ $modal->id }}">
            <div class="modal-dialog" role="document">
                <div class="modal-content">

                    <div class="modal-body">
                        {{-- <iframe allowfullscreen="" frameborder="0" src="https://www.youtube.com/embed/dRUlWLGumos">
                    </iframe> --}}
                        <video autoplay controls muted width="560" height="315">
                            <source src="/assets/video/portofolio/{{ $modal->video }}" type="video/mp4">
                        </video>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
