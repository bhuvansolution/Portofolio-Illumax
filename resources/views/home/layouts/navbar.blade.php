<nav class="navbar navbar-expand-md sticky-top navbar-dark" id="mainNav">
    <div class="container"><a class="navbar-brand d-flex align-items-center" href="index.html"><img
                class="img-fluid logo-navbar" src="assets/img/illumax-logo-gold-removebg-preview.png"></a><button
            data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span
                class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navcol-1">
            <ul class="navbar-nav ms-auto nav-menu">
                <li class="nav-item"><a class="nav-link {{ Request::is('aboutus') ? 'active' : '' }}"
                        href="/aboutus">About Us</a></li>
                <li class="nav-item"><a class="nav-link {{ Request::is('services') ? 'active' : '' }} "
                        href="/services">Services</a></li>
                <li class="nav-item"><a class="nav-link {{ Request::is('portfolio') ? 'active' : '' }}"
                        href="/portfolio">Portfolio</a></li>
                <li class="nav-item"><a class="nav-link {{ Request::is('gallery') ? 'active' : '' }}"
                        href="/gallery">Gallery</a></li>
                <li class="nav-item"><a class="nav-link {{ Request::is('contacts') ? 'active' : '' }}"
                        href="/contacts">Contacts</a></li>
                <li class="nav-item"><a class="nav-link" href="language">EN</a></li>
            </ul>
        </div>
    </div>
</nav>
