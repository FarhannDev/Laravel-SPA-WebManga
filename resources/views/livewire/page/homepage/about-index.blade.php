@section('header')
    <header class="header-content-main">
        <div class="container-xxl hero-header">
            <div class="container px-lg-6">
                <div class="row g-5 justify-content-end align-items-center">
                    <div class="col-lg-6 text-center text-lg-start">
                        <h1 class="text-dark mb-4 animated slideInDown text-capitalize"> Zaotaku - Situs Download Volume
                            Manga
                        </h1>
                        <div class="d-flex justify-content-start">
                            <nav aria-label="breadcrumb"
                                style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('homePageIndex') }}">Beranda</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Tentang Kami</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
@endsection


<div class="container-xxl position-relative  py-md-5">
    <div class="container py-5 px-lg-5">
        <div class="row g-5 justify-content-between align-items-center">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                <h1 class="mb-5 text-dark ">Zaotaku - Situs Download Volume Manga</h1>
                <h5 class="mb-4 text-dark ">ZaOtaku merupakan situs download volume manga. Kamu bisa membaca beberapa
                    komik
                    yang kami update setiap hari secara gratis. Memiliki desain yang responsif dan modern, website
                    ini
                    adalah tempat terbaik untuk kalian yang biasa membaca satu volume lengkap.</h5>
            </div>
            <div class="col-lg-6">
                <img class="img-fluid wow zoomIn" data-wow-delay="0.5s"
                    src="{{ asset('images/logo/zaotaku-logo.png') }}">
            </div>
        </div>
    </div>
</div>
<div class="container-xxl bg-dark fact py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container py-5 px-lg-5">
        <div class="row g-4">
            <div class="col-md-6 col-lg-4 text-center wow fadeIn" data-wow-delay="0.1s">
                <i class="fa fa-book-open fa-3x text-secondary mb-3"></i>
                <h1 class="text-white mb-2" data-toggle="counter-up">{{ $count_comic }}</h1>
                <p class="text-white mb-0">Total Semua Komik</p>
            </div>
            <div class="col-md-6 col-lg-4 text-center wow fadeIn" data-wow-delay="0.3s">
                <i class="fa fa-bookmark fa-3x text-secondary mb-3"></i>
                <h1 class="text-white mb-2" data-toggle="counter-up">{{ $count_genre }}</h1>
                <p class="text-white mb-0">Total Genre Terdaftar</p>
            </div>
            <div class="col-md-6 col-lg-4 text-center wow fadeIn" data-wow-delay="0.7s">
                <i class="fa fa-globe fa-3x text-secondary mb-3"></i>
                <h1 class="text-white mb-2" data-toggle="counter-up">{{ $count_blog }}</h1>
                <p class="text-white mb-0">Total Artikel Publish</p>
            </div>
        </div>
    </div>
</div>
<div class="container-xxl py-5">
    <div class="container py-5 px-lg-5">
        <div class="wow fadeInUp" data-wow-delay="0.1s">
            <h1 class="text-center mb-5">Apa Yang Kami Berikan</h1>
        </div>
        <div class="row justify-content-center g-4">
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item d-flex flex-column text-center rounded">
                    <div class="service-icon flex-shrink-0">
                        <i class="fa fa-search fa-2x"></i>
                    </div>
                    <h5 class="mb-3">Kumpulan Komik Lengkap & Terbaru</h5>
                    <p class="m-0">Zaotaku menyediakan layanan komik terlengkap & terbaru saat ini</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item d-flex flex-column text-center rounded">
                    <div class="service-icon flex-shrink-0">
                        <i class="fa fa-bookmark fa-2x"></i>
                    </div>
                    <h5 class="mb-3">Kumpulan Genre Lengkap</h5>
                    <p class="m-0">Zaotaku menyediakan genre komik terlengkap & terbaru saat ini</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item d-flex flex-column text-center rounded">
                    <div class="service-icon flex-shrink-0">
                        <i class="fa fa-download fa-2x"></i>
                    </div>
                    <h5 class="mb-3">Unduhan File Cepat & Mudah</h5>
                    <p class="m-0">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet diam
                        sed stet lorem.</p>
                </div>
            </div>
        </div>
    </div>
</div>
