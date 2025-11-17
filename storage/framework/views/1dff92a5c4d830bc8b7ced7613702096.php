<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['team']) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['team']); ?>
<?php foreach (array_filter((['team']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<style>
    .scrollable-cards-container {
        display: flex;
        overflow-x: auto;
        overflow-y: hidden;
        padding: 2rem 1rem;
        gap: 1.5rem;
        max-height: 600px;
        -ms-overflow-style: none;
        scrollbar-width: none;
    }

    .scrollable-cards-container::-webkit-scrollbar {
        display: none;
    }

    .card-col {
        flex: 0 0 320px;
        max-width: 320px;
        min-width: 280px;
    }

    .team-card {
        position: relative;
        height: 450px;
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
        min-height: 200px;
    }

    .our-team-btn {
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
    }

    .our-team-btn:hover {
        background: white;
        color: #ee0000;
    }

    .collapse-icon {
        transition: transform 0.3s ease;
    }

    .our-team-btn[aria-expanded="false"] .collapse-icon {
        transform: rotate(180deg);
    }

    .modal-xl-custom {
        max-width: 1200px;
    }

    .modal-body-custom {
        padding: 0;
        max-height: 85vh;
        overflow-y: auto;
    }

    .modal-left-image {
        height: 100%;
        min-height: 600px;
        object-fit: cover;
        object-position: center;
    }

    .modal-right-content {
        padding: 2.5rem;
    }

    .modal-member-name {
        font-size: 2rem;
        font-weight: 700;
        color: #333;
        padding-bottom: 1rem;
        border-bottom: 2px solid #dee2e6;
        margin-bottom: 1.5rem;
    }

    .modal-description {
        font-size: 1rem;
        color: #666;
        line-height: 1.8;
        margin-bottom: 2rem;
    }

    .portfolio-scroll-container {
        display: flex;
        overflow-x: auto;
        gap: 1rem;
        padding: 1rem 0;
        margin-bottom: 2rem;
        -ms-overflow-style: none;
        scrollbar-width: thin;
        border-bottom: 2px solid #252525;
    }

    .portfolio-scroll-container::-webkit-scrollbar {
        height: 6px;
    }

    .portfolio-scroll-container::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 10px;
    }

    .portfolio-scroll-container::-webkit-scrollbar-thumb {
        background: #c40506;
        border-radius: 10px;
    }

    .portfolio-card {
        flex: 0 0 200px;
        min-width: 200px;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
    }

    .portfolio-card img {
        width: 100%;
        height: 280px;
        object-fit: cover;
    }

    .portfolio-card-title {
        padding: 0.75rem;
        background: white;
        font-size: 0.9rem;
        font-weight: 500;
        text-align: center;
        color: #333;
    }

    .completed-projects-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .completed-projects-list li {
        padding: 0.75rem 1rem;
        border-left: 3px solid #c40506;
        background: #f8f9fa;
        margin-bottom: 0.5rem;
        border-radius: 4px;
        font-size: 0.95rem;
        color: #555;
        transition: all 0.3s ease;
    }

    .completed-projects-list li:hover {
        background: #e9ecef;
        border-left-width: 5px;
    }

    .modal-body-custom .col-md-5 {
        height: 85vh;
        overflow: hidden;
    }

    .modal-body-custom .col-md-7 {
        height: 85vh;
        overflow-y: auto;
    }

    @media (max-width: 768px) {
        .modal-body-custom .col-md-5 {
            overflow: auto;
        }

        .modal-body-custom .col-md-7 {
            overflow-y: hidden;
        }

        .card-col {
            flex: 0 0 280px;
            min-width: 260px;
        }

        .team-card {
            height: 400px;
        }

        .our-team-btn {
            width: 100%;
            justify-content: center;
            padding: 0.875rem 1.5rem;
        }

        .scrollable-cards-container {
            padding: 1.5rem 1rem;
        }

        .modal-left-image {
            min-height: 400px;
        }

        .modal-right-content {
            padding: 1.5rem;
        }

        .modal-member-name {
            font-size: 1.5rem;
        }

        .portfolio-card {
            flex: 0 0 160px;
            min-width: 160px;
        }

        .portfolio-card img {
            height: 220px;
        }
    }

    @media (max-width: 576px) {
        .card-col {
            flex: 0 0 260px;
            min-width: 240px;
        }

        .team-card {
            height: 380px;
        }

        .card-overlay {
            padding: 1.5rem 1rem 1rem;
        }

        .card-overlay h5 {
            font-size: 1.1rem;
        }
    }
</style>

<div class="container-fluid p-0">
    <div class="header-section">
        <div class="container-fluid">
            <div class="row align-items-center p-3 p-md-4">
                <div class="col-lg-5 col-md-7 mb-3 mb-md-0">
                    <h2 class="text-white fw-bold mb-2 mb-md-3 fs-2 fs-md-3">ASOSIASI CASTING INDONESIA</h2>
                    <p class="text-white mb-0 pe-lg-5 fs-5 fs-md-5 ">
                        ACI casting director & associates is a member of the Indonesian film board that is certified
                        and
                        works globally to collaborate with filmmakers.
                    </p>
                </div>
                <div class="col-lg-7 col-md-5 text-md-end">
                    <button class="our-team-btn" type="button" data-bs-toggle="collapse" data-bs-target="#teamCollapse"
                        aria-expanded="true" aria-controls="teamCollapse">
                        <i class="fas fa-chevron-up collapse-icon"></i>
                        <span>Our Team</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="collapse show py-5 bg-white" id="teamCollapse">
        <div class="container-fluid">
            <div class="scrollable-cards-container">

                <?php $__currentLoopData = $team; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="card-col">
                        <div class="team-card" data-card-id="<?php echo e($data['id']); ?>">
                            <div class="team-card-image-wrapper">
                                <img src="<?php echo e($data['image']); ?>" alt="<?php echo e($data['nama']); ?>">
                            </div>
                            <div class="card-overlay">
                                <h5 class="border-bottom"><?php echo e($data['nama']); ?></h5>
                                <p><?php echo e($data['pengenalan_singkat']); ?></p>
                                <a href="#" class="btn-read-more" data-bs-toggle="modal"
                                    data-bs-target="#teamModal<?php echo e($data['id']); ?>">
                                    Read More <i class="fas fa-arrow-right ms-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
        </div>
    </div>
</div>

<!-- Modals -->
<?php $__currentLoopData = $team; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="modal fade" id="teamModal<?php echo e($data['id']); ?>" tabindex="-1"
        aria-labelledby="teamModalLabel<?php echo e($data['id']); ?>" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-xl-custom modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h3 class="modal-title" id="teamModalLabel<?php echo e($data['id']); ?>">Profile</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body modal-body-custom">
                    <div class="row g-0">
                        <div class="col-md-5">
                            <img src="<?php echo e($data['image']); ?>" alt="<?php echo e($data['nama']); ?>" class="modal-left-image w-100">
                        </div>

                        <div class="col-md-7">
                            <div class="modal-right-content">
                                <h2 class="modal-member-name"><?php echo e($data['nama']); ?></h2>

                                <div class="modal-description">
                                    <p><?php echo e($data['deskripsi_lengkap'] ?? $data['pengenalan_singkat']); ?></p>
                                </div>

                                <div class="mb-4">
                                    <div class="portfolio-scroll-container">
                                        <?php if(isset($data['portfolio']) && count($data['portfolio']) > 0): ?>
                                            <?php $__currentLoopData = $data['portfolio']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $portfolio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="portfolio-card">
                                                    <img src="<?php echo e($portfolio['poster']); ?>" alt="<?php echo e($portfolio['judul']); ?>">
                                                    <div class="portfolio-card-title"><?php echo e($portfolio['judul']); ?></div>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php else: ?>
                                            <p class="text-muted">Belum ada portfolio tersedia.</p>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div>
                                    <?php if(isset($data['proyek_selesai']) && count($data['proyek_selesai']) > 0): ?>
                                        <p class="completed-projects-list">
                                            <?php echo e(implode(', ', $data['proyek_selesai'])); ?>

                                        </p>
                                    <?php else: ?>
                                        <p class="text-muted">Belum ada proyek yang tercatat.</p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

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
<?php /**PATH C:\Users\namor\ACI\resources\views/components/home/ourteam.blade.php ENDPATH**/ ?>