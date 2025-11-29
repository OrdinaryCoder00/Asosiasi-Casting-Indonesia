<style>
    .main-footer {
        background-color: #ee0000;
        color: white;
    }

    .logo-content {
        width: 100%;
        height: 100%;
    }

    .logo-col {
        padding-right: 15px;
    }



    .logo-img {
        width: auto;
        height: 50px;
        filter: brightness(0) invert(1);
        object-fit: contain;
        object-position: center;
        aspect-ratio: 1/1;
    }

    .logo-text {
        margin-top: 5px;
        text-align: left;
        font-weight: 600;
    }

    .contact-col {
        padding-left: 30px;
    }

    .contact-title {
        border-bottom: 2px solid white;
        padding-bottom: 5px;
        margin-bottom: 15px;
        font-size: 1.5rem;
    }

    .contact-item {
        margin-bottom: 10px;
    }

    .contact-item a {
        font-size: 24px;
    }

    .contact-icon {
        margin-right: 10px;
    }

    .contact-link {
        color: inherit;
        text-decoration: none;
        font-size: 1.25rem;
    }

    @media (min-width: 768px) {

        .logo-col .logo-content {
            border-right-width: 1px !important;
        }

        .col-md-4>div {
            border-right-width: 1px !important;
        }

        .main-footer {
            padding-inline: 5rem;
            padding-bottom: 4rem;
            padding-top: 8rem;
        }
    }

    @media (max-width: 538px) {
        .main-footer {
            padding-inline: 1.5rem;
            padding-block: 2rem;
        }

        .contact-col {
            padding-left: 0px;
            padding-inline: 12px;
        }

        .contact-item a {
            font-size: 18px;
        }


    }
</style>

<footer class="main-footer">
    <div class="container-fluid">
        <div class="row d-flex align-items-stretch row-cols-1 row-cols-md-2">

            <div
                class="col-md-6 col-lg-6 d-flex flex-column gap-2 align-items-center justify-content-center
                            text-center text-md-start mb-4 mb-md-0 logo-col">

                <div class=" d-flex flex-column gap-2 align-items-start justify-content-center logo-content">

                    <img src="/img/logo-aci.png" alt="logo-footer" class=" align-self-start logo-img">
                    <h3 class="text-uppercase logo-text">
                        ASOSIASI<br>
                        CASTING<br>
                        INDONESIA
                    </h3>
                </div>
            </div>

            <section id="contact" class="col-md-6 col-lg-6 contact-col align-content-end">

                <h3 class="text-uppercase contact-title">
                    Contact Us!
                </h3>

                <div class="d-flex flex-column">
                    <div class="contact-item">
                        <i class="fas fa-envelope contact-icon"></i>
                        <a href="mailto:asosiasicastingindonesia@gmail.com" class="contact-link" target="_blank">
                            <span>asosiasicastingindonesia@gmail.com</span>
                        </a>
                    </div>

                    <div class="contact-item">
                        <i class="fas fa-phone contact-icon"></i>
                        <a href="https://wa.me/+6281234568790" class="contact-link" target="_blank">
                            <span>+62 812-3456-8790</span>
                        </a>
                    </div>
                </div>
            </section>
        </div>
    </div>
</footer>
