@push('css')
    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Inter:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Actor&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Aldrich&amp;display=swap">
    <link rel="stylesheet" href="/assets/css/swiper-icons.css">
    <link rel="stylesheet" href="/assets/fonts/fontawesome-all.min.css">
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
            style="background: linear-gradient(29deg, black, rgba(0,0,0,0.23)), url(/assets/images/portopage/{{ $portopage->gambar }}) center / cover no-repeat;">
            <div class="container h-100">
                <div
                    class="row d-sm-flex d-md-flex d-xl-flex d-xxl-flex justify-content-md-center align-items-md-center justify-content-xl-end justify-content-xxl-end align-items-xxl-center h-100">
                    <div class="col-md-6 text-center text-md-start">
                        <div>
                            <h1 class="paragraph-header">{{ $portopage->textatas }}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
                        <div class="movie-card"><img alt="{{ $list->title }}" class="image-porto"
                                src="/assets/images/portofolio/{{ $list->gambar }}">
                            <div class="card-img-overlay text-center d-flex flex-column justify-content-center align-items-center image-cover-portfolio"
                                style="background: linear-gradient(7deg, rgba(0,0,0,0.85) 0%, rgba(255,255,255,0.21) 99%);">
                                <p class="paragraph-portfolio">{{ $list->title }}</p>
                            </div>
                            <div class="hover-popup" data-bs-target="#videoModal-{{ $list->id }}"
                                data-bs-toggle="modal">
                                <video autoplay muted width="100%">
                                    <source src="/assets/video/portofolio/{{ $list->video }}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                                <div class="hover-info">
                                    <h5>{{ $list->title }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
            <div class="row d-xl-flex justify-content-xl-center align-items-xl-center">
                <div
                    class="col d-flex d-sm-flex d-md-flex d-lg-flex d-xl-flex d-xxl-flex justify-content-center align-items-center justify-content-sm-center align-items-sm-center justify-content-md-center align-items-md-center justify-content-lg-center align-items-lg-center justify-content-xl-center align-items-xl-center justify-content-xxl-center align-items-xxl-center mt-5">
                    <nav class="justify-content-center">
                        {{-- <ul class="pagination">
                            <li class="page-item justify-content-center pagination-color"><a class="page-link"
                                    aria-label="Previous" href="#"><span aria-hidden="true">«</span></a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" aria-label="Next" href="#"><span
                                        aria-hidden="true">»</span></a></li>
                        </ul> --}}
                        <ul class="pagination">
                            {{-- Previous Page Link --}}
                            @if ($porto->onFirstPage())
                                <li class="page-item justify-content-center pagination-color"><span
                                        class="page-link">&lsaquo;</span></li>
                            @else
                                <li class="page-item">
                                    <a class="page-link" href="{{ $porto->previousPageUrl() }}" rel="prev">&lsaquo;</a>
                                </li>
                            @endif

                            {{-- Pagination Elements --}}
                            @foreach ($porto->links()->elements[0] as $page => $url)
                                @if ($page == $porto->currentPage())
                                    <li class="page-item "><span class="page-link">{{ $page }}</span></li>
                                @else
                                    <li class="page-item"><a class="page-link"
                                            href="{{ $url }}">{{ $page }}</a></li>
                                @endif
                            @endforeach

                            {{-- Next Page Link --}}
                            @if ($porto->hasMorePages())
                                <li class="page-item">
                                    <a class="page-link" href="{{ $porto->nextPageUrl() }}" rel="next">&rsaquo;</a>
                                </li>
                            @else
                                <li class="page-item "><span class="page-link">&rsaquo;</span></li>
                            @endif
                        </ul>

                    </nav>
                </div>
            </div>
        </div>
    </section>
    <header class="bg-bottom-about-us"
        style="background: linear-gradient(160deg, rgb(17,17,17) 0%, rgba(18,18,18,0.84) 62%, rgba(0,0,0,0.74)), url(/assets/images/portopage/{{ $portopage->gambar1 }}) center / cover no-repeat;">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-6">
                    <h1 class="display-5 text-uppercase text-start mt-5"
                        style="font-family: Aldrich, sans-serif;font-size: 40px;"><strong>{{ $news->title }}</strong>
                    </h1>
                    <p class="mt-5">{!! strip_tags($news->description, '<br>') !!}</p>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-6 d-xl-flex align-items-xl-center">
                    <div class="row">
                        <div class="col-sm-12  mt-4">
                            <div class="movie-card"><img alt="{{ $news->title }}" class="image-porto"
                                    src="/assets/images/portofolio/{{ $news->gambar }}">
                                <div class="card-img-overlay text-center d-flex flex-column justify-content-center align-items-center image-cover-portfolio"
                                    style="background: linear-gradient(7deg, rgba(0,0,0,0.85) 0%, rgba(255,255,255,0.21) 99%);">
                                    <p class="paragraph-portfolio">{{ $news->title }}</p>
                                </div>
                                <div class="hover-popup" data-bs-target="#videoModal-{{ $news->id }}"
                                    data-bs-toggle="modal">
                                    <video autoplay muted width="100%">
                                        <source src="/assets/video/portofolio/{{ $news->video }}" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                    <div class="hover-info">
                                        <h5>{{ $news->title }}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </header>
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
