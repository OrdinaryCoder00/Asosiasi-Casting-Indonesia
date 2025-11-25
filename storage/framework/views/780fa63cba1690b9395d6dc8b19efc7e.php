<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['variant' => 'default']) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['variant' => 'default']); ?>
<?php foreach (array_filter((['variant' => 'default']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<?php
    $isHomepage = request()->is('/');

    $bgColor = $variant === 'light' || $isHomepage ? 'bg-light' : '';
    $customBg = $variant === 'red' || !$isHomepage ? 'background-color: #ee0000;' : '';
    $textColor = $variant === 'red' || !$isHomepage ? 'text-white' : '';

    $menuItems = [
        ['label' => 'HOME', 'route' => '/', 'section' => 'home'],
        ['label' => 'OUR TEAM', 'route' => '/our-team', 'section' => 'our-team'],
        ['label' => 'POSTER', 'route' => '/poster', 'section' => 'poster'],
        ['label' => 'CASTING SUBMISSION', 'route' => '/casting-submission', 'section' => null],
        ['label' => 'NEWS', 'route' => '/news', 'section' => 'news'],
        ['label' => 'CONTACT', 'route' => '/contact', 'section' => 'contact'],
    ];
?>

<style>
    .navbar-expand-lg {
        padding-right: 5rem;
    }

    .navbar-universal {
        transition: all 0.3s ease;
    }

    /* Styling untuk homepage (putih) */
    .navbar-universal.variant-light {
        background-color: #f8f9fa;
    }

    .navbar-universal.variant-light .navbar-title-text {
        color: #333;
    }

    .navbar-universal.variant-light .nav-link {
        color: #333;
    }

    .navbar-universal.variant-light .navbar-nav .nav-link:hover {
        color: #ee0000 !important;
    }

    .navbar-universal.variant-light .navbar-nav .nav-link.active {
        color: #ee0000 !important;
        font-weight: 800;
    }

    /* Styling untuk halaman lain (merah) */
    .navbar-universal.variant-red {
        background-color: #ee0000;
    }

    .navbar-universal.variant-red .navbar-title-text {
        color: white;
    }

    .navbar-universal.variant-red .nav-link {
        color: #f1f1f1;
    }

    .navbar-universal.variant-red .navbar-nav .nav-link:hover {
        color: #ffffff !important;
    }

    .navbar-universal.variant-red .navbar-nav .nav-link:focus {
        color: #ffff !important;
        border-radius: 6px;
    }

    .navbar-universal.variant-red .navbar-nav .nav-link.active {
        color: #ffffff !important;
        font-weight: 800;
    }

    /* Common styles */
    .navbar-title-text {
        font-size: 1.1rem;
    }

    .nav-link {
        font-weight: 600;
        font-size: 0.95rem;
        text-transform: uppercase;
        padding-left: 0.5rem;
        padding-right: 0.5rem;
        transition: all 0.3s ease;
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

    /* Offcanvas styling */
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

<nav class="navbar navbar-expand-lg navbar-light navbar-universal variant-<?php echo e($isHomepage ? 'light' : 'red'); ?>"
    id="mainNavbar">
    <div class="container-fluid">
        <a class="navbar-brand d-flex align-items-center gap-2" href="/">
            <img src="/img/logo-aci.png" alt="logo-aci" width="50" height="50"
                class="d-inline-block align-text-top me-2"
                style="object-position: center; object-fit: contain; aspect-ratio: 1/1; <?php echo e(!$isHomepage ? 'filter: brightness(0) invert(1)' : ''); ?>">
            <span class="text-uppercase fw-bold navbar-title-text">ASOSIASI CASTING INDONESIA</span>
        </a>

        <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="offcanvas"
            style="border:none; outline: none;" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar"
            aria-label="Toggle navigation">
            <i class="fa-solid fa-bars <?php echo e(!$isHomepage ? 'text-white' : ''); ?>"></i>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav gap-xl-3">
                <?php $__currentLoopData = $menuItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        if ($isHomepage && $item['section']) {
                            $href = '#' . $item['section'];
                            $isActive = false;
                        } else {
                            if ($item['section'] && $item['route'] !== '/casting-submission') {
                                $href = '/#' . $item['section'];
                            } else {
                                $href = $item['route'];
                            }
                            $isActive = request()->is(trim($item['route'], '/'));
                        }

                        if ($isHomepage && $item['route'] === '/casting-submission') {
                            $isActive = true;
                        }
                    ?>
                    <li class="nav-item">
                        <a class="nav-link <?php echo e($isActive ? 'active' : ''); ?>" href="<?php echo e($href); ?>"
                            data-section="<?php echo e($item['section'] ?? ''); ?>" data-route="<?php echo e($item['route']); ?>">
                            <?php echo e($item['label']); ?>

                        </a>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
            <?php $__currentLoopData = $menuItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    if ($isHomepage && $item['section']) {
                        $href = '#' . $item['section'];
                        $isActive = false;
                    } else {
                        if ($item['section'] && $item['route'] !== '/casting-submission') {
                            $href = '/#' . $item['section'];
                        } else {
                            $href = $item['route'];
                        }
                        $isActive = request()->is(trim($item['route'], '/'));
                    }

                    if ($isHomepage && $item['route'] === '/casting-submission') {
                        $isActive = true;
                    }
                ?>
                <li class="nav-item">
                    <a class="nav-link <?php echo e($isActive ? 'active' : ''); ?>" href="<?php echo e($href); ?>"
                        data-section="<?php echo e($item['section'] ?? ''); ?>" data-route="<?php echo e($item['route']); ?>">
                        <?php echo e($item['label']); ?>

                    </a>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
</div>
<?php /**PATH C:\Users\namor\ACI\resources\views/components/navbar.blade.php ENDPATH**/ ?>