<style>
    .banner {
        height: 94vh;
        min-height: 400px;
        overflow: hidden;
        display: flex;
        align-items: flex-end;
        position: relative;
        padding: 0 5rem 2rem 5rem;
    }

    .banner-img {
        position: absolute;
        bottom: 0;
        left: 3%;
        width: 100%;
        height: 110%;
        object-fit: contain;
        object-position: bottom;
        z-index: 1;
    }

    .wrap {
        position: absolute;
        bottom: 0;
        left: 4vw;
        z-index: 2;
        color: white;
        padding: 0px;
        width: 100%;
    }

    .title {
        font-family: 'Lemon Milk', sans-serif;
        font-size: clamp(5rem, 22vw, 24rem);
        font-weight: 500;
        margin: 0;
        /* line-height: 1; */
        text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.3);
        padding-left: 1rem;
    }

    @media (max-width: 1024px) {
        .banner {
            padding: 0 3rem 2rem 3rem;
            height: 70vh;
        }

        .title {
            font-size: clamp(3rem, 15vw, 12rem);
        }
    }

    /* Mobile */
    @media (max-width: 768px) {
        .banner {
            height: 60vh;
            min-height: 350px;
            padding: 0 2rem 1.5rem 2rem;
        }

        .banner-img {
            object-fit: contain;
            object-position: bottom;
            left: 0%;
        }

        .wrap {
            position: absolute;
            bottom: 0;
            left: 4vw;
            z-index: 2;
            color: white;
            padding: 0px;
            width: 100%;
        }

        .title {
            font-size: clamp(2.5rem, 12vw, 8rem);
        }
    }

    /* Small Mobile */
    @media (max-width: 480px) {
        .banner {
            height: 00vh;
        }

        .title {
            /* font-size: clamp(2rem, 10vw, 6rem); */
            font-size: 5.5rem;
        }
    }
</style>

<div class="banner">
    <img src="/img/banner-aci.png" class="banner-img" alt="cover">
    <div class="wrap">
        <h1 class="title">ACI</h1>
    </div>
</div>
