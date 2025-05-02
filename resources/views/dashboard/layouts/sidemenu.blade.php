<nav class="side-nav">
    <a href="" class="intro-x flex items-center pl-5 pt-4">
        <img alt="Midone - HTML Admin Template" class="w-6" src="/assets/images/logo.svg">
        <span class="hidden xl:block text-white text-lg ml-3"> Illumax </span>
    </a>
    <div class="side-nav__devider my-6"></div>
    <ul>
        <li>
            <a href="/dashboard" class="side-menu {{ Request::is('dashboard') ? 'side-menu--active' : '' }}">
                <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                <div class="side-menu__title">
                    Dashboard
                </div>
            </a>
        </li>
        <li class="side-nav__devider my-6"></li>
        <li>
            <a href="javascript:;"
                class="side-menu {{ Request::is('dashboard/aboutus*', 'dashboard/our-partner*', 'dashboard/contact*', 'dashboard/our-project*', 'dashboard/our-service*') ? 'side-menu--active' : '' }}">
                <div class="side-menu__icon"> <i data-lucide="layers"></i> </div>
                <div class="side-menu__title">
                    Menu Home
                    <div
                        class="side-menu__sub-icon {{ Request::is('dashboard/aboutus*', 'dashboard/our-partner*', 'dashboard/contact*', 'dashboard/our-project*', 'dashboard/our-service*') ? 'transform rotate-180' : '' }}">
                        <i data-lucide="chevron-down"></i>
                    </div>
                </div>
            </a>
            <ul
                class="{{ Request::is('dashboard/aboutus*', 'dashboard/our-partner*', 'dashboard/contact*', 'dashboard/our-project*', 'dashboard/our-service*') ? 'side-menu__sub-open' : '' }}">
                <li>
                    <a href="/dashboard/aboutus"
                        class="side-menu {{ Request::is('dashboard/aboutus*') ? 'side-menu--active' : '' }}">
                        <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                        <div class="side-menu__title">About Us</div>
                    </a>
                </li>
                <li>
                    <a href="/dashboard/contact"
                        class="side-menu {{ Request::is('dashboard/contact*') ? 'side-menu--active' : '' }}">
                        <div class="side-menu__icon"> <i data-lucide="phone-call"></i> </div>
                        <div class="side-menu__title">Contact</div>
                    </a>
                </li>
                <li>
                    <a href="/dashboard/our-partner"
                        class="side-menu {{ Request::is('dashboard/our-partner*') ? 'side-menu--active' : '' }}">
                        <div class="side-menu__icon"> <i data-lucide="monitor"></i> </div>
                        <div class="side-menu__title">Our Partner</div>
                    </a>
                </li>
                <li>
                    <a href="/dashboard/our-project"
                        class="side-menu {{ Request::is('dashboard/our-project*') ? 'side-menu--active' : '' }}">
                        <div class="side-menu__icon"> <i data-lucide="monitor"></i> </div>
                        <div class="side-menu__title">Our Project</div>
                    </a>
                </li>
                <li>
                    <a href="/dashboard/our-service"
                        class="side-menu {{ Request::is('dashboard/our-service*') ? 'side-menu--active' : '' }}">
                        <div class="side-menu__icon"> <i data-lucide="monitor"></i> </div>
                        <div class="side-menu__title">Our Service</div>
                    </a>
                </li>

            </ul>
        </li>
        <li>
            <a href="/dashboard/our-portofolio"
                class="side-menu {{ Request::is('dashboard/our-portofolio*') ? 'side-menu--active' : '' }}">
                <div class="side-menu__icon"> <i data-lucide="folder"></i> </div>
                <div class="side-menu__title"> Portofolio </div>
            </a>
        </li>
        <li>
            <a href="/dashboard/gallery"
                class="side-menu {{ Request::is('dashboard/gallery*') ? 'side-menu--active' : '' }}">
                <div class="side-menu__icon"> <i data-lucide="image"></i> </div>
                <div class="side-menu__title"> Gallery </div>
            </a>
        </li>
        {{-- <li>
            <a href="/dashboard/category"
                class="side-menu {{ Request::is('dashboard/category') ? 'side-menu--active' : '' }}">
                <div class="side-menu__icon"> <i data-lucide="layers"></i> </div>
                <div class="side-menu__title"> Category </div>
            </a>
        </li> --}}
        {{-- <li>
            <a href="/dashboard/category"
                class="side-menu {{ Request::is('dashboard/category') ? 'side-menu--active' : '' }}">
                <div class="side-menu__icon"> <i data-lucide="layers"></i> </div>
                <div class="side-menu__title"> Category </div>
            </a>
        </li>
        <li>
            <a href="/dashboard/file-manager"
                class="side-menu {{ Request::is('dashboard/file-manager') ? 'side-menu--active' : '' }}">
                <div class="side-menu__icon"> <i data-lucide="folder"></i> </div>
                <div class="side-menu__title"> File Manager </div>
            </a>
        </li> --}}
        <li class="side-nav__devider my-6"></li>
    </ul>
</nav>
