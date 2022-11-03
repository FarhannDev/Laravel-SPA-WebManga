@include('layouts.homepage.navbar')
<div class="container-xxl position-relative p-0">
    <div class="container-xxl bg-primary hero-header">
        <div class="container px-lg-6">
            <div class="row g-5 justify-content-end align-content-center">
                <div class="col-lg-6 text-center text-lg-start">
                    <h1 class="text-dark mb-4 animated slideInDown">Halo, Selamat datang di <span class="">
                            Zaotaku - Situs Download Komik Manga</span></h1>
                    <a href="{{ route('komikIndex') }}"
                        class="btn btn-secondary py-sm-3 px-sm-5 rounded-pill me-3 animated slideInLeft">Temukan
                        Daftar
                        Komik</a>
                    <a href="" class="btn btn-light py-sm-3 px-sm-5 rounded-pill animated slideInRight">Bergabung
                        Sekarang</a>
                </div>
            </div>
        </div>
    </div>
    <div class="container py-5 px-lg-5">
        <div class="d-flex justify-content-center mb-3">
            <div class="kategori">
                <div class="kategori-title">
                    <h3>Semua Daftar Genre</h3>
                </div>
            </div>
        </div>
        <div class="row g-4">

            @foreach ($genres as $genre)
                <div class="col-lg-3 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="feature-item bg-light rounded text-center p-4">
                        <i class="fa fa-3x fa-bookmark text-primary mb-4"></i>
                        <h5 class="mb-3"><a href="" class="text-dark">
                                {{ $genre->genre_name }}
                            </a></h5>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="container py-5 px-lg-5">
        <div class="d-flex justify-content-between align-cotent-center">
            <div class="latest-title">
                {{-- <div class="wow fadeInUp" data-wow-delay="0.1s"> --}}
                <h3 class="text-center mb-5">Komik Terbaru Dari Kami</h3>
                {{-- </div> --}}
            </div>
            <div class="latest-action__details">
                <a href="" class="ls-base text-dark">Lihat Detail</a> <span class="fas fa-arrow-right"></span>
            </div>
        </div>

        <div class="row justify-content-arround g-4 portfolio-container">

            @foreach ($comics as $comic)
                <div class="col-lg-4 col-md-6 portfolio-item first wow fadeInUp" data-wow-delay="0.1s">
                    <div class="rounded overflow-hidden">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="{{ secure_asset('images/' . $comic->comic_cover) }}"
                                style="height: 350px;">
                        </div>
                        <div class="bg-light p-4">
                            <div class="d-flex flex-wrap justify-content-end align-items-center mb-3">
                                <a href=""
                                    class="ls-base btn btn-primary btn-sm rounded-pill mx-2">{{ $comic->genre['genre_name'] }}</a>
                                <a href="" class="ls-base btn btn-primary btn-sm rounded-pill">ongoing</a>
                            </div>
                            <h5 class="lh-base mb-0">{{ $comic->comic_title }}</h5>

                            <a href="" class="ls-base btn btn-primary w-100 d-block mt-3">Details <span
                                    class="fas fa-arrow-right"></span></a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
    <div class="container-xxl newsletter py-5 wow fadeInUp" data-wow-delay="0.1s"
        style="background: #f1f1f1 !important;">
        <div class="container py-5 px-lg-5">
            <div class="row justify-content-center">
                <div class="col-lg-7 text-center">
                    <h1 class="text-center text-dark  mb-4">Tetap Selalu Terhubung</h1>
                    <p class="text-dark  mb-4">Mohon masukan alamat email dengan benar, agar bisa terhubung dengan
                        kami
                    </p>
                    <div class="position-relative w-100 mt-3">
                        <input class="form-control border-0 rounded-pill w-100 ps-4 pe-5" type="text"
                            placeholder="Enter Your Email" style="height: 48px;">
                        <button type="button" class="btn shadow-none position-absolute top-0 end-0 mt-1 me-2"><i
                                class="fa fa-paper-plane text-primary fs-4"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="container py-5 px-lg-5">
            <h1 class="text-center mb-5">Apa Kata Mereka</h1>
            <div class="owl-carousel testimonial-carousel">
                <div class="testimonial-item bg-light rounded my-4">
                    <p class="fs-5"><i class="fa fa-quote-left fa-4x text-primary mt-n4 me-3"></i>Diam dolor diam
                        ipsum
                        sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit sed stet lorem sit clita duo
                        justo.</p>
                    <div class="d-flex align-items-center">
                        <img class="img-fluid flex-shrink-0 rounded-circle"
                            src="{{ secure_asset('assets/img/testimonial-1.jpg') }}" style="width: 65px; height: 65px;">
                        <div class="ps-4">
                            <h5 class="mb-1">Client Name</h5>
                            <span>Profession</span>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item bg-light rounded my-4">
                    <p class="fs-5"><i class="fa fa-quote-left fa-4x text-primary mt-n4 me-3"></i>Diam dolor diam
                        ipsum
                        sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit sed stet lorem sit clita duo
                        justo.</p>
                    <div class="d-flex align-items-center">
                        <img class="img-fluid flex-shrink-0 rounded-circle"
                            src="{{ secure_asset('assets/img/testimonial-2.jpg') }}" style="width: 65px; height: 65px;">
                        <div class="ps-4">
                            <h5 class="mb-1">Client Name</h5>
                            <span>Profession</span>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item bg-light rounded my-4">
                    <p class="fs-5"><i class="fa fa-quote-left fa-4x text-primary mt-n4 me-3"></i>Diam dolor diam
                        ipsum
                        sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit sed stet lorem sit clita duo
                        justo.</p>
                    <div class="d-flex align-items-center">
                        <img class="img-fluid flex-shrink-0 rounded-circle"
                            src="{{ secure_asset('assets/img/testimonial-3.jpg') }}" style="width: 65px; height: 65px;">
                        <div class="ps-4">
                            <h5 class="mb-1">Client Name</h5>
                            <span>Profession</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
