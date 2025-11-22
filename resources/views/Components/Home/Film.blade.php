@props(['film'])

<style>
    .film-poster-header {
        display: flex;
        flex-direction: column;
        justify-content: center;
        color: #fff;
        padding-top: 4rem;
    }

    .header-section-poster {
        padding-inline: 5.7rem;
        padding-bottom: 4rem;
        background: transparent;
    }

    .section-title {
        font-size: 2.5rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .subtitle-poster {
        font-size: 1.5rem;
        /* line-height: 1.6; */
        max-width: 800px;
        margin: 0 auto;
        text-align: center;
    }


    .poster-scroll-container {
        display: flex;
        overflow-x: auto;
        overflow-y: hidden;
        padding: 0;
        gap: 2rem;
        max-height: 850px;
        -ms-overflow-style: none;
        scrollbar-width: none;
        /* Padding kiri untuk membuat gambar pertama terpotong setengah */
        /* transform: translateX(-10px) */
    }

    .poster-scroll-container::-webkit-scrollbar {
        display: none;
    }

    .poster-card-col {
        flex: 0 0 500px;
        max-width: 500px;
        min-width: 500px;
    }

    .poster-card {
        position: relative;
        height: 700px;
        overflow: hidden;
        cursor: pointer;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .poster-card-image-wrapper {
        width: 100%;
        height: 100%;
        overflow: hidden;
    }

    .poster-card img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
        transition: transform 0.5s ease;
        display: block;
    }

    .poster-card:hover .poster-card-image-wrapper img {
        transform: scale(1.08);
    }

    .poster-info-overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background: linear-gradient(to top, rgba(0, 0, 0, 0.95) 0%, rgba(0, 0, 0, 0.7) 70%, transparent 100%);
        padding: 2.5rem 2rem 2rem;
        opacity: 0;
        transform: translateY(20px);
        transition: opacity 0.4s ease, transform 0.4s ease;
        pointer-events: none;
    }

    .poster-card:hover .poster-info-overlay {
        opacity: 1;
        transform: translateY(0);
        pointer-events: auto;
    }

    .poster-card.modal-open:hover .poster-card-image-wrapper img {
        transform: scale(1) !important;
    }

    .poster-card.modal-open:hover .poster-info-overlay {
        opacity: 0 !important;
        transform: translateY(20px) !important;
        pointer-events: none !important;
    }

    .poster-title {
        color: #fff;
        font-weight: 700;
        margin-bottom: 1rem;
        font-size: 1.5rem;
        /* line-height: 1.3; */
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
    }

    .poster-description {
        color: rgba(255, 255, 255, 0.95);
        font-size: 1rem;
        /* line-height: 1.6; */
        margin-bottom: 1.5rem;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .btn-read-more {
        background-color: #f3f3f3;
        color: #000;
        border: none;
        padding: 0.65rem 1.5rem;
        border-radius: 8px;
        font-size: 0.95rem;
        font-weight: 600;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
    }

    .btn-read-more:hover {
        background-color: #ee0000;
        color: white;
        transform: translateX(5px);
        box-shadow: 0 4px 12px rgba(238, 0, 0, 0.3);
    }

    .btn-read-more i {
        transition: transform 0.3s ease;
    }

    .btn-read-more:hover i {
        transform: translateX(3px);
    }

    /* Modal Styles - Improved Responsive */
    .modal-content {
        border-radius: 0 !important;
        border: none !important;
        min-height: 70vh;
        max-height: 70vh;
    }

    .modal-dialog.modal-xl-custom {
        max-width: 1200px;
        margin: 1.75rem auto;
        height: calc(100vh - 3.5rem);
    }

    .modal-body-custom {
        padding: 0;
        height: 100%;
        overflow: hidden;
    }

    .film-modal-row {
        height: 100%;
    }

    /* Container Kanan (Konten) */
    .modal-film-content {
        display: flex;
        flex-direction: column;
        height: 100%;
        overflow: hidden;
    }

    /* Poster Film (Gambar Kiri) */
    .modal-film-poster {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
    }

    /* Header Sticky Hitam */
    .modal-sticky-header-film {
        background-color: black;
        padding: 0.5rem 1rem;
        position: sticky;
        top: 0;
        z-index: 11;
        display: flex;
        justify-content: flex-end;
        flex-shrink: 0;
    }

    .modal-film-title {
        flex-shrink: 0;
        margin: 2.5rem 3rem 1rem;
        background: #fff;
        border-bottom: 2px solid #000;
    }

    .modal-film-title h2 {
        font-size: 2.5rem;
        font-weight: 700;
        margin: 0;
    }

    .modal-film-description {
        min-height: 420px;
        max-height: 420px;
        overflow-y: auto;
        padding: 2rem 3rem;
        font-size: 1.125rem;
        /* line-height: 1.8; */
    }

    .modal-film-description p {
        margin: 0;
    }

    /* Footer (Sticky di Bawah) */
    .modal-film-footer {
        position: sticky;
        bottom: 0;
        flex-shrink: 0;
        margin: 1.5rem 3rem;
        background: #fff;
        border-top: 2px solid #333;
        box-shadow: 0 -2px 8px rgba(0, 0, 0, 0.05);
        z-index: 11;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .footer-item {
        font-size: 1rem;
    }

    .footer-label {
        font-size: 0.9rem;
        color: #666;
        margin-bottom: 0.25rem;
    }

    .footer-value {
        font-weight: bold;
        margin: 0;
    }

    .footer-link {
        text-decoration: none;
        color: #000;
        font-weight: bold;
        transition: color 0.3s ease;
    }

    .footer-link:hover {
        color: #ee0000;
    }

    /* Responsive Design */
    @media (max-width: 1200px) {
        .poster-card-col {
            flex: 0 0 400px;
            min-width: 400px;
            max-width: 400px;
        }

        .poster-card {
            height: 600px;
        }

        .section-title {
            font-size: 2rem;
        }

        .modal-film-title {
            margin: 2rem 2.5rem 1rem;
        }

        .modal-film-title h2 {
            font-size: 2rem;
        }

        .modal-film-description {
            padding: 1.5rem 2.5rem;
            font-size: 1rem;
        }

        .modal-film-footer {
            margin: 1.25rem 2.5rem;
        }
    }

    @media (max-width: 992px) {
        .header-section-poster {
            padding-inline: 2rem;
        }

        .modal-dialog.modal-xl-custom {
            max-width: 95%;
            margin: 1rem auto;
            height: calc(100vh - 2rem);
        }

        .modal-content {
            min-height: 70vh;
        }

        .film-modal-row .col-md-5,
        .film-modal-row .col-md-7 {
            width: 100%;
            max-width: 100%;
        }

        .modal-film-poster {
            height: 350px;
            max-height: 350px;
        }

        .modal-film-title h2 {
            font-size: 1.75rem;
        }
    }

    @media (max-width: 768px) {
        .film-poster-header {
            min-height: 200px;
            padding: 1.5rem 0;
        }

        .header-section-poster {
            padding-inline: 1rem;
        }

        .section-title {
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
        }

        .subtitle-poster {
            font-size: 1rem;
            text-align: start;
        }

        /* Carousel untuk mobile */
        .poster-scroll-container {
            gap: 1.5rem;
        }

        .poster-card-col {
            flex: 0 0 320px;
            min-width: 320px;
            max-width: 320px;
        }

        .poster-card {
            height: 480px;
        }

        .poster-info-overlay {
            padding: 2rem 1.5rem 1.5rem;
        }

        .poster-title {
            font-size: 1.25rem;
            margin-bottom: 0.75rem;
        }

        .poster-description {
            font-size: 0.9rem;
            margin-bottom: 1.25rem;
        }

        /* Modal Mobile */
        .modal-dialog.modal-xl-custom {
            margin: 0.5rem;
            height: calc(100vh - 1rem);
            max-width: calc(100% - 1rem);
        }

        .modal-content {
            min-height: auto;
            max-height: calc(100vh - 1rem);
        }

        .modal-film-poster {
            height: 250px;
            max-height: 250px;
        }

        .modal-film-title {
            margin: 1.5rem 1.5rem 1rem;
        }

        .modal-film-title h2 {
            font-size: 1.5rem;
        }

        .modal-film-description {
            padding: 1.25rem 1.5rem;
            font-size: 0.95rem;
        }

        .modal-film-footer {
            margin: 1rem 1.5rem;
            flex-direction: column;
            gap: 1rem;
            align-items: flex-start;
        }

        .footer-item {
            width: 100%;
        }

        .footer-item.text-end {
            text-align: left !important;
        }

        .footer-value {
            font-size: 0.95rem;
        }



        .modal-film-description {
            min-height: auto;
            overflow-y: auto;
            /* line-height: 1.8; */
        }
    }

    @media (max-width: 480px) {


        .poster-card-col {
            flex: 0 0 280px;
            min-width: 280px;
            max-width: 280px;
        }

        .poster-card {
            height: 420px;
        }

        .modal-film-poster {
            height: 200px;
            max-height: 200px;
        }

        .poster-scroll-container {
            padding-block: 1rem;
        }

        .modal-film-title h2 {
            font-size: 1.25rem;
        }

        .modal-film-description {
            max-height: 150px;
            font-size: 0.9rem;
            padding: 1rem 1.5rem;
        }

        .subtitle-poster {
            text-align: justify;
        }

        .img-wrapper {
            height: 150px;
        }
    }
</style>

<div class="container-fluid p-0">
    <div class="film-poster-header">
        <div class="header-section-poster pt-lg-0">
            <div class="row align-items-center p-0">
                <div class="col-lg-2 col-md-3 mb-lg-0 mb-3">
                    <h2 class="section-title mb-0">Film</h2>
                </div>

                <div class="col-lg-8 col-md-6">
                    <p class="subtitle-poster">
                        This section showcases films featuring talents cast through ACI, representing
                        the creative results of collaborations between casting directors and filmmakers.
                    </p>
                </div>

                <div class="col-lg-2 col-md-3 text-md-end d-none d-lg-block">
                    <h2 class="section-title mb-0">Poster</h2>
                </div>
            </div>
        </div>
        <div class="poster-scroll-container">
            @foreach ($film as $item)
                <div class="poster-card-col">
                    <div class="poster-card" data-card-id="{{ $item['id'] ?? $loop->index }}">
                        <div class="poster-card-image-wrapper">
                            <img src="{{ $item['image'] }}" alt="{{ $item['Nama_Film'] }}">
                        </div>
                        <div class="poster-info-overlay">
                            <h4 class="poster-title border-bottom">{{ $item['Nama_Film'] }}</h4>
                            <p class="poster-description">{{ $item['Deskripsi_singkat'] }}</p>
                            <a href="#" class="btn-read-more" data-bs-toggle="modal"
                                data-bs-target="#filmModal{{ $item['id'] ?? $loop->index }}">
                                Read More <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Modals untuk setiap film -->
@foreach ($film as $item)
    <div class="modal fade" id="filmModal{{ $item['id'] ?? $loop->index }}" tabindex="-1"
        aria-labelledby="filmModalLabel{{ $item['id'] ?? $loop->index }}" aria-hidden="true">

        <div class="modal-dialog modal-xl modal-xl-custom modal-dialog-centered">

            <div class="modal-content">
                <div class="modal-body modal-body-custom">
                    <div class="modal-sticky-header-film d-lg-none d-flex">
                        <button type="button" class="" data-bs-dismiss="modal" aria-label="Close"
                            style="background: none; outline: none; border: none;"><img src="/img/Icon-x.png"
                                alt="X" width="30" height="30"></button>
                    </div>
                    <div class="row g-0 h-100 film-modal-row">
                        <div class="col-md-5 img-wrapper">
                            <img src="{{ $item['image'] }}" alt="{{ $item['Nama_Film'] }}" class="modal-film-poster">
                        </div>

                        <div class="col-md-7">
                            <div class="modal-film-content">

                                <div class="modal-sticky-header-film d-lg-flex d-none">
                                    <button type="button" class="" data-bs-dismiss="modal" aria-label="Close"
                                        style="background: none; outline: none; border: none;"><img
                                            src="/img/Icon-x.png" alt="X" width="30" height="30"></button>
                                </div>

                                <div class="modal-film-title">
                                    <h2>{{ $item['Nama_Film'] }}</h2>
                                </div>
                                <div class="modal-film-description">
                                    <p>{{ $item['Deskripsi_lengkap'] ?? $item['Deskripsi_singkat'] }}</p>
                                </div>

                                <div class="modal-film-footer">
                                    <div class="footer-item">
                                        <div class="footer-label">Casting Director</div>
                                        <p class="footer-value">
                                            {{ $item['nama_casting_director'] ?? 'N/A' }}</p>
                                    </div>
                                    <div class="footer-item text-end">
                                        <div class="footer-label">Read More :</div>
                                        <p class="footer-value">
                                            <a href="#" class="footer-link">
                                                {{ $item['nama_casting_director'] ?? 'N/A' }}
                                            </a>
                                        </p>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const posterCards = document.querySelectorAll('.poster-card');
        const modals = document.querySelectorAll('.modal');

        modals.forEach(function(modal) {
            modal.addEventListener('show.bs.modal', function() {
                posterCards.forEach(function(card) {
                    card.classList.add('modal-open');
                });
            });

            modal.addEventListener('hidden.bs.modal', function() {
                setTimeout(function() {
                    posterCards.forEach(function(card) {
                        card.classList.remove('modal-open');
                    });
                }, 150);
            });
        });
    });
</script>
