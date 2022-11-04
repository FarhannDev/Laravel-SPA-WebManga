@section('header')
    <header class="header-content-main">
        <div class="container-xxl bg-primary hero-header">
            <div class="container px-lg-6">
                <div class="row g-5 justify-content-end align-content-center">
                    <div class="col-lg-6 text-center text-lg-start">
                        <h1 class="text-dark mb-4 animated slideInDown">Halo, Selamat datang di <span class="">
                                Zaotaku - Situs Download Komik Volume Manga</span></h1>
                        <a href="{{ route('komikIndex') }}"
                            class="btn btn-secondary py-sm-3 px-sm-5 rounded-pill me-3 animated slideInLeft">Temukan
                            Daftar
                            Komik</a>
                        <a href="#main-content"
                            class="btn btn-light py-sm-3 px-sm-5 rounded-pill animated slideInRight">Jelajahi

                            Sekarang</a>
                    </div>
                </div>
            </div>
        </div>
    </header>
@endsection
<div class="container-xxl py-5" id="service">
    <div class="container py-5 px-lg-5">
        <div class="wow fadeInUp" data-wow-delay="0.1s">
            <h1 class="text-center mb-5">Pelayanan yang kami berikan</h1>
        </div>
        <div class="row g-4">
            <div class="owl-carousel">

                <div class="feature-item bg-light rounded text-center p-4 mx-2">
                    <i class="fa fa-3x fa-mail-bulk text-primary mb-4"></i>
                    <h5 class="mb-3">Digital Marketing</h5>
                    <p class="m-0">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam
                        stet diam sed stet lorem.</p>
                </div>
                <div class="feature-item bg-light rounded text-center p-4 mx-2">
                    <i class="fa fa-3x fa-mail-bulk text-primary mb-4"></i>
                    <h5 class="mb-3">Digital Marketing</h5>
                    <p class="m-0">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam
                        stet diam sed stet lorem.</p>
                </div>
                <div class="feature-item bg-light rounded text-center p-4 mx-2">
                    <i class="fa fa-3x fa-mail-bulk text-primary mb-4"></i>
                    <h5 class="mb-3">Digital Marketing</h5>
                    <p class="m-0">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam
                        stet diam sed stet lorem.</p>
                </div>
                <div class="feature-item bg-light rounded text-center p-4 mx-2">
                    <i class="fa fa-3x fa-mail-bulk text-primary mb-4"></i>
                    <h5 class="mb-3">Digital Marketing</h5>
                    <p class="m-0">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam
                        stet diam sed stet lorem.</p>
                </div>
                <div class="feature-item bg-light rounded text-center p-4 mx-2">
                    <i class="fa fa-3x fa-mail-bulk text-primary mb-4"></i>
                    <h5 class="mb-3">Digital Marketing</h5>
                    <p class="m-0">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam
                        stet diam sed stet lorem.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container py-5 px-lg-5">
    <div class="d-flex justify-content-center mb-3">
        <div class="kategori">
            <div class="kategori-title">
                <h3>Kumpulan Genre Lengkap & Terupdate</h3>
            </div>
        </div>
    </div>
    <div class="row justify-content-center g-4">
        @foreach ($genres as $genre)
            <div class="col-lg-3 col-md-4 wow fadeInUp" data-wow-delay="0.1s">
                <div class="feature-item bg-light rounded text-center p-4">
                    <a href="{{ route('genreShow', $genre->genre_slug) }}">
                        <i class="fa fa-3x fa-bookmark text-primary mb-4"></i>
                        <h5 class="mb-3"><a href="{{ route('genreShow', $genre->genre_slug) }}" class="text-dark">
                                {{ $genre->genre_name }}
                            </a></h5>
                    </a>
                </div>

            </div>
        @endforeach
    </div>
</div>

<div class="container py-5 px-lg-5">
    <div class="latest-comic-wrapper mb-5">
        <div class="d-flex justify-content-between align-cotent-center">
            <div class="latest-title">
                {{-- <div class="wow fadeInUp" data-wow-delay="0.1s"> --}}
                <h3 class="text-center mb-5">Komik Paling Terbaru Dari Kami</h3>
                {{-- </div> --}}
            </div>
            <div class="latest-action__details">
                <a href="{{ route('komikLatest') }}" class="ls-base text-dark">Lihat Semua</a> <span
                    class="fas fa-arrow-right"></span>
            </div>
        </div>

        <div class="row justify-content-arround g-4 portfolio-container">

            @foreach ($comics as $comic)
                <div class="col-lg-4 col-md-6 portfolio-item first wow fadeInUp" data-wow-delay="0.1s">
                    <div class="rounded overflow-hidden ">
                        <div class="position-relative overflow-hidden">
                            <a href="{{ route('komikShow', $comic->comic_slug) }}">
                                <img class="img-fluid w-100" src="{{ asset('images/' . $comic->comic_cover) }}"
                                    style="height: 450px;">
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
    <div class="populer-comic-wrapper">
        <div class="d-flex justify-content-between align-cotent-center">
            <div class="latest-title">
                {{-- <div class="wow fadeInUp" data-wow-delay="0.1s"> --}}
                <h3 class="text-center mb-5">Komik Paling Banyak Di Cari </h3>
                {{-- </div> --}}
            </div>
            <div class="latest-action__details">
                <a href="{{ route('komikPopuler') }}" class="ls-base text-dark">Lihat Semua</a> <span
                    class="fas fa-arrow-right"></span>
            </div>
        </div>
        <div class="row justify-content-arround g-4 portfolio-container">
            @foreach ($comics as $comic)
                <div class="col-lg-4 col-md-6 portfolio-item first wow fadeInUp" data-wow-delay="0.1s">
                    <div class="rounded overflow-hidden ">
                        <div class="position-relative overflow-hidden">
                            <a href="{{ route('komikShow', $comic->comic_slug) }}">
                                <img class="img-fluid w-100" src="{{ asset('images/' . $comic->comic_cover) }}"
                                    style="height: 450px;">
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<div class="container-xxl newsletter py-5 wow fadeInUp" data-wow-delay="0.1s" style="background: #f1f1f1 !important;">
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
                        src="{{ asset('assets/img/testimonial-1.jpg') }}" style="width: 65px; height: 65px;">
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
                        src="{{ asset('assets/img/testimonial-2.jpg') }}" style="width: 65px; height: 65px;">
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
                        src="{{ asset('assets/img/testimonial-3.jpg') }}" style="width: 65px; height: 65px;">
                    <div class="ps-4">
                        <h5 class="mb-1">Client Name</h5>
                        <span>Profession</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container py-5 px-lg-5">
    <div class="row justify-content-center mb-3">
        <div class="col-12">
            <h3 class="blog-title text-dark text-center">
                Baca Berita Terkini
            </h3>
        </div>
    </div>
    <div class="row justify-content-arround align-content-center">
        <div class="col-lg-4 col-md-6">
            <div class="card mb-3">
                <a href="#">
                    <img class="card-img-top"
                        src="https://images.unsplash.com/photo-1535025639604-9a804c092faa?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=6cb0ceb620f241feb2f859e273634393&auto=format&fit=crop&w=500&q=80"
                        alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Lorem ipsum dolor sit amet.</h5>
                        <p class="card-text text-dark">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab accusantium ad alias, aliquid
                            amet aspernatur atque culpa cum debitis dicta doloremque, dolorum ea eos et excepturi
                            explicabo facilis harum illo impedit incidunt laborum laudantium...
                        </p>
                        <p class="card-text">
                        <div class="d-flex">
                            <small class="text-muted">
                                <i class="far fa-user "> Farhan </i> <br />
                                <i class="fas fa-calendar-alt"> 8 Hours Ago</i>
                            </small>
                        </div>

                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="card mb-3">
                <a href="#">
                    <img class="card-img-top"
                        src="https://images.unsplash.com/photo-1535025639604-9a804c092faa?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=6cb0ceb620f241feb2f859e273634393&auto=format&fit=crop&w=500&q=80"
                        alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Lorem ipsum dolor sit amet.</h5>
                        <p class="card-text text-dark">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab accusantium ad alias, aliquid
                            amet aspernatur atque culpa cum debitis dicta doloremque, dolorum ea eos et excepturi
                            explicabo facilis harum illo impedit incidunt laborum laudantium...
                        </p>
                        <p class="card-text">
                        <div class="d-flex">
                            <small class="text-muted">
                                <i class="far fa-user "> Farhan </i> <br />
                                <i class="fas fa-calendar-alt"> 8 Hours Ago</i>
                            </small>
                        </div>

                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="card mb-3">
                <a href="#">
                    <img class="card-img-top"
                        src="https://images.unsplash.com/photo-1535025639604-9a804c092faa?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=6cb0ceb620f241feb2f859e273634393&auto=format&fit=crop&w=500&q=80"
                        alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Lorem ipsum dolor sit amet.</h5>
                        <p class="card-text text-dark">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab accusantium ad alias, aliquid
                            amet aspernatur atque culpa cum debitis dicta doloremque, dolorum ea eos et excepturi
                            explicabo facilis harum illo impedit incidunt laborum laudantium...
                        </p>
                        <p class="card-text">
                        <div class="d-flex">
                            <small class="text-muted">
                                <i class="far fa-user "> Farhan </i> <br />
                                <i class="fas fa-calendar-alt"> 8 Hours Ago</i>
                            </small>
                        </div>

                    </div>
                </a>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-center pt-3">
        <a href="{{ route('blogIndex') }}" class="ls-base rounded-pill btn btn-primary">Baca Semua Berita</a>
    </div>
</div>


@push('javascript')
    <script>
        $(document).ready(function() {
            $(".owl-carousel").owlCarousel();
        });
    </script>
@endpush
