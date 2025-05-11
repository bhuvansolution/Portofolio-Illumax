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
                            <h1 class="paragraph-header" style="font-family: Aldrich, sans-serif;">{{ $about->textatas }}</h1>
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
                            <div><img class="img-fluid image-about-us4" alt="woman wearing sunglasses"
                                    src="/assets/images/aboutus/{{ $about->gambar }}"></div>
                        </div>
                        <div class="col">
                            <div><img class="img-fluid image-about-us3" alt="woman holding heft long blonde hair"
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
