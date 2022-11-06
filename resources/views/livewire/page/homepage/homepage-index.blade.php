@section('header')
    <header class="header-content-main">
        <div class="container-xxl hero-header"
            style="background-image: url('https://wallpapercrafter.com/desktop/125334-Hyouka-Chitanda-Eru-white-background-anime-anime-girls-Oreki-Houtarou.png'); background-position: center; min-height: 100vh;  background-size: cover;">
            <div class="container px-lg-6">
                <div class="row g-5 justify-content-end align-content-center">
                    <div class="col-lg-6 text-center text-lg-start">
                        <h1 class="text-dark mb-4 animated slideInDown">Halo, Selamat datang di <span class="">
                                Zaotaku - Situs Download Komik Volume Manga</span></h1>
                        <a href="{{ route('komikIndex') }}"
                            class="btn btn-secondary py-sm-3 px-sm-5 rounded-pill me-3 animated slideInLeft">Temukan
                            Semua Komik</a>
                        <a href="#main-content"
                            class="btn btn-light py-sm-3 px-sm-5 rounded-pill animated slideInRight">Jelajahi

                            Sekarang</a>
                    </div>
                </div>
            </div>
        </div>
    </header>
@endsection

<div class="container-xxl  position-relative p-0 py-5" id="main-content">
    <div class="container py-5 px-lg-5">
        <div class="latest-comic-wrapper mb-5">
            <div class="d-flex justify-content-between align-cotent-center">
                <div class="latest-title">
                    {{-- <div class="wow fadeInUp" data-wow-delay="0.1s"> --}}
                    <h3 class="text-center mb-5">Komik Sedang Populer</h3>
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
                        <div class="rounded overflow-hidden">
                            <div class="comic-inner">
                                <div class="comic-inner__image">
                                    <div class="position-relative overflow-hidden ">
                                        <a href="{{ route('komikShow', $comic->comic_slug) }}">
                                            <img class="img-fluid w-100 rounded"
                                                src="{{ asset($comic->comic_cover ? 'images/komik/' . $comic->comic_cover : 'images/default-komik.jpg') }}"
                                                style="height: 450px;">
                                        </a>
                                    </div>
                                </div>

                                <div class="comic-inner mb-3">
                                    <div class="comic-inner__text px-2 pt-2 mb-3">
                                        <a href="{{ route('komikShow', $comic->comic_slug) }}" class="text-dark">
                                            <h4 class="text-dark text-capitalize col-lg-auto">
                                                {!! \Illuminate\Support\Str::limit($comic->comic_title ?? '', 50, ' ...') !!}
                                            </h4>
                                        </a>
                                    </div>
                                    {{-- <div class="comic-inner__desc px-3 mb-3">
                                        {!! \Illuminate\Support\Str::limit($comic->comic_sinopsis ?? '', 100, ' ...') !!}
                                    </div> --}}
                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="latest-comic-wrapper mb-5">
            <div class="d-flex justify-content-between align-content-center">
                <div class="latest-title">
                    {{-- <div class="wow fadeInUp" data-wow-delay="0.1s"> --}}
                    <h3 class="text-center mb-5">Komik Paling Terbaru</h3>
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
                        <div class="rounded overflow-hidden">
                            <div class="comic-inner">
                                <div class="comic-inner__image">
                                    <div class="position-relative overflow-hidden ">
                                        <a href="{{ route('komikShow', $comic->comic_slug) }}">
                                            <img class="img-fluid w-100 rounded"
                                                src="{{ asset($comic->comic_cover ? 'images/komik/' . $comic->comic_cover : 'images/default-komik.jpg') }}"
                                                style="height: 450px;">
                                        </a>
                                    </div>
                                </div>

                                <div class="comic-inner mb-3">
                                    <div class="comic-inner__text px-2 pt-2 mb-3">
                                        <a href="{{ route('komikShow', $comic->comic_slug) }}" class="text-dark">
                                            <h4 class="text-dark text-capitalize col-lg-auto">
                                                {!! \Illuminate\Support\Str::limit($comic->comic_title ?? '', 50, ' ...') !!}
                                            </h4>
                                        </a>
                                    </div>
                                    {{-- <div class="comic-inner__desc px-3 mb-3">
                                        {!! \Illuminate\Support\Str::limit($comic->comic_sinopsis ?? '', 100, ' ...') !!}
                                    </div> --}}
                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="container py-5 px-lg-5">
        <div class="d-flex justify-content-between align-content-center">
            <div class="latest-title">
                {{-- <div class="wow fadeInUp" data-wow-delay="0.1s"> --}}
                <div class="wow fadeInUp" data-wow-delay="0.1s">
                    <h3 class="text-center mb-5">Pilih berdasarkan genre</h3>
                </div>
                {{-- </div> --}}
            </div>
            <div class="latest-action__details">
                <a href="{{ route('komikLatest') }}" class="ls-base text-dark">Lihat Semua</a> <span
                    class="fas fa-arrow-right"></span>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="tabs">
                    <div class="tab-2">
                        <label for="tab2-1" class="text-dark">Komik Romantis</label>
                        <input id="tab2-1" name="tabs-two" type="radio" checked="checked">
                        <div class="row justify-content-arround g-4 portfolio-container">
                            @foreach ($comic_romantis as $data)
                                <div class="col-lg-4 col-md-6 portfolio-item first wow fadeInUp" data-wow-delay="0.1s">
                                    <div class="rounded overflow-hidden">
                                        <div class="comic-inner">
                                            <div class="comic-inner__image">
                                                <div class="position-relative overflow-hidden ">
                                                    <a href="{{ route('komikShow', $data->comic_slug) }}">
                                                        <img class="img-fluid w-100 rounded"
                                                            src="{{ asset($data->comic_cover ? 'images/komik/' . $data->comic_cover : 'images/default-komik.jpg') }}"
                                                            style="height: 450px;">
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="comic-inner mb-3">
                                                <div class="comic-inner__text px-2 pt-2 mb-3">
                                                    <a href="{{ route('komikShow', $data->comic_slug) }}"
                                                        class="text-dark">
                                                        <h4 class="text-dark text-capitalize col-lg-auto">
                                                            {!! \Illuminate\Support\Str::limit($data->comic_title ?? '', 50, ' ...') !!}
                                                        </h4>
                                                    </a>
                                                </div>
                                                {{-- <div class="comic-inner__desc px-3 mb-3">
                                        {!! \Illuminate\Support\Str::limit($comic->comic_sinopsis ?? '', 100, ' ...') !!}
                                    </div> --}}
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="tab-2">
                        <label for="tab2-2" class="text-dark">Komik Fantasi</label>
                        <input id="tab2-2" name="tabs-two" type="radio">
                        <div class="row justify-content-arround g-4 portfolio-container">
                            @foreach ($comic_fantasi as $data)
                                <div class="col-lg-4 col-md-6 portfolio-item first wow fadeInUp"
                                    data-wow-delay="0.1s">
                                    <div class="rounded overflow-hidden">
                                        <div class="comic-inner">
                                            <div class="comic-inner__image">
                                                <div class="position-relative overflow-hidden ">
                                                    <a href="{{ route('komikShow', $data->comic_slug) }}">
                                                        <img class="img-fluid w-100 rounded"
                                                            src="{{ asset($data->comic_cover ? 'images/komik/' . $data->comic_cover : 'images/default-komik.jpg') }}"
                                                            style="height: 450px;">
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="comic-inner mb-3">
                                                <div class="comic-inner__text px-2 pt-2 mb-3">
                                                    <a href="{{ route('komikShow', $data->comic_slug) }}"
                                                        class="text-dark">
                                                        <h4 class="text-dark text-capitalize col-lg-auto">
                                                            {!! \Illuminate\Support\Str::limit($data->comic_title ?? '', 50, ' ...') !!}
                                                        </h4>
                                                    </a>
                                                </div>
                                                {{-- <div class="comic-inner__desc px-3 mb-3">
                                        {!! \Illuminate\Support\Str::limit($comic->comic_sinopsis ?? '', 100, ' ...') !!}
                                    </div> --}}
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

{{-- <div class="container-xxl newsletter py-5 wow fadeInUp" data-wow-delay="0.1s" style="background: #f1f1f1 !important;">
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
</div> --}}



@push('javascript')
    <script>
        $(document).ready(function() {
            $(".owl-carousel").owlCarousel();
        });
    </script>
@endpush
