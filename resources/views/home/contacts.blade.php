@extends('home.layouts.app')
@section('container')
    <section>
        <div data-bss-parallax-bg="true" class="image-header"
            style="background: linear-gradient(29deg, black, rgba(0,0,0,0.23)), url(/assets/images/contact/{{ $contacts->gambar }}) center / cover no-repeat;">
            <div class="container h-100">
                <div
                    class="row d-sm-flex d-md-flex d-xl-flex d-xxl-flex justify-content-md-center align-items-md-center justify-content-xl-end justify-content-xxl-end align-items-xxl-center h-100">
                    <div class="col-md-6 text-center text-md-start">
                        <div>
                            <h1 class="paragraph-header" style="font-family: Aldrich, sans-serif;">{{ $contacts->textatas }}
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container-fluid py-5">
            <div class="row mb-5">
                <div class="col-md-8 col-xl-6 text-center mx-auto">
                    <p class="fw-bold mb-2" style="color: #c39832;">Contacts</p>
                    <h2 class="fw-bold" style="font-family: Aldrich, sans-serif;">Get In Touch</h2>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-sm-12 col-md-12 col-lg-5 col-xl-5">
                    <div class="contact-we">
                        <form class="p-3 p-xl-4" method="post">
                            <h4 class="mb-4" style="font-family: Aldrich, sans-serif;">Concact Us</h4>
                            <div class="mb-3"><input class="shadow-none form-control" type="text" id="name-1"
                                    name="name" placeholder="Name"></div>
                            <div class="mb-3"><input class="shadow-none form-control" type="email" id="email-1"
                                    name="email" placeholder="Email"></div>
                            <div class="mb-3"><input class="shadow-none form-control" type="email" id="email-2"
                                    name="email" placeholder="Phone"></div>
                            <div class="mb-3"><input class="form-control" type="email" id="email-3" name="email"
                                    placeholder="Subject"></div>
                            <div class="mb-3">
                                <textarea class="form-control" id="message-1" name="message" rows="6" placeholder="Message"></textarea>
                            </div>
                            <div><button class="btn d-block w-100 btn-git" type="submit">Send </button></div>
                        </form>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-5 col-xl-5">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                            <div class="d-flex align-items-center p-3">
                                <div
                                    class="bs-icon-md bs-icon-circle shadow d-flex flex-shrink-0 justify-content-center align-items-center d-inline-block bs-icon bs-icon-md">
                                    <i class="fas fa-phone-alt text-light" style="font-size: 24px;"></i>
                                </div>
                                <div class="px-2">
                                    <h6 class="fw-bold mb-0" style="font-family: Aldrich, sans-serif;">Phone&nbsp;</h6>
                                    <p class="text-muted mb-0">{{ $contacts->phone }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                            <div class="d-flex align-items-center p-3">
                                <div
                                    class="bs-icon-md bs-icon-circle shadow d-flex flex-shrink-0 justify-content-center align-items-center d-inline-block bs-icon bs-icon-md">
                                    <i class="fas fa-envelope text-light" style="font-size: 24px;"></i>
                                </div>
                                <div class="px-2">
                                    <h6 class="fw-bold mb-0" style="font-family: Aldrich, sans-serif;">Email</h6>
                                    <p class="text-muted mb-0">{{ $contacts->email }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                            <div class="d-flex align-items-center p-3">
                                <div
                                    class="bs-icon-md bs-icon-circle shadow d-flex flex-shrink-0 justify-content-center align-items-center d-inline-block bs-icon bs-icon-md">
                                    <i class="fa fa-whatsapp text-light" style="font-size: 24px;"></i>
                                </div>
                                <div class="px-2">
                                    <h6 class="fw-bold mb-0" style="font-family: Aldrich, sans-serif;">Whatsapp</h6>
                                    <p class="text-muted mb-0">{{ $contacts->whatsapp }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                            <div class="d-flex align-items-center p-3">
                                <div
                                    class="bs-icon-md bs-icon-circle shadow d-flex flex-shrink-0 justify-content-center align-items-center d-inline-block bs-icon bs-icon-md">
                                    <i class="fa fa-map-marker text-light" style="font-size: 25px;"></i>
                                </div>
                                <div class="px-2">
                                    <h6 class="fw-bold mb-0" style="font-family: Aldrich, sans-serif;">Office</h6>
                                    <p class="text-muted mb-0">{{ $contacts->office }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ratio ratio-16x9 mt-5"><iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.368631370524!2d106.68895767475173!3d-6.34628789364354!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69e5a6e26dc3cd%3A0xccd6344b8021119d!2sUniversitas%20Pamulang%20Kampus%202%20(UNPAM%20Viktor)!5e0!3m2!1sid!2sid!4v1746859764844!5m2!1sid!2sid"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <header class="bg-bottom-about-us"
        style="background: linear-gradient(167deg, rgb(18,18,18) 0%, rgba(18,18,18,0.84) 62%, rgba(0,0,0,0.61)), url(/assets/images/contact/{{ $contacts->gambar1 }}) center / cover no-repeat;">
        <div class="container">
            <h2 class="text-uppercase text-center mt-5">{{ $contacts->textbawah }}</h2>
        </div>
    </header>
@endsection
