<style>
    /*hero*/
    #hero {
        width: 100%;
        height: 95vh;
        background: #FFB100;
    }

    #hero .container {
        padding-top: 72px;
    }

    #hero h1 {
        margin: 0 0 10px 0;
        font-size: 48px;
        font-weight: 700;
        line-height: 56px;
        color: #fff;
    }

    #hero h2 {
        color: rgba(255, 255, 255, 0.6);
        margin-bottom: 50px;
        font-size: 24px;
    }

    #hero .btn-get-started {
        font-family: "Jost", sans-serif;
        font-weight: 500;
        font-size: 16px;
        letter-spacing: 1px;
        display: inline-block;
        padding: 10px 28px 11px 28px;
        border-radius: 50px;
        transition: 0.5s;
        margin: 10px 0 0 0;
        color: #fff;
        background: #333333;
    }

    #hero .btn-get-started:hover {
        background: #333333;
    }


    #hero .animated {
        animation: up-down 2s ease-in-out infinite alternate-reverse both;
    }

    @media (max-width: 991px) {
        #hero {
            height: 100vh;
            text-align: center;
        }

        #hero .animated {
            -webkit-animation: none;
            animation: none;
        }

        #hero .hero-img {
            text-align: center;
        }

        #hero .hero-img img {
            width: 50%;
        }
    }

    @media (max-width: 768px) {
        #hero h1 {
            font-size: 28px;
            line-height: 36px;
        }

        #hero h2 {
            font-size: 18px;
            line-height: 24px;
            margin-bottom: 30px;
        }

        #hero .hero-img img {
            width: 70%;
        }
    }

    @media (max-width: 575px) {
        #hero .hero-img img {
            width: 80%;
        }

        #hero .btn-get-started {
            font-size: 16px;
            padding: 10px 24px 11px 24px;
        }
    }

    @-webkit-keyframes up-down {
        0% {
            transform: translateY(10px);
        }

        100% {
            transform: translateY(-10px);
        }
    }

    @keyframes up-down {
        0% {
            transform: translateY(10px);
        }

        100% {
            transform: translateY(-10px);
        }
    }
    /*hero end*/
</style>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark p-3">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">Inventaris</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class=" collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto ">
                <li class="nav-item">
                    <a class="nav-link mx-2 active" aria-current="page" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-2" href="/users/login">Login</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!--hero-->
<section id="hero" class="d-flex align-items-center">

    <div class="container">
        <div class="row">
            <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
                <h1>Solusi Pencatatan Barang IC-Labs</h1>
                <h2>Mudah mencari barang, mudah selesaikan masalah!</h2>
                <div class="d-flex justify-content-center justify-content-lg-start">
                    <a href="/users/login" class="btn-get-started btn-dark scrollto">Login</a>
                </div>
            </div>
            <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
                <img src="assets/img/hero-img.png" class="img-fluid animated" alt="">
            </div>
        </div>
    </div>

</section>
<!-- End Hero -->
