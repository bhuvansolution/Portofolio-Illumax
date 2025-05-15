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
    <link rel="stylesheet" href="assets/css/multiple-item-carousel-slider.css">
    <link rel="stylesheet" href="assets/css/navbar.css">
    <link rel="stylesheet" href="assets/css/Simple-Slider-swiper-bundle.min-1.css">
    <link rel="stylesheet" href="assets/css/Simple-Slider-swiper-bundle.min.css">
    <link rel="stylesheet" href="assets/css/Simple-Slider.css">
    <link rel="stylesheet" href="assets/css/video.css">
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
                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 col-xxl-3">
                    <div class="movie-card"><img alt="person holding black dslr camera" class="image-porto"
                            src="assets/img/photo-1598654478409-684ac5e410a9.jpg">
                        <div class="card-img-overlay text-center d-flex flex-column justify-content-center align-items-center image-cover-portfolio"
                            style="background: linear-gradient(7deg, rgba(0,0,0,0.85) 0%, rgba(255,255,255,0.21) 99%);">
                            <p class="paragraph-portfolio">Lorem Ipsum</p>
                        </div>
                        <div class="hover-popup"><iframe allowfullscreen="" frameborder="0"
                                src="https://www.youtube.com/embed/dRUlWLGumos?autoplay=1&amp;mute=1"
                                class="ratio ratio-16x9" playsinline="" type="video/mp4" height="400"
                                width="600"></iframe>
                            <div class="hover-info"><button class="btn" data-bs-target="#videoModal"
                                    data-bs-toggle="modal"><i class="far fa-play-circle text-white"
                                        style="font-size:20px;"></i></button>
                                <h5>Lorem Ipsum</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 col-xxl-3">
                    <div class="movie-card"><img alt="woman posing beside lite window" class="image-porto"
                            src="assets/img/photo-1532800783378-1bed60adaf58.jpg">
                        <div class="card-img-overlay text-center d-flex flex-column justify-content-center align-items-center"
                            style="border-radius: 10px;background: linear-gradient(7deg, rgba(0,0,0,0.85) 0%, rgba(255,255,255,0.21) 99%); image-cover-portfolio">
                            <p class="paragraph-portfolio">Lorem Ipsum</p>
                        </div>
                        <div class="hover-popup"><iframe allowfullscreen="" frameborder="0"
                                src="https://www.youtube.com/embed/dRUlWLGumos?autoplay=1&amp;mute=1"
                                class="ratio ratio-16x9" playsinline="" type="video/mp4" height="400"
                                width="600"></iframe>
                            <div class="hover-info"><button class="btn" data-bs-target="#videoModal"
                                    data-bs-toggle="modal"><i class="far fa-play-circle text-white"
                                        style="font-size:20px;"></i></button>
                                <h5>Lorem Ipsum</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 col-xxl-3">
                    <div class="movie-card"><img alt="woman in orange long sleeve shirt holding black video camera"
                            class="image-porto" src="assets/img/photo-1619955617520-8dc17e989d79.jpg">
                        <div class="card-img-overlay text-center d-flex flex-column justify-content-center align-items-center image-cover-portfolio"
                            style="background: linear-gradient(7deg, rgba(0,0,0,0.85) 0%, rgba(255,255,255,0.21) 99%); image-cover-portfolio">
                            <p class="paragraph-portfolio">Lorem Ipsum</p>
                        </div>
                        <div class="hover-popup"><iframe allowfullscreen="" frameborder="0"
                                src="https://www.youtube.com/embed/dRUlWLGumos?autoplay=1&amp;mute=1"
                                class="ratio ratio-16x9" playsinline="" type="video/mp4" height="400"
                                width="600"></iframe>
                            <div class="hover-info"><button class="btn" data-bs-target="#videoModal"
                                    data-bs-toggle="modal"><i class="far fa-play-circle text-white"
                                        style="font-size:20px;"></i></button>
                                <h5>Lorem Ipsum</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 col-xxl-3">
                    <div class="movie-card"><img alt="woman sitting on armless chair with light between bookcases in room"
                            class="image-porto" src="assets/img/photo-1497015455546-1da71faf8d06.jpg">
                        <div class="card-img-overlay text-center d-flex flex-column justify-content-center align-items-center image-cover-portfolio"
                            style="background: linear-gradient(7deg, rgba(0,0,0,0.85) 0%, rgba(255,255,255,0.21) 99%);">
                            <p class="paragraph-portfolio">Lorem Ipsum</p>
                        </div>
                        <div class="hover-popup"><iframe allowfullscreen="" frameborder="0"
                                src="https://www.youtube.com/embed/dRUlWLGumos?autoplay=1&amp;mute=1"
                                class="ratio ratio-16x9" playsinline="" type="video/mp4" height="400"
                                width="600"></iframe>
                            <div class="hover-info"><button class="btn" data-bs-target="#videoModal"
                                    data-bs-toggle="modal"><i class="far fa-play-circle text-white"
                                        style="font-size:20px;"></i></button>
                                <h5>Lorem Ipsum</h5>
                            </div>
                        </div>
                        <div></div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 col-xxl-3">
                    <div class="movie-card"><img alt="woman wearing sunglasses" class="image-porto"
                            src="assets/img/photo-1562572159-4efc207f5aff.jpg">
                        <div class="card-img-overlay text-center d-flex flex-column justify-content-center align-items-center image-cover-portfolio"
                            style="background: linear-gradient(7deg, rgba(0,0,0,0.85) 0%, rgba(255,255,255,0.21) 99%);">
                            <p class="paragraph-portfolio">Lorem Ipsum</p>
                        </div>
                        <div class="hover-popup"><iframe allowfullscreen="" frameborder="0"
                                src="https://www.youtube.com/embed/dRUlWLGumos?autoplay=1&amp;mute=1"
                                class="ratio ratio-16x9" playsinline="" type="video/mp4" height="400"
                                width="600"></iframe>
                            <div class="hover-info"><button class="btn" data-bs-target="#videoModal"
                                    data-bs-toggle="modal"><i class="far fa-play-circle text-white"
                                        style="font-size:20px;"></i></button>
                                <h5>Lorem Ipsum</h5>
                            </div>
                        </div>
                        <div></div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 col-xxl-3">
                    <div class="movie-card"><img alt="silhouette photography of man holding camera" class="image-porto"
                            src="assets/img/photo-1576280314550-773c50583407.jpg">
                        <div class="card-img-overlay text-center d-flex flex-column justify-content-center align-items-center image-cover-portfolio"
                            style="background: linear-gradient(7deg, rgba(0,0,0,0.85) 0%, rgba(255,255,255,0.21) 99%);">
                            <p class="paragraph-portfolio">Lorem Ipsum</p>
                        </div>
                        <div class="hover-popup"><iframe allowfullscreen="" frameborder="0"
                                src="https://www.youtube.com/embed/dRUlWLGumos?autoplay=1&amp;mute=1"
                                class="ratio ratio-16x9" playsinline="" type="video/mp4" height="400"
                                width="600"></iframe>
                            <div class="hover-info"><button class="btn" data-bs-target="#videoModal"
                                    data-bs-toggle="modal"><i class="far fa-play-circle text-white"
                                        style="font-size:20px;"></i></button>
                                <h5>Lorem Ipsum</h5>
                            </div>
                        </div>
                        <div></div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 col-xxl-3">
                    <div class="movie-card"><img alt="person captures woman playing guitar from the camera"
                            class="image-porto" src="assets/img/photo-1560785219-cc81ab373cd3.jpg">
                        <div class="card-img-overlay text-center d-flex flex-column justify-content-center align-items-center image-cover-portfolio"
                            style="background: linear-gradient(7deg, rgba(0,0,0,0.85) 0%, rgba(255,255,255,0.21) 99%);">
                            <p class="paragraph-portfolio">Lorem Ipsum</p>
                        </div>
                        <div class="hover-popup"><iframe allowfullscreen="" frameborder="0"
                                src="https://www.youtube.com/embed/dRUlWLGumos?autoplay=1&amp;mute=1"
                                class="ratio ratio-16x9" playsinline="" type="video/mp4" height="400"
                                width="600"></iframe>
                            <div class="hover-info"><button class="btn" data-bs-target="#videoModal"
                                    data-bs-toggle="modal"><i class="far fa-play-circle text-white"
                                        style="font-size:20px;"></i></button>
                                <h5>Lorem Ipsum</h5>
                            </div>
                        </div>
                        <div></div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 col-xxl-3">
                    <div class="movie-card"><img alt="a woman kneeling down while holding a camera" class="image-porto"
                            src="assets/img/photo-1639427203687-d0e0e76d0c4c.jpg">
                        <div class="card-img-overlay text-center d-flex flex-column justify-content-center align-items-center image-cover-portfolio"
                            style="background: linear-gradient(7deg, rgba(0,0,0,0.85) 0%, rgba(255,255,255,0.21) 99%);">
                            <p class="paragraph-portfolio">Lorem Ipsum</p>
                        </div>
                        <div class="hover-popup"><iframe allowfullscreen="" frameborder="0"
                                src="https://www.youtube.com/embed/dRUlWLGumos?autoplay=1&amp;mute=1"
                                class="ratio ratio-16x9" playsinline="" type="video/mp4" height="400"
                                width="600"></iframe>
                            <div class="hover-info"><button class="btn" data-bs-target="#videoModal"
                                    data-bs-toggle="modal"><i class="far fa-play-circle text-white"
                                        style="font-size:20px;"></i></button>
                                <h5>Lorem Ipsum</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 col-xxl-3">
                    <div class="movie-card"><img alt="man in black t-shirt holding black umbrella" class="image-porto"
                            src="assets/img/photo-1594872669181-a79d7b5957e4.jpg">
                        <div class="card-img-overlay text-center d-flex flex-column justify-content-center align-items-center image-cover-portfolio"
                            style="background: linear-gradient(7deg, rgba(0,0,0,0.85) 0%, rgba(255,255,255,0.21) 99%);">
                            <p class="paragraph-portfolio">Lorem Ipsum</p>
                        </div>
                        <div class="hover-popup"><iframe allowfullscreen="" frameborder="0"
                                src="https://www.youtube.com/embed/dRUlWLGumos?autoplay=1&amp;mute=1"
                                class="ratio ratio-16x9" playsinline="" type="video/mp4" height="400"
                                width="600"></iframe>
                            <div class="hover-info"><button class="btn" data-bs-target="#videoModal"
                                    data-bs-toggle="modal"><i class="far fa-play-circle text-white"
                                        style="font-size:20px;"></i></button>
                                <h5>Lorem Ipsum</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 col-xxl-3">
                    <div class="movie-card"><img alt="black flat screen computer monitor" class="image-porto"
                            src="assets/img/photo-1604611364011-706e9e1f2573.jpg">
                        <div class="card-img-overlay text-center d-flex flex-column justify-content-center align-items-center image-cover-portfolio"
                            style="background: linear-gradient(7deg, rgba(0,0,0,0.85) 0%, rgba(255,255,255,0.21) 99%);">
                            <p class="paragraph-portfolio">Lorem Ipsum</p>
                        </div>
                        <div class="hover-popup"><iframe allowfullscreen="" frameborder="0"
                                src="https://www.youtube.com/embed/dRUlWLGumos?autoplay=1&amp;mute=1"
                                class="ratio ratio-16x9" playsinline="" type="video/mp4" height="400"
                                width="600"></iframe>
                            <div class="hover-info"><button class="btn" data-bs-target="#videoModal"
                                    data-bs-toggle="modal"><i class="far fa-play-circle text-white"
                                        style="font-size:20px;"></i></button>
                                <h5>Lorem Ipsum</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 col-xxl-3">
                    <div class="movie-card"><img alt="Train travels through chicago's urban canyon." class="image-porto"
                            src="assets/img/photo-1746286896673-f6dc25fad5ff.jpg">
                        <div class="card-img-overlay text-center d-flex flex-column justify-content-center align-items-center image-cover-portfolio"
                            style="background: linear-gradient(7deg, rgba(0,0,0,0.85) 0%, rgba(255,255,255,0.21) 99%);">
                            <p class="paragraph-portfolio">Lorem Ipsum</p>
                        </div>
                        <div class="hover-popup"><iframe allowfullscreen="" frameborder="0"
                                src="https://www.youtube.com/embed/dRUlWLGumos?autoplay=1&amp;mute=1"
                                class="ratio ratio-16x9" playsinline="" type="video/mp4" height="400"
                                width="600"></iframe>
                            <div class="hover-info"><button class="btn" data-bs-target="#videoModal"
                                    data-bs-toggle="modal"><i class="far fa-play-circle text-white"
                                        style="font-size:20px;"></i></button>
                                <h5>Lorem Ipsum</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 col-xxl-3">
                    <div class="movie-card"><img alt="a woman holding a camera and recording a video" class="image-porto"
                            src="assets/img/photo-1643327137793-e9f920c03eb9.jpg">
                        <div class="card-img-overlay text-center d-flex flex-column justify-content-center align-items-center image-cover-portfolio"
                            style="background: linear-gradient(7deg, rgba(0,0,0,0.85) 0%, rgba(255,255,255,0.21) 99%);">
                            <p class="paragraph-portfolio">Lorem Ipsum</p>
                        </div>
                        <div class="hover-popup"><iframe allowfullscreen="" frameborder="0"
                                src="https://www.youtube.com/embed/dRUlWLGumos?autoplay=1&amp;mute=1"
                                class="ratio ratio-16x9" playsinline="" type="video/mp4" height="400"
                                width="600"></iframe>
                            <div class="hover-info"><button class="btn" data-bs-target="#videoModal"
                                    data-bs-toggle="modal"><i class="far fa-play-circle text-white"
                                        style="font-size:20px;"></i></button>
                                <h5>Lorem Ipsum</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row d-xl-flex justify-content-xl-center align-items-xl-center">
                <div
                    class="col d-flex d-sm-flex d-md-flex d-lg-flex d-xl-flex d-xxl-flex justify-content-center align-items-center justify-content-sm-center align-items-sm-center justify-content-md-center align-items-md-center justify-content-lg-center align-items-lg-center justify-content-xl-center align-items-xl-center justify-content-xxl-center align-items-xxl-center mt-5">
                    <nav class="justify-content-center">
                        <ul class="pagination">
                            <li class="page-item justify-content-center pagination-color"><a class="page-link"
                                    aria-label="Previous" href="#"><span aria-hidden="true">«</span></a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">4</a></li>
                            <li class="page-item"><a class="page-link" href="#">5</a></li>
                            <li class="page-item"><a class="page-link" aria-label="Next" href="#"><span
                                        aria-hidden="true">»</span></a></li>
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
                        style="font-family: Aldrich, sans-serif;font-size: 40px;"><strong>discover </strong><br><strong>the
                            world&nbsp;in a ne way</strong></h1>
                    <p class="mt-5">Step beyond the familiar and discover the world in a whole new light, where every
                        moment becomes an opportunity to learn, to feel, and to truly connect with the beauty and complexity
                        of life around you."</p>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-6 d-xl-flex align-items-xl-center">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 mt-4"><iframe allowfullscreen=""
                                frameborder="0" src="https://www.youtube.com/embed/dRUlWLGumos" class="ratio ratio-16x9"
                                width=""></iframe></div>
                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 mt-4"><iframe allowfullscreen=""
                                frameborder="0" src="https://www.youtube.com/embed/dRUlWLGumos" class="ratio ratio-4x3"
                                width=""></iframe></div>
                    </div>
                </div>
            </div>
        </div>
    </header>
@endsection
