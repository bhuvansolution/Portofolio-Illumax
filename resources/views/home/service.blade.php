@extends('home.layouts.app')
@section('container')
    <section>
        <div data-bss-parallax-bg="true" class="image-header"
            style="background: linear-gradient(29deg, black, rgba(0,0,0,0.23)), url(/assets/images/service/{{ $ourservice->gambar }}) center / cover no-repeat;">
            <div class="container h-100">
                <div
                    class="row d-sm-flex d-md-flex d-xl-flex d-xxl-flex justify-content-md-center align-items-md-center justify-content-xl-end justify-content-xxl-end align-items-xxl-center h-100">
                    <div class="col-md-6 text-center text-md-start">
                        <div>
                            <h1 class="paragraph-header">{{ $ourservice->textatas }}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="p-5">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-4">
                    <h3>Supporting Digital Business Branding Agencies Privat Documentaries</h3>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-8">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-3">
                            <div class="text-center d-flex flex-column align-items-center align-items-xl-center">
                                <div
                                    class="bs-icon-lg d-inline-block flex-shrink-0 justify-content-center align-items-center mb-3 bs-icon lg icon-service">
                                    <i class="fas fa-photo-video"></i>
                                </div>
                                <div class="px-3">
                                    <h5>Video Editing</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-3">
                            <div class="text-center d-flex flex-column align-items-center align-items-xl-center">
                                <div
                                    class="bs-icon-lg d-inline-block flex-shrink-0 justify-content-center align-items-center mb-3 bs-icon lg icon-service">
                                    <i class="fas fa-users-cog" style="font-size: 32px;"></i>
                                </div>
                                <div class="px-3">
                                    <h5>Cammeramen</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-3">
                            <div class="text-center d-flex flex-column align-items-center align-items-xl-center">
                                <div
                                    class="bs-icon-lg d-inline-block flex-shrink-0 justify-content-center align-items-center mb-3 bs-icon lg icon-service">
                                    <i class="fas fa-video" style="font-size: 32px;"></i>
                                </div>
                                <div class="px-3">
                                    <h5>Video Graphing</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-3">
                            <div class="text-center d-flex flex-column align-items-center align-items-xl-center">
                                <div
                                    class="bs-icon-lg d-inline-block flex-shrink-0 justify-content-center align-items-center mb-3 bs-icon lg icon-service">
                                    <i class="fas fa-tags" style="font-size: 32px;"></i>
                                </div>
                                <div class="px-3">
                                    <h5>Branding</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <header
        style="background: linear-gradient(-1deg, rgb(18,18,18), rgba(255,255,255,0)), url(&quot;assets/img/bg-illumax-service.jpg&quot;) center / cover no-repeat;padding-bottom: 100px;">
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
    <header
        style="background: linear-gradient(-1deg, rgb(0,0,0), rgba(255,255,255,0)), url(&quot;assets/img/photo-1470338229081-eb5980be28c9.jpg&quot;) center / cover no-repeat;padding-bottom: 100px;">
        <div class="container-fluid">
            <div class="row">
                <div class="col content-bg-us">
                    <div class="marquee">
                        <h1 class="marquee-content">&nbsp;<span class="text-marquee">Illumax</span><span
                                class="text-marquee">Illumax</span><span class="text-marquee">Illumax</span><span
                                class="text-marquee">Illumax</span><span class="text-marquee">Illumax</span><span
                                class="text-marquee">Illumax</span><span class="text-marquee">Illumax</span><span
                                class="text-marquee">Illumax</span></h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col content-bg-us" style="margin-top:-40px;">
                    <h1 class="git-text" style="font-family: Aldrich, sans-serif;font-size: 70px;">GET IN TOUCH</h1>
                    <ul class="list-inline">
                        <li class="list-inline-item link-contact"><a class="link-contact"
                                href="mailto:illumax@gmail.id">{{ $contacts->email }}</a></li>
                        <li class="list-inline-item link-contact"><a class="link-contact"
                                href="Instagram.com">{{ $contacts->instagram }}</a>
                        </li>
                        <li class="list-inline-item link-contact"><a class="link-contact"
                                href="https://wa.me/6281234567890">+6281908710689</a></li>
                    </ul>
                </div>
            </div>
            <div class="row" style="margin-top:-300px;">
                <div class="col content-bg-us">
                    <div class="marquee-right">
                        <h1 class="marquee-right-content">&nbsp;<span class="text-marquee">CREATIVE AGENCY</span><span
                                class="text-marquee">CREATIVE AGENCY</span><span class="text-marquee">CREATIVE
                                AGENCY</span><span class="text-marquee">CREATIVE AGENCY</span><span
                                class="text-marquee">CREATIVE AGENCY</span><span class="text-marquee">CREATIVE
                                AGENCY</span><span class="text-marquee">CREATIVE AGENCY</span></h1>
                    </div>
                </div>
            </div>
        </div>
    </header>
@endsection
