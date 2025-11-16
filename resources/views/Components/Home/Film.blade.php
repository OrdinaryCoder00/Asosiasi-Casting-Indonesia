@props(['film'])

<style>
    .film-poster-header {
        min-height: 250px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        color: #fff;
        padding-top: 4rem;
    }

    .section-title {
        font-size: 2.5rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .section-description {
        font-size: 1.125rem;
        line-height: 1.6;
        max-width: 800px;
        margin: 0 auto;
    }

    .poster-scroll-container {
        display: flex;
        overflow-x: auto;
        overflow-y: hidden;
        padding: 0 1rem;
        gap: 2rem;
        max-height: 850px;
        -ms-overflow-style: none;
        scrollbar-width: none;
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
        line-height: 1.3;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
    }

    .poster-description {
        color: rgba(255, 255, 255, 0.95);
        font-size: 1rem;
        line-height: 1.6;
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

    /* Modal Styles */
    .modal-xl-custom {
        max-width: 1400px;
    }

    .modal-body-custom {
        padding: 0;
        max-height: 85vh;
        overflow: hidden;
    }

    .modal-film-poster {
        height: 100%;
        min-height: 700px;
        object-fit: cover;
        object-position: center;
    }

    .modal-film-content {
        display: flex;
        flex-direction: column;
        height: 100%;
        min-height: 700px;
        background: #f8f9fa;
    }

    .modal-film-title {
        flex-shrink: 0;
        padding: 2.5rem 3rem 1.5rem;
        background: #fff;
        border-bottom: 3px solid #ee0000;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        z-index: 10;
    }

    .modal-film-title h2 {
        font-size: 2.5rem;
        font-weight: 700;
        color: #333;
        margin: 0;
    }

    .modal-film-description {
        flex: 1;
        overflow-y: auto;
        padding: 2rem 3rem;
        background: #f8f9fa;
    }

    .modal-film-description p {
        font-size: 1.1rem;
        color: #555;
        line-height: 1.8;
        text-align: justify;
        margin: 0;
    }

    .modal-film-description::-webkit-scrollbar {
        width: 8px;
    }

    .modal-film-description::-webkit-scrollbar-track {
        background: #e9ecef;
        border-radius: 10px;
    }

    .modal-film-description::-webkit-scrollbar-thumb {
        background: #ee0000;
        border-radius: 10px;
    }

    .modal-film-description::-webkit-scrollbar-thumb:hover {
        background: #c40506;
    }

    .modal-film-footer {
        flex-shrink: 0;
        padding: 1.5rem 3rem;
        background: #fff;
        border-top: 2px solid #333;
        box-shadow: 0 -2px 8px rgba(0, 0, 0, 0.05);
        z-index: 10;
    }

    .footer-item {
        flex: 1;
    }

    .footer-label {
        font-size: 0.85rem;
        color: #888;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 0.5rem;
        font-weight: 500;
    }

    .footer-value {
        font-size: 1.1rem;
        color: #333;
        font-weight: 600;
        margin: 0;
    }

    .footer-link {
        color: #ee0000;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .footer-link:hover {
        color: #c40506;
        text-decoration: underline;
    }

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

        .modal-film-content {
            min-height: 600px;
        }

        .modal-film-poster {
            min-height: 600px;
        }

        .modal-film-title {
            padding: 2rem 2.5rem 1.25rem;
        }

        .modal-film-title h2 {
            font-size: 2rem;
        }

        .modal-film-description {
            padding: 1.5rem 2.5rem;
        }

        .modal-film-footer {
            padding: 1.25rem 2.5rem;
        }
    }

    @media (max-width: 768px) {
        .film-poster-header {
            min-height: 200px;
            padding: 1.5rem 0;
        }

        .section-title {
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
        }

        .section-description {
            font-size: 0.95rem;
        }

        .poster-card-col {
            flex: 0 0 320px;
            min-width: 320px;
            max-width: 320px;
        }

        .poster-card {
            height: 480px;
        }

        .poster-scroll-container {
            padding: 2rem 1rem;
            gap: 1.5rem;
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

        .modal-film-content {
            min-height: auto;
        }

        .modal-film-poster {
            min-height: 400px;
        }

        .modal-film-title {
            padding: 1.5rem 2rem 1rem;
        }

        .modal-film-title h2 {
            font-size: 1.75rem;
        }

        .modal-film-description {
            padding: 1.25rem 2rem;
        }

        .modal-film-description p {
            font-size: 1rem;
        }

        .modal-film-footer {
            padding: 1rem 2rem;
            flex-direction: column;
            gap: 1rem;
        }

        .footer-item {
            text-align: center;
        }

        .footer-value {
            font-size: 1rem;
        }
    }

    @media (max-width: 576px) {
        .poster-card-col {
            flex: 0 0 280px;
            min-width: 280px;
            max-width: 280px;
        }

        .poster-card {
            height: 420px;
        }

        .poster-info-overlay {
            padding: 1.5rem 1.25rem 1.25rem;
        }

        .poster-title {
            font-size: 1.1rem;
        }

        .poster-description {
            font-size: 0.85rem;
        }

        .btn-read-more {
            padding: 0.55rem 1.25rem;
            font-size: 0.875rem;
        }

        .modal-film-title h2 {
            font-size: 1.5rem;
        }

        .modal-film-description {
            padding: 1rem 1.5rem;
        }

        .modal-film-description p {
            font-size: 0.95rem;
        }

        .footer-label {
            font-size: 0.75rem;
        }

        .footer-value {
            font-size: 0.9rem;
        }
    }
</style>

<div class="container-fluid p-0">
    <div class="film-poster-header">
        <div class="container-fluid">
            <div class="row align-items-center px-3 px-md-4">
                <div class="col-lg-2 col-md-3 mb-3 mb-lg-0">
                    <h2 class="section-title mb-0">Film</h2>
                </div>

                <div class="col-lg-8 col-md-6 mb-3 mb-lg-0">
                    <p class="section-description text-md-center mb-0 fs-5">
                        This section showcases films featuring talents cast through ACI, representing
                        the creative results of collaborations between casting directors and filmmakers.
                    </p>
                </div>

                <div class="col-lg-2 col-md-3 text-md-end">
                    <h2 class="section-title mb-0">Poster</h2>
                </div>
            </div>
        </div>
        <div class="container-fluid mt-5">
            <div class="poster-scroll-container">

                @foreach ($film as $item)
                    <div class="poster-card-col">
                        <div class="poster-card" data-card-id="{{ $item['id'] ?? $loop->index }}">
                            <!-- Tambahkan wrapper untuk image -->
                            <div class="poster-card-image-wrapper">
                                <img src="{{ $item['image'] }}" alt="{{ $item['Nama_Film'] }}">
                            </div>
                            <div class="poster-info-overlay">
                                <h5 class="poster-title">{{ $item['Nama_Film'] }}</h5>
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
</div>

<!-- Modals untuk setiap film -->
@foreach ($film as $item)
    <div class="modal fade" id="filmModal{{ $item['id'] ?? $loop->index }}" tabindex="-1"
        aria-labelledby="filmModalLabel{{ $item['id'] ?? $loop->index }}" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-xl-custom modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h3 class="modal-title" id="filmModalLabel{{ $item['id'] ?? $loop->index }}">Film Details</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body modal-body-custom">
                    <div class="row g-0">
                        <div class="col-md-5">
                            <img src="{{ $item['image'] }}" alt="{{ $item['Nama_Film'] }}"
                                class="modal-film-poster w-100">
                        </div>
                        <div class="col-md-7">
                            <div class="modal-film-content">

                                <div class="modal-film-title">
                                    <h2>{{ $item['Nama_Film'] }}</h2>
                                </div>
                                <div class="modal-film-description">
                                    <p>{{ $item['Deskripsi_lengkap'] ?? $item['Deskripsi_singkat'] }}</p>
                                </div>

                                <div class="modal-film-footer d-flex justify-content-between align-items-center">
                                    <div class="footer-item">
                                        <div class="footer-label">Casting Director</div>
                                        <p class="footer-value">{{ $item['nama_casting_director'] ?? 'N/A' }}</p>
                                    </div>
                                    <div class="footer-item text-end">
                                        <div class="footer-label">Read More</div>
                                        <p class="footer-value">
                                            <a href="#" class="footer-link">
                                                View Portfolio <i class="fas fa-arrow-right ms-1"></i>
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
