<style>
    .navbar-expand-lg {
        padding-right: 5rem;
        background-color: #ee0000;
    }

    .navbar-title-text {
        font-size: 1.1rem;
        color: white;

    }

    .nav-link {
        font-weight: 600;
        font-size: 0.95rem;
        text-transform: uppercase;
        padding-left: 0.5rem;
        color: #f1f1f1;
        padding-right: 0.5rem;
    }

    .navbar-nav .nav-link:hover {
        color: #ffffff !important;
    }

    .navbar-nav .nav-link.active {
        color: #ffffff !important;
        font-weight: 800;
    }

    .navbar-toggler i {
        font-size: 1.25rem;
    }

    #mainNavbar {
        position: sticky;
        top: 0;
        width: 100%;
        z-index: 1030;
    }

    .offcanvas-body .nav-link {
        padding: 0.75rem 1rem;
        color: white;
    }

    .offcanvas-body .nav-link:hover {
        color: white !important;
    }

    .offcanvas-body .nav-link.active {
        color: white !important;
        font-weight: 800;
        font-family: 'TCB', sans-serif;
    }

    .offcanvas-header {
        background-color: #ee0000;
        color: white;
        border-bottom: 1px solid rgba(255, 255, 255, 0.2);
    }

    .offcanvas-header .btn-close {
        filter: brightness(0) invert(1);
    }

    #offcanvasNavbar {
        width: 280px !important;
    }

    @media (max-width: 1200px) {
        .navbar-title-text {
            font-size: 1rem;
        }

        .nav-link {
            text-align: center
        }
    }

    @media (max-width: 992px) {
        .navbar-title-text {
            font-size: 0.8rem;
        }

        .navbar-expand-lg {
            padding-inline: 1rem;
        }
    }
</style>

<nav class="navbar navbar-expand-lg navbar-light" id="mainNavbar">
    <div class="container-fluid">
        <a class="navbar-brand d-flex align-items-center gap-2" href="/">
            <img src="/img/logo-aci.png" alt="logo-aci" width="50" height="50"
                class="d-inline-block align-text-top me-2"
                style="object-position: center; object-fit: contain; aspect-ratio: 1/1; filter: brightness(0) invert(1)">
            <span class="text-uppercase fw-bold navbar-title-text">ASOSIASI CASTING INDONESIA</span>
        </a>

        <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="offcanvas"
            style="border:none; outline: none;" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar"
            aria-label="Toggle navigation">
            <i class="fa-solid fa-bars text-white"></i>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav gap-xl-3">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="/">HOME</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('about') ? 'active' : '' }}" href="/about">ABOUT</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('our-team') ? 'active' : '' }}" href="/our-team">OUR TEAM</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('poster') ? 'active' : '' }}" href="/poster">POSTER</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('casting-submission') ? 'active' : '' }}"
                        href="{{ url('/casting-submission') }}">CASTING SUBMISSION</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('news') ? 'active' : '' }}" href="/news">NEWS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('contact') ? 'active' : '' }}" href="/contact">CONTACT</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel"
    style="background-color: #ee0000;">
    <div class="offcanvas-header">
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end align-items-end flex-grow-1 pe-3 gap-2">
            <li class="nav-item">
                <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" aria-current="page"
                    href="{{ url('/') }}">HOME</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('about') ? 'active' : '' }}" href="/about">ABOUT</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('our-team') ? 'active' : '' }}" href="/our-team">OUR TEAM</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('poster') ? 'active' : '' }}" href="/poster">POSTER</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('casting-submission') ? 'active' : '' }}"
                    href="{{ url('/casting-submission') }}">CASTING SUBMISSION</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('news') ? 'active' : '' }}" href="/news">NEWS</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('contact') ? 'active' : '' }}" href="/contact">CONTACT</a>
            </li>
        </ul>
    </div>
</div>
