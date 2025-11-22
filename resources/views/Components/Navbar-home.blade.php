<style>
    .navbar-expand-lg {
        padding-right: 5rem;
    }

    .navbar-title-text {
        font-size: 1.1rem;
    }

    .nav-link {
        font-weight: 600;
        font-size: 0.95rem;
        text-transform: uppercase;
        padding-left: 0.5rem;
        padding-right: 0.5rem;
    }

    .navbar-nav .nav-link:hover {
        color: #ee0000 !important;
    }

    .navbar-nav .nav-link.active {
        color: #ee0000 !important;
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

    /* Styling untuk offcanvas */
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
    }

    @media(max-width: 768px) {
        .navbar-expand-lg {
            padding-inline: 1rem;
        }
    }
</style>

<nav class="navbar navbar-expand-lg navbar-light bg-light" id="mainNavbar">
    <div class="container-fluid">
        <a class="navbar-brand d-flex align-items-center gap-2" href="/">
            <img src="/img/logo-aci.png" alt="logo-aci" width="50" height="50"
                class="d-inline-block align-text-top me-2"
                style="object-position: center; object-fit: contain; aspect-ratio: 1/1;">
            <span class="text-uppercase fw-bold navbar-title-text">ASOSIASI CASTING INDONESIA</span>
        </a>

        <button class="navbar-toggler d-lg-none" style="outline: none; border: none;" type="button"
            data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar"
            aria-label="Toggle navigation">
            <i class="fa-solid fa-bars"></i>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav gap-xl-3">
                <li class="nav-item">
                    <a class="nav-link" href="/">HOME</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/about">ABOUT</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/our-team">OUR TEAM</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/poster">POSTER</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{ url('/casting-submission') }}">CASTING SUBMISSION</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/news">NEWS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/contact">CONTACT</a>
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
                <a class="nav-link" aria-current="page" href="{{ url('/') }}">HOME</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/about">ABOUT</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/our-team">OUR TEAM</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/poster">POSTER</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="{{ url('/casting-submission') }}">CASTING SUBMISSION</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/news">NEWS</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/contact">CONTACT</a>
            </li>
        </ul>
    </div>
</div>
