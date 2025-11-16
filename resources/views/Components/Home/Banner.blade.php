<style>
    .banner {
        height: 100vh;
        overflow: hidden;
        display: flex;
        align-items: flex-end;
        position: relative;
    }

    .banner-img {
        position: absolute;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        z-index: 1;
    }

    .wrap {
        z-index: 2;
        margin-left: 2%;
        margin-bottom: 2%;
        width: 84%;
        color: white;
    }

    .title {
        font-family: 'Lemon Milk', sans-serif;
        font-size: 24vw;
        font-weight: 300;
        margin: 0;
    }

    @media (max-width: 768px) {
        .wrap {
            margin-left: 5%;
            margin-bottom: 20%;
            width: 90%;
        }

        .title {
            font-size: 8vh;
        }
    }
</style>

<div class="banner">
    <img src="/img/banner-aci.png" class="banner-img" alt="cover">
    <div class="wrap">
        <h1 class="title">ACI</h1>
    </div>
</div>
