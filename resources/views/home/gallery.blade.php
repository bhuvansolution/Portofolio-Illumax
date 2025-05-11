@extends('home.layouts.app')
@section('container')
    <section>
        <div data-bss-parallax-bg="true" class="image-header"
            style="background: linear-gradient(29deg, black, rgba(0,0,0,0.23)), url(/assets/images/gallerypage/{{ $gallerypage->gambar }}) center / cover no-repeat;">
            <div class="container h-100">
                <div
                    class="row d-sm-flex d-md-flex d-xl-flex d-xxl-flex justify-content-md-center align-items-md-center justify-content-xl-end justify-content-xxl-end align-items-xxl-center h-100">
                    <div class="col-md-6 text-center text-md-start">
                        <div>
                            <h1 class="paragraph-header">{{ $gallerypage->textatas }}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <header class="background-content-about p-5"
        style="/*background: linear-gradient(2deg, #000000 0%, rgba(255,255,255,0)), url(&quot;assets/img/bg-illumax.jpg&quot;);*/">
        <div class="container">
            <div id="carouselExampleControls" class="carousel" data-bs-ride="carousel">
                <h1 style="font-family: Aldrich, sans-serif;">Our Gallery</h1>
                <p>We turn imagination into motion, using audiovisual media to inspire, inform, and ignite curiosity.</p>
                <div class="carousel-inner">
                    @foreach ($gallery as $item)
                        <div class="carousel-item active">
                            <div class="card">
                                <div class="img-wrapper">
                                    <img class="img-fluid image-gallery" alt="{{ $item->title }}"
                                        src="/assets/images/gallery/{{ $item->gambar }}">
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div><button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                    data-bs-slide="prev"><span class="carousel-control-prev-icon" aria-hidden="true"></span><span
                        class="visually-hidden">Previous</span></button><button class="carousel-control-next" type="button"
                    data-bs-target="#carouselExampleControls" data-bs-slide="next"><span class="carousel-control-next-icon"
                        aria-hidden="true"></span><span class="visually-hidden">Next</span></button>
            </div>
        </div>
    </header>
    <header class="bg-bottom-about-us"
        style="background: linear-gradient(167deg, rgb(18,18,18) 0%, rgba(18,18,18,0.84) 62%, rgba(0,0,0,0.61)), url(/assets/images/gallerypage/{{ $gallerypage->gambar1 }}) center / cover no-repeat;">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 text-center">
                    <h2 class="text-uppercase text-center mt-5" style="font-family: Aldrich, sans-serif;font-size: 30px;">
                        "{{ $gallerypage->textbawah }}"</h2>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 text-center">
                    <div class="card-git">
                        <h4 class="text-uppercase text-center mt-5" style="font-family: Actor, sans-serif;">
                            {!! strip_tags($gallerypage->quote, '<br>') !!}</h4><button class="btn btn-git" type="button">Get in&nbsp;
                            Touch</button>
                    </div>
                </div>
            </div>
        </div>
    </header>
@endsection
