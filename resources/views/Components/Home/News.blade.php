@props(['news'])

<style>
    .news-section {
        min-height: 250px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        color: #fff;
        position: relative;
        overflow: hidden;
    }

    .news-header {
        padding-inline: 5rem;
        background: transparent;
    }

    .section-title {
        font-size: 2.5rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .section-description {
        font-size: 1.5rem;
    }

    .news-btn {
        background: transparent;
        border: 2px solid white;
        color: white;
        padding: 0.7rem 1.75rem;
        border-radius: 50px;
        font-weight: 500;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        font-size: 1rem;
        cursor: pointer;
    }

    .news-btn:hover {
        background: #ffffff56;
    }

    .news-container {
        position: relative;
        overflow: visible;
    }

    .img-filter {
        filter: brightness(0) invert(1);
        width: 20px;
        height: auto;
        aspect-ratio: 1/1;
        object-fit: contain;
    }

    .news-content {
        padding-inline: 0.6rem;
        padding-block: 5rem;
        display: flex;
        flex-direction: column;
        gap: 2rem;
    }

    .news-wrapper {
        padding-inline: 5rem;
    }

    .filter-sheet-container {
        position: relative;
    }

    .filter-sheet {
        position: absolute;
        top: 0;
        right: -350px;
        width: 320px;
        height: 100%;
        background: linear-gradient(to right, #ee0000, #cc0202);
        box-shadow: -5px 0 30px rgba(0, 0, 0, 0.3);
        transition: right 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        z-index: 100;
        overflow: hidden;
        display: flex;
        flex-direction: column;
    }

    .filter-sheet.show {
        right: 0;
    }

    .filter-sheet-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        opacity: 0;
        visibility: hidden;
        transition: all 0.4s ease;
        z-index: 99;
    }

    .filter-sheet-overlay.show {
        opacity: 1;
        visibility: visible;
    }

    .filter-sheet-header {
        padding: 1.5rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
        background: linear-gradient(to right, #ee0000, #cc0202);
        flex-shrink: 0;
    }

    .filter-sheet-header h3 {
        color: #fff;
        font-size: 1.25rem;
        font-weight: 700;
        margin: 0;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .filter-sheet-close {
        background: rgba(255, 255, 255, 0.1);
        border: none;
        color: #fff;
        font-size: 1.25rem;
        cursor: pointer;
        transition: all 0.3s ease;
        width: 32px;
        height: 32px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 6px;
    }

    .filter-sheet-content {
        padding: 1rem;
        overflow-y: auto;
        flex: 1;
        margin-inline: auto;
    }

    .filter-sheet-content::-webkit-scrollbar {
        width: 6px;
    }

    .filter-sheet-content::-webkit-scrollbar-track {
        background: rgba(255, 255, 255, 0.05);
    }

    .filter-sheet-content::-webkit-scrollbar-thumb {
        background: #ee0000;
        border-radius: 3px;
    }

    .filter-group {
        margin-bottom: 1.5rem;
        margin-inline: auto;
        display: flex;
        flex-direction: column;
        align-items: end;
        gap: 0.5rem;
    }

    .filter-group-title {
        background: transparent;
        border: 2px solid white;
        color: white;
        padding: 0.5rem 1.5rem;
        border-radius: 50px;
        font-weight: 500;
        transition: all 0.3s ease;
        align-items: center;
        gap: 0.5rem;
        font-size: 1rem;
        margin-bottom: 0.7rem;
    }

    .filter-item {
        margin-bottom: 0.5rem;
        cursor: pointer;
        transition: all 0.2s ease;
        display: flex;
        align-items: center;
        border: 2px solid transparent;
    }

    .filter-item:hover {
        border-bottom: 2px solid rgba(255, 255, 255, 0.699);
        transition: border-bottom 0.2s ease-in-out;
    }

    .filter-item.active {
        border-bottom: 2px solid rgb(255, 255, 255);
        transition: border-bottom 0.2s ease-in-out;
    }

    .filter-item-content {
        flex: 1;
    }

    .filter-item-label {
        color: #fff;
        font-size: 1.2rem;
        font-weight: 500;
        margin: 0;
        display: block;
    }

    /* News Card Styles */
    .main-news-card {
        height: 720px;
        position: relative;
        overflow: hidden;
        cursor: pointer;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .main-news-card img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        aspect-ratio: 1/1;
        transition: transform 0.5s ease;
    }

    .main-news-card:hover img {
        transform: scale(1.08);
    }

    .main-news-overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background: linear-gradient(to top, rgba(0, 0, 0, 0.95) 0%, rgba(0, 0, 0, 0.7) 70%, transparent 100%);
        padding: 2.5rem 2rem;
    }

    .main-news-title {
        color: #fff;
        font-size: 2rem;
        font-weight: 700;
        margin-bottom: 1rem;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
    }

    .main-news-description {
        color: rgba(255, 255, 255, 0.95);
        font-size: 1.5rem;
        margin-bottom: 1.5rem;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    /* Desktop Grid View */
    .small-news-grid {
        max-height: 720px;
        overflow-y: auto;
        padding-right: 0.5rem;
    }

    .small-news-grid::-webkit-scrollbar {
        width: 6px;
    }

    .small-news-grid::-webkit-scrollbar-track {
        background: rgba(255, 255, 255, 0.1);
        border-radius: 3px;
    }

    .small-news-grid::-webkit-scrollbar-thumb {
        background: #ee0000;
        border-radius: 3px;
    }

    .small-news-card {
        position: relative;
        overflow: hidden;
        cursor: pointer;
        margin-bottom: 1.5rem;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .small-news-card img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
        aspect-ratio: 1/1;
        transition: transform 0.5s ease;
    }

    .small-news-card:hover img {
        transform: scale(1.1);
    }

    .small-news-overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background: linear-gradient(to top, rgba(0, 0, 0, 0.95) 0%, rgba(0, 0, 0, 0.6) 80%, transparent 100%);
        padding: 1.5rem;
    }

    .small-news-title {
        color: #fff;
        font-size: 1.5rem;
        font-weight: 600;
        margin-bottom: 0.5rem;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    /* Modal Styles */
    .modal-content {
        border-radius: 0 !important;
        border: none !important;
        height: 70vh;
    }

    .modal-dialog.modal-xl-custom {
        max-width: 1200px;
        margin: 0.5rem auto;
    }

    .modal-body-custom {
        padding: 0;
        max-height: 100%;
        overflow: hidden;
    }

    .modal-news-content {
        display: flex;
        flex-direction: column;
        height: 100%;
        min-height: 700px;
        overflow: auto;
    }

    .modal-news-poster {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
    }

    .modal-sticky-header-news {
        background-color: black;
        padding: 0.5rem 1rem;
        position: sticky;
        top: 0;
        z-index: 11;
        display: flex;
        justify-content: flex-end;
        flex-shrink: 0;
    }

    .modal-sticky-header-news button {
        background: none;
        outline: none;
        border: none;
        cursor: pointer;
        transition: transform 0.2s ease;
    }

    .modal-sticky-header-news button:hover {
        transform: scale(1.1);
    }

    .modal-news-title {
        flex-shrink: 0;
        margin: 2.5rem 3rem 0.5rem;
        background: #fff;
        border-bottom: 2px solid #000;
        z-index: 1;
    }

    .modal-news-title h2 {
        font-size: 40px;
        font-weight: 700;
        margin: 0;
    }

    .modal-news-description {
        max-height: 35%;
        overflow-y: auto;
        margin: 1.5rem 3rem;
        font-size: 18px;
    }

    .modal-news-description::-webkit-scrollbar {
        width: 8px;
    }

    .modal-news-description::-webkit-scrollbar-track {
        background: #f1f1f1;
    }

    .modal-news-description::-webkit-scrollbar-thumb {
        background: #888;
        border-radius: 4px;
    }

    .modal-news-description::-webkit-scrollbar-thumb:hover {
        background: #555;
    }

    .modal-news-footer {
        position: sticky;
        bottom: 0;
        flex-shrink: 0;
        margin: 1.5rem 3rem;
        padding-top: 1.5rem;
        background: #fff;
        border-top: 2px solid #333;
        box-shadow: 0 -2px 8px rgba(0, 0, 0, 0.05);
        z-index: 11;
    }

    .modal-news-meta {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 1rem;
    }

    .meta-item {
        display: flex;
        flex-direction: column;
    }

    .meta-label {
        font-size: 0.875rem;
        color: #666;
        margin-bottom: 0.25rem;
    }

    .meta-value {
        font-size: 1rem;
        font-weight: 600;
        color: #000;
        margin: 0;
    }

    /* Responsive Styles */
    @media (max-width: 992px) {
        .main-news-card {
            height: 500px;
            margin-bottom: 0.25rem;
        }

        .small-news-grid {
            max-height: none;
            overflow-y: visible;
        }

        .small-news-card {
            height: 300px;
        }

        .filter-sheet {
            width: 280px;
            right: -280px;
        }

        .modal-news-content {
            min-height: 600px;
        }

        .modal-news-title h2 {
            font-size: 32px;
        }

        .modal-news-description {
            font-size: 16px;
        }

    }

    @media (max-width: 768px) {
        .news-header {
            padding-inline: 2rem;
        }

        .news-wrapper {
            padding-inline: 2rem;
        }

        .section-title {
            font-size: 1.8rem;
        }

        .section-description {
            font-size: 1rem;
        }

        .main-news-overlay {
            padding: 1.5rem;
        }

        .main-news-title {
            font-size: 1.5rem;
            font-weight: 600;
            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
        }

        .main-news-description {
            font-size: 1rem;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .main-news-card {
            height: 320px;
        }

        /* CAROUSEL MODE - Mobile */
        .small-news-grid {
            max-height: none;
            overflow-y: visible;
            overflow-x: auto;
            padding-right: 0;
            -webkit-overflow-scrolling: touch;
            scroll-snap-type: x mandatory;
            scrollbar-width: none;
            -ms-overflow-style: none;
        }

        .small-news-grid::-webkit-scrollbar {
            display: none;
        }

        .small-news-grid .row {
            display: flex;
            flex-wrap: nowrap;
            gap: 1rem;
            margin: 0;
        }

        .small-news-grid .row>div {
            flex: 0 0 85%;
            max-width: 85%;
            padding: 0;
            scroll-snap-align: start;
        }

        .small-news-card {
            height: 320px;
            margin-bottom: 0;
        }

        .filter-sheet {
            position: absolute;
            top: 0;
            right: -100%;
            width: 50%;
            height: fit-content;
            border-radius: 0;
            z-index: 100;
            border-radius: 12px 0 0 12px;
        }

        .filter-sheet.show {
            right: 0;
        }

        .filter-sheet-overlay {
            position: fixed;
            border-radius: 0;
            z-index: 100;
        }

        .filter-sheet-header {
            display: none;
        }

        /* Modal Responsive */
        .modal-dialog.modal-xl-custom {
            margin: 1rem;
            max-width: 95%;
        }

        .modal-content {
            height: auto;
            max-height: 90vh;
            display: flex;
            flex-direction: column;
        }

        .modal-body-custom {
            overflow-y: auto;
            flex: 1;
        }

        .modal-news-content {
            min-height: auto;
            flex: 1;
        }

        .modal-news-poster {
            height: 250px;
            object-fit: cover;
        }

        .modal-news-title {
            margin: 1.5rem 1.5rem 0.5rem;
        }

        .modal-news-title h2 {
            font-size: 24px;
        }

        .modal-news-description {
            margin: 1rem 1.5rem;
            font-size: 14px;
            max-height: none;
            flex: 1;
            overflow-y: auto;
        }

        .modal-news-footer {
            margin: 1rem 1.5rem;
            padding-bottom: 1rem;
        }

        .modal-news-meta {
            flex-direction: column;
            align-items: flex-start;
        }

        .modal-sticky-header-news {
            display: none;
        }
    }

    @media (max-width: 576px) {

        .news-section {
            padding-inline: 0.7rem;
        }

        .news-header {
            padding-inline: 0.7rem;
        }

        .news-content {
            padding-block: 2rem;
        }

        .section-title {
            font-size: 1.5rem;
        }

        .filter-sheet-content {
            padding: 0rem;
            padding-top: 2rem;
        }

        .news-wrapper {
            padding-inline: 1rem;
        }

        .news-btn {
            border: 1px solid white;
            border-radius: 50px;
            font-weight: 500;
            font-size: 15px;
            cursor: pointer;
            padding-inline: 12px;
            padding-block: 2px;
            gap: 4px;
            width: 80px;
            justify-content: center;
        }

        .img-filter {
            width: 14px;
            height: 14px;
        }

        /* CAROUSEL - Smaller cards on extra small screens */
        .small-news-grid .row>div {
            flex: 0 0 90%;
            max-width: 90%;
        }

        .small-news-card {
            height: 280px;
        }

        .modal-news-poster {
            height: 200px;
        }

        .modal-news-description {
            margin: 1rem 1.5rem;
            padding-bottom: 2rem;
        }

        .modal-news-footer {
            padding-bottom: 1.5rem;
        }
    }
</style>

@php
    $mainNews = $news[0] ?? null;
    $otherNews = array_slice($news, 1);
@endphp

<div class="container-fluid p-0">
    <div class="news-section">
        <div class="news-container">
            <div class="filter-sheet-container">
                <div class="filter-sheet-overlay" id="filterOverlay" onclick="toggleFilter()"></div>

                <div class="filter-sheet" id="filterSheet">
                    <div class="filter-sheet-header">
                        <button class="filter-sheet-close" onclick="toggleFilter()">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>

                    <div class="filter-sheet-content">
                        <div class="filter-group">
                            <div class="filter-group-title">
                                <img src="/svg/filter.svg" alt="icon-filter" class="img-filter">
                                filter
                            </div>

                            <div class="filter-item" onclick="filterNews('latest', this)">
                                <div class="filter-item-content">
                                    <div class="filter-item-label">Latest News</div>
                                </div>
                            </div>

                            <div class="filter-item" onclick="filterNews('announcements', this)">
                                <div class="filter-item-content">
                                    <div class="filter-item-label">Announcements</div>
                                </div>
                            </div>

                            <div class="filter-item" onclick="filterNews('highlight', this)">
                                <div class="filter-item-content">
                                    <div class="filter-item-label">Highlight News</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="news-content">
                    <div class="news-header d-lg-block d-none">
                        <div class="row align-items-center mb-lg-4">
                            <div class="col-lg-2 col-md-3 mb-3 mb-md-0 title-news">
                                <h2 class="section-title mb-0">News</h2>
                            </div>

                            <div class="col-lg-8 col-md-6 mb-3 mb-md-0">
                                <p class="section-description mb-0 text-md-center">
                                    Featuring the latest news, updates, and collaborations from ACI
                                    capturing movements and moments within the Indonesian film industry
                                </p>
                            </div>

                            <div class="col-lg-2 col-md-3 text-md-end">
                                <button class="news-btn" type="button" onclick="toggleFilter()">
                                    <img src="/svg/filter.svg" alt="icon-filter" class="img-filter">
                                    <span>Filter</span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="news-header d-block d-lg-none">
                        <div class="row align-items-center mb-4">
                            <div class="d-flex justify-content-between align-items-center py-2">
                                <h2 class="section-title mb-0">News</h2>
                                <button class="news-btn" type="button" onclick="toggleFilter()">
                                    <img src="/svg/filter.svg" alt="icon-filter" class="img-filter">
                                    <span>Filter</span>
                                </button>
                            </div>

                            <div class="mt-2">
                                <p class="section-description mb-0" style="text-align: justify;">
                                    Featuring the latest news, updates, and collaborations from ACI
                                    capturing movements and moments within the Indonesian film industry
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="row news-wrapper">
                        @if ($mainNews)
                            <div class="col-lg-5  mb-lg-0">
                                <div class="main-news-card" data-bs-toggle="modal"
                                    data-bs-target="#newsModal{{ $mainNews['id'] ?? 0 }}">
                                    <img src="{{ $mainNews['image'] }}" alt="{{ $mainNews['title'] }}">
                                    <div class="main-news-overlay">
                                        <h3 class="main-news-title text-uppercase">{{ $mainNews['title'] }}</h3>
                                        @if (isset($mainNews['description']))
                                            <p class="main-news-description">{{ $mainNews['description'] }}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endif

                        <div class="col-lg-7">
                            <div class="small-news-grid">
                                <div class="row g-3">
                                    @foreach ($otherNews as $item)
                                        <div class="col-md-6 col-12">
                                            <div class="small-news-card" data-bs-toggle="modal"
                                                data-bs-target="#newsModal{{ $item['id'] ?? $loop->index + 1 }}">
                                                <img src="{{ $item['image'] }}" alt="{{ $item['title'] }}">
                                                <div class="small-news-overlay">
                                                    <h5 class="small-news-title text-uppercase">{{ $item['title'] }}
                                                    </h5>
                                                    <span
                                                        style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                                                        {{ $item['description'] }}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@foreach ($news as $item)
    <div class="modal fade" id="newsModal{{ $item['id'] ?? $loop->index }}" tabindex="-1"
        aria-labelledby="newsModalLabel{{ $item['id'] ?? $loop->index }}" aria-hidden="true">

        <div class="modal-dialog modal-xl modal-xl-custom modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body modal-body-custom">
                    <div class="modal-sticky-header d-flex d-lg-none">
                        <button type="button" data-bs-dismiss="modal" aria-label="Close"
                            style="background: none; outline: none; border: none;">
                            <img src="/img/Icon-x.png" alt="X" width="30" height="30">
                        </button>
                    </div>
                    <div class="row g-0 h-100">

                        <div class="col-md-5">
                            <img src="{{ $item['image'] ?? 'https://via.placeholder.com/400x600' }}"
                                alt="{{ $item['title'] }}" class="modal-news-poster">
                        </div>

                        <div class="col-md-7">
                            <div class="modal-news-content">

                                <div class="modal-sticky-header-news">
                                    <button type="button" data-bs-dismiss="modal" aria-label="Close">
                                        <img src="/img/Icon-x.png" alt="Close" width="30" height="30">
                                    </button>
                                </div>

                                <div class="modal-news-title">
                                    <h2>{{ $item['title'] ?? 'No title available.' }}</h2>
                                </div>

                                <div class="modal-news-description">
                                    <p>{{ $item['description'] ?? 'No description available.' }}</p>

                                    @if (isset($item['content']))
                                        <p>{{ $item['content'] }}</p>
                                    @endif
                                </div>

                                <div class="modal-news-footer">
                                    <div class="modal-news-meta">
                                        <div class="meta-item">
                                            <span class="meta-label">Published By</span>
                                            <p class="meta-value">
                                                {{ $item['published_by'] ?? 'Unknown' }}
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
    </div>
@endforeach

<script>
    function toggleFilter() {
        const filterSheet = document.getElementById('filterSheet');
        const filterOverlay = document.getElementById('filterOverlay');

        filterSheet.classList.toggle('show');
        filterOverlay.classList.toggle('show');
    }

    function filterNews(type, element) {
        console.log('Filter selected:', type);

        document.querySelectorAll('.filter-item').forEach(item => {
            item.classList.remove('active');
        });

        element.classList.add('active');
    }

    // Mobile carousel snap effect enhancement
    document.addEventListener('DOMContentLoaded', function() {
        const newsGrid = document.querySelector('.small-news-grid');

        if (newsGrid && window.innerWidth <= 768) {
            // Add smooth scrolling behavior
            newsGrid.style.scrollBehavior = 'smooth';

            // Optional: Add scroll indicators
            const cards = newsGrid.querySelectorAll('.small-news-card');
            let currentIndex = 0;

            // You can add swipe gesture detection here if needed
            let touchStartX = 0;
            let touchEndX = 0;

            newsGrid.addEventListener('touchstart', function(e) {
                touchStartX = e.changedTouches[0].screenX;
            }, {
                passive: true
            });

            newsGrid.addEventListener('touchend', function(e) {
                touchEndX = e.changedTouches[0].screenX;
                handleSwipe();
            }, {
                passive: true
            });

            function handleSwipe() {
                const swipeThreshold = 50;
                const diff = touchStartX - touchEndX;

                if (Math.abs(diff) > swipeThreshold) {
                    if (diff > 0 && currentIndex < cards.length - 1) {
                        // Swipe left
                        currentIndex++;
                    } else if (diff < 0 && currentIndex > 0) {
                        // Swipe right
                        currentIndex--;
                    }
                }
            }
        }
    });
</script>
