@props(['team'])

<style>
    .scrollable-cards-container {
        display: flex;
        overflow-x: auto;
        overflow-y: hidden;
        gap: 1.5rem;
        max-height: 600px;
        -ms-overflow-style: none;
        scrollbar-width: none;
    }

    .title-ourteam {
        font-size: 2.5rem;
        font-weight: 700;
        color: white;
    }

    .subtitle-ourteam {
        font-size: 1.5rem;
        font-weight: 400;
        color: white;
    }

    .scrollable-cards-container::-webkit-scrollbar {
        display: none;
    }

    .card-col {
        flex: 0 0 320px;
        max-width: 400px;
        min-width: 400px;
    }

    .team-card {
        position: relative;
        height: 530px;
        overflow: hidden;
        cursor: pointer;
        transition: transform 0.3s ease;
    }

    .team-card-image-wrapper {
        width: 100%;
        height: 100%;
        overflow: hidden;
    }

    .team-card img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
        aspect-ratio: 1/1;
        transition: transform 0.5s ease;
        display: block;
    }

    .team-card:hover .team-card-image-wrapper img {
        transform: scale(1.1);
    }

    .card-overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background: linear-gradient(to top, rgba(0, 0, 0, 0.95) 0%, rgba(0, 0, 0, 0.7) 70%, transparent 100%);
        padding: 2rem 1.5rem 1.5rem;
        opacity: 0;
        transform: translateY(20px);
        transition: opacity 0.4s ease, transform 0.4s ease;
        pointer-events: none;
    }

    .team-card:hover .card-overlay {
        opacity: 1;
        transform: translateY(0);
        pointer-events: auto;
    }

    .team-card.modal-open:hover .team-card-image-wrapper img {
        transform: scale(1) !important;
    }

    .team-card.modal-open:hover .card-overlay {
        opacity: 0 !important;
        transform: translateY(20px) !important;
        pointer-events: none !important;
    }

    .card-overlay h5 {
        color: #fff;
        font-weight: 600;
        margin-bottom: 0.75rem;
        font-size: 1.25rem;
    }

    .card-overlay p {
        color: rgba(255, 255, 255, 0.9);
        font-size: 0.9rem;
        line-height: 1.4;
        margin-bottom: 1rem;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .btn-read-more {
        background-color: #f3f3f3;
        color: black;
        border: none;
        padding: 0.5rem 1.25rem;
        border-radius: 6px;
        font-size: 0.875rem;
        font-weight: 500;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-block;
    }

    .btn-read-more:hover {
        background-color: #c40506;
        color: white;
        transform: translateX(4px);
    }

    .header-section {
        background: linear-gradient(135deg, #ee0000 0%, #c40506 100%);
        min-height: 300px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        padding-inline: 5rem;
    }

    .our-team-btn {
        font-size: 38px;
        border: none;
        background: none;
        display: flex;
        flex-direction: row;
        align-items: center;
        cursor: pointer;
        color: white;
        gap: 1rem;
    }

    .collapse-icon {
        transition: transform 0.3s ease;
    }

    .our-team-btn[aria-expanded="false"] .collapse-icon {
        transform: rotate(180deg);
    }

    .modal-content {
        border-radius: 0 !important;
        border: none !important;
        height: 80vh;
    }

    .modal-dialog.modal-xl-custom {
        max-width: 1200px;
        margin: 0.5rem auto;
    }

    .modal-body-custom {
        padding: 0;
        max-height: 100%;
        overflow-y: hidden;
    }

    .modal-right-container {
        height: 100%;
        display: flex;
        flex-direction: column;
        padding: 0;
    }

    .modal-left-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
    }

    .modal-sticky-header {
        background-color: black;
        padding: 0.8rem 1rem;
        position: sticky;
        top: 0;
        z-index: 10;
        display: flex;
        justify-content: flex-end;
    }

    .modal-scrollable-content {
        padding: 2.5rem;
        overflow-y: auto;
        flex-grow: 1;
    }

    .modal-member-name {
        padding-bottom: 0.5rem;
        border-bottom: 2px solid #000;
        margin-bottom: 1.5rem;
        font-weight: 700;
        font-size: 40px;
    }

    .watermark-overlay {
        position: absolute;
        bottom: 15px;
        left: 15px;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        color: white;
        z-index: 5;
    }

    .portfolio-scroll-container {
        display: flex;
        overflow-x: auto;
        overflow-y: hidden;
        gap: 1rem;
        padding: 1rem 0;
        margin-bottom: 2rem;
        -ms-overflow-style: none;
        scrollbar-width: none;
        border-bottom: 1px solid #e0e0e0;
    }

    .portfolio-scroll-container::-webkit-scrollbar {
        display: none;
    }

    .portfolio-card {
        flex: 0 0 200px;
        min-width: 200px;
        border-radius: 0;
        overflow: hidden;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
    }

    .portfolio-card img {
        width: 100%;
        height: 280px;
        object-fit: cover;
    }

    /* Responsive styles untuk tablet */
    @media (max-width: 992px) {
        .header-section {
            padding-inline: 2rem;
            min-height: 250px;
        }

        .our-team-btn {
            font-size: 32px;
        }

        .modal-dialog.modal-xl-custom {
            max-width: 90%;
        }

        .modal-content {
            height: 85vh;
        }

        .modal-member-name {
            font-size: 32px;
        }

        .modal-scrollable-content {
            padding: 2rem;
        }
    }

    /* Responsive styles untuk mobile */
    @media (max-width: 768px) {
        .header-section {
            padding-inline: 1.5rem;
            min-height: auto;
            padding-top: 2rem;
            padding-bottom: 2rem;
        }

        .card-col {
            flex: 0 0 280px;
            min-width: 260px;
            max-width: 300px;
        }

        .team-card {
            height: 400px;
        }

        .our-team-btn {
            font-size: 28px;
            width: 100%;
            justify-content: center;
            padding: 0.875rem 1.5rem;
        }


        .modal-dialog.modal-xl-custom {
            max-width: 95%;
            margin: 0.5rem;
        }

        .modal-content {
            height: auto;
            max-height: 90vh;
        }

        .modal-body-custom {
            overflow-y: auto;
        }

        .modal-right-container {
            height: auto;
        }

        .modal-left-image {
            min-height: 100%;
            height: 300px;
            width: 100%;
        }

        .modal-scrollable-content {
            padding: 1.5rem;
            overflow-y: visible;
        }

        .modal-member-name {
            font-size: 28px;
            padding-bottom: 0.75rem;
            margin-bottom: 1rem;
        }

        .modal-description {
            font-size: 16px !important;
        }

        .modal-sticky-header {
            display: none;
        }



        .watermark-overlay {
            bottom: 10px;
            left: 10px;
        }

        .watermark-logo {
            width: 40px;
        }

        .watermark-text {
            font-size: 0.7rem;
        }
    }

    /* Extra small mobile */
    @media (max-width: 576px) {
        .header-section {
            padding-inline: 1rem;
        }

        .title-ourteam {
            font-size: 1.5rem;
        }

        .subtitle-ourteam {
            font-size: 1rem;
            text-align: justify;
        }

        .our-team-btn {
            font-size: 24px;
            gap: 0.75rem;
        }

        .card-col {
            flex: 0 0 260px;
            min-width: 240px;
        }

        .team-card {
            height: 350px;
        }

        .portfolio-scroll-container {
            padding: 1rem 0;
            gap: 0.75rem;
        }

        .portfolio-card {
            flex: 0 0 160px;
            min-width: 160px;
        }

        .portfolio-card img {
            height: 220px;
        }

        .modal-dialog.modal-xl-custom {
            margin: 0.25rem;
            max-width: 98%;
        }

        .modal-content {
            max-height: 95vh;
        }

        .modal-left-image {
            min-height: 250px;
            height: 250px;
        }

        .modal-scrollable-content {
            padding: 1rem;
            overflow-y: auto;
            overflow-x: hidden;
        }

        .modal-member-name {
            font-size: 24px;
        }

        .modal-description {
            font-size: 14px !important;
        }
    }
</style>

<div class="container-fluid p-0">
    <div class="header-section">
        <div class="row p-3 p-md-3">
            <div class="col-12">
                <h2 class="title-ourteam">
                    ASOSIASI CASTING INDONESIA
                </h2>
            </div>
        </div>

        <div class="row align-items-center justify-content-between p-3 pt-0 p-md-3 pt-md-0">
            <div class="col-12 col-lg-4 mb-3 mb-md-0">
                <p class="subtitle-ourteam">
                    ACI casting director & associates is a member of the Indonesian film board
                    that is certified and works globally to collaborate with filmmakers.
                </p>
            </div>

            <div class="col-12 col-md-auto text-center text-md-end d-none d-lg-block">
                <button class="our-team-btn" type="button" data-bs-toggle="collapse" data-bs-target="#teamCollapse"
                    aria-expanded="true" aria-controls="teamCollapse">
                    <i class="fas fa-chevron-up collapse-icon"></i>
                    <span>Our Team</span>
                </button>
            </div>
        </div>
    </div>

    <div class="collapse show py-5 bg-white" id="teamCollapse">

        <div class="scrollable-cards-container">
            @foreach ($team as $data)
                <div class="card-col">
                    <div class="team-card" data-card-id="{{ $data['id'] }}">
                        <div class="team-card-image-wrapper">
                            <img src="{{ $data['image'] }}" alt="{{ $data['nama'] }}">
                        </div>
                        <div class="card-overlay">
                            <h5 class="border-bottom">{{ $data['nama'] }}</h5>
                            <p>{{ $data['pengenalan_singkat'] }}</p>
                            <a href="#" class="btn-read-more" data-bs-toggle="modal"
                                data-bs-target="#teamModal{{ $data['id'] }}">
                                Read More <i class="fas fa-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</div>

<!-- Modals -->
@foreach ($team as $data)
    <div class="modal fade" id="teamModal{{ $data['id'] }}" tabindex="-1"
        aria-labelledby="teamModalLabel{{ $data['id'] }}" aria-hidden="true">

        <div class="modal-dialog modal-xl modal-xl-custom modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body modal-body-custom">
                    <div class="row g-0 h-100">
                        <div class="col-12 col-md-5 position-relative">
                            <img src="{{ $data['image'] }}" alt="{{ $data['nama'] }}" class="modal-left-image">
                        </div>

                        <div class="col-12 col-md-7 modal-right-container">
                            <div class="modal-sticky-header d-none d-md-flex">
                                <button type="button" data-bs-dismiss="modal" aria-label="Close"
                                    style="background: none; outline: none; border: none;">
                                    <img src="/img/Icon-x.png" alt="X" width="30" height="30">
                                </button>
                            </div>

                            <div class="modal-scrollable-content">
                                <h2 class="modal-member-name">{{ $data['nama'] }}</h2>

                                <div class="modal-description" style="font-size: 18px">
                                    <p>{{ $data['deskripsi_lengkap'] ?? $data['pengenalan_singkat'] }}</p>
                                </div>

                                <div class="mb-4">
                                    <div class="portfolio-scroll-container">
                                        @if (isset($data['portfolio']) && count($data['portfolio']) > 0)
                                            @foreach ($data['portfolio'] as $portfolio)
                                                <div class="portfolio-card">
                                                    <img src="{{ $portfolio['poster'] }}"
                                                        alt="{{ $portfolio['judul'] }}">
                                                </div>
                                            @endforeach
                                        @else
                                            <p class="text-muted">Belum ada portfolio tersedia.</p>
                                        @endif
                                    </div>
                                </div>

                                <div style="border-top:2px solid #000; padding-top: 10px;font-size: 18px;">
                                    @if (isset($data['proyek_selesai']) && count($data['proyek_selesai']) > 0)
                                        <p class="completed-projects-list">
                                            {{ implode(', ', $data['proyek_selesai']) }}
                                        </p>
                                    @else
                                        <p class="text-muted">Belum ada proyek yang tercatat.</p>
                                    @endif
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
        const collapseElement = document.getElementById('teamCollapse');
        const button = document.querySelector('[data-bs-target="#teamCollapse"]');
        const icon = button.querySelector('.collapse-icon');

        function updateIcon() {
            if (collapseElement.classList.contains('show')) {
                icon.classList.remove('fa-chevron-down');
                icon.classList.add('fa-chevron-up');
            } else {
                icon.classList.remove('fa-chevron-up');
                icon.classList.add('fa-chevron-down');
            }
        }

        updateIcon();
        collapseElement.addEventListener('show.bs.collapse', updateIcon);
        collapseElement.addEventListener('hide.bs.collapse', updateIcon);

        const teamCards = document.querySelectorAll('.team-card');
        const modals = document.querySelectorAll('.modal');

        modals.forEach(function(modal) {
            modal.addEventListener('show.bs.modal', function() {
                teamCards.forEach(function(card) {
                    card.classList.add('modal-open');
                });
            });

            modal.addEventListener('hidden.bs.modal', function() {
                setTimeout(function() {
                    teamCards.forEach(function(card) {
                        card.classList.remove('modal-open');
                    });
                }, 150);
            });
        });
    });
</script>
