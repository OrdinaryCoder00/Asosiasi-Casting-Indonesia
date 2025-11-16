@props(['news'])

<style>
    .news-section {
        min-height: 250px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        color: #fff;
        /* padding: 2rem 0; */
        position: relative;
        overflow: hidden;
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
    }

    .news-btn {
        background: transparent;
        border: 2px solid white;
        color: white;
        padding: 0.75rem 2rem;
        border-radius: 8px;
        font-weight: 500;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        font-size: 1rem;
        cursor: pointer;
    }

    .news-btn:hover {
        background: white;
        color: #ee0000;
    }

    .news-container {
        padding: 0rem 1rem;
        position: relative;
        overflow: visible;
    }

    .news-content {
        padding-inline: 0.6rem;
        padding-block: 6rem;
        display: flex;
        flex-direction: column;
        gap: 2rem;
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
        /* border-radius: 12px 0 0 12px; */
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
        /* background: rgba(0, 0, 0, 0.2); */
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
        align-items: center;
        gap: 0.5rem;
    }

    .filter-group-title {
        color: white;
        font-size: 1rem;
        font-weight: 600;
        letter-spacing: 1px;
        margin-bottom: 0.75rem;
        padding: 0.75rem;
        border: 1px solid #dee2e6;
        border-radius: 18px;
        display: inline-block;
    }

    .filter-item {
        padding: 0.5rem 1rem;
        margin-bottom: 0.2.5rem;
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

    .filter-item-icon {
        width: 36px;
        height: 36px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgba(238, 0, 0, 0.15);
        border-radius: 6px;
        color: #ee0000;
        font-size: 1rem;
        flex-shrink: 0;
    }

    .filter-item.active .filter-item-icon {
        background: #ee0000;
        color: white;
    }

    .filter-item-content {
        flex: 1;
    }

    .filter-item-label {
        color: #fff;
        font-size: 0.95rem;
        font-weight: 500;
        margin: 0;
        display: block;
    }

    .filter-item-desc {
        color: rgba(255, 255, 255, 0.5);
        font-size: 0.8rem;
        margin: 0.25rem 0 0 0;
    }

    .filter-item-check {
        color: #ee0000;
        font-size: 1.1rem;
        opacity: 0;
        transition: opacity 0.2s ease;
    }

    .filter-item.active .filter-item-check {
        opacity: 1;
    }

    .main-news-card {
        height: 700px;
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
        line-height: 1.3;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
    }

    .main-news-description {
        color: rgba(255, 255, 255, 0.95);
        font-size: 1rem;
        line-height: 1.6;
        margin-bottom: 1.5rem;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .main-news-meta {
        display: flex;
        gap: 1.5rem;
        color: rgba(255, 255, 255, 0.8);
        font-size: 0.9rem;
        margin-bottom: 1.5rem;
    }

    .meta-item {
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .small-news-grid {
        max-height: 700px;
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
        height: 335px;
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
        font-size: 1.1rem;
        font-weight: 600;
        margin-bottom: 0.5rem;
        line-height: 1.3;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .small-news-meta {
        display: flex;
        gap: 1rem;
        color: rgba(255, 255, 255, 0.7);
        font-size: 0.85rem;
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

    @media (max-width: 992px) {
        .main-news-card {
            height: 500px;
            margin-bottom: 2rem;
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
    }

    @media (max-width: 768px) {
        .section-title {
            font-size: 1.8rem;
        }

        .section-description {
            font-size: 0.95rem;
        }

        .main-news-title {
            font-size: 1.5rem;
        }

        .main-news-card {
            height: 450px;
        }

        .small-news-card {
            height: 280px;
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
                                <i class="fa-solid fa-filter"></i>
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
                    <div class="container-fluid">
                        <div class="row align-items-center px-3 px-md-4 mb-4">
                            <div class="col-lg-2 col-md-3 mb-3 mb-md-0">
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
                                    <i class="fa-solid fa-filter"></i>
                                    <span>Filter</span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        @if ($mainNews)
                            <div class="col-lg-7 mb-4 mb-lg-0">
                                <div class="main-news-card">
                                    <img src="{{ $mainNews['image'] }}" alt="{{ $mainNews['title'] }}">
                                    <div class="main-news-overlay">
                                        <h3 class="main-news-title">{{ $mainNews['title'] }}</h3>
                                        <div class="main-news-meta">
                                            <div class="meta-item">
                                                <i class="far fa-calendar"></i>
                                                <span>{{ \Carbon\Carbon::parse($mainNews['created_at'])->format('d M Y') }}</span>
                                            </div>
                                            <div class="meta-item">
                                                <i class="far fa-user"></i>
                                                <span>{{ $mainNews['author'] ?? 'Admin ACI' }}</span>
                                            </div>
                                        </div>
                                        @if (isset($mainNews['description']))
                                            <p class="main-news-description">{{ $mainNews['description'] }}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endif

                        <div class="col-lg-5">
                            <div class="small-news-grid">
                                <div class="row g-3">
                                    @foreach ($otherNews as $item)
                                        <div class="col-md-6 col-12">
                                            <div class="small-news-card">
                                                <img src="{{ $item['image'] }}" alt="{{ $item['title'] }}">
                                                <div class="small-news-overlay">
                                                    <h5 class="small-news-title">{{ $item['title'] }}</h5>
                                                    <div class="small-news-meta">
                                                        <span><i class="far fa-calendar"></i>
                                                            {{ \Carbon\Carbon::parse($item['created_at'])->format('d M') }}
                                                        </span>
                                                    </div>
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
</script>
