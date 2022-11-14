@section('header')
    <header class="header-content-main">
        <div class="container-xxl hero-header">
            <div class="container px-lg-6">
                <div class="row g-5 justify-content-center align-items-center">
                    <div class="col-lg-6 text-center text-lg-start">
                        <h1 class="text-white mb-4 animated slideInDown">Selamat datang di
                            Zaotaku <br> <span> Situs Download Volume Manga</span></h1>

                        <div class="mx-auto ">
                            <a href="{{ route('komikIndex') }}"
                                class="btn btn-secondary py-sm-3 px-sm-5 rounded-pill me-3 animated slideInLeft">Lihat
                                Semua Komik</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </header>
@endsection

<div class="container-fluid  position-relative p-0 " id="main-content">
    <div class="container px-lg-5">
        <div class="row mb-3">
            <div class="col">
                <div class="latest-comic-wrapper mb-3">
                    <div class="d-flex justify-content-between align-content-center mb-3">
                        <div class="latest-title">
                            {{-- <div class="wow fadeInUp" data-wow-delay="0.1s"> --}}
                            <h3 class="">Komik Terbaru Dari Kami</h3>
                            {{-- </div> --}}
                        </div>
                        <a href="#" class=" text-decoration-none text-dark">
                            {{ __('Lihat semua') }} <span class="fas fa-arrow-right"></span>
                        </a>
                    </div>
                    <div class="row justify-content-arround g-4 portfolio-container">
                        @foreach ($comic_latest as $latest)
                            <div class="col-xl-3 col-lg-4 col-md-6 portfolio-item wow fadeInUp" data-wow-delay="0.1s">
                                <div class="rounded overflow-hidden  ">
                                    <div class="comic-inner mb-2 ">
                                        <div class="comic-inner__image">
                                            <div class="position-relative overflow-hidden ">
                                                <a href="{{ route('komikShow', $latest->comic_slug) }}">
                                                    <img class="img-fluid w-100 rounded"
                                                        src="{{ $latest->comic_link_cover }}" style="height: 350px;"
                                                        alt="{{ $latest->comic_title }}">
                                                    {{-- <img class="img-fluid w-100 rounded"
                                                        src="{{ asset($latest->comic_cover ? 'images/komik/' . $latest->comic_cover : 'images/komik/default.jpg') }}"
                                                        style="height: 250px; max-width: 100%;"
                                                        alt="{{ $latest->comic_title }}"> --}}
                                                </a>
                                            </div>
                                        </div>
                                        <div class="comic-inner mb-3">
                                            <div class="comic-inner__text pt-2 mb-3">
                                                <a href="{{ route('komikShow', $latest->comic_slug) }}"
                                                    class="text-dark">
                                                    <h5 class="text-dark text-capitalize col-lg-auto">
                                                        {!! \Illuminate\Support\Str::limit($latest->comic_title ?? '', 40, ' ...') !!}
                                                    </h5>
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

        <div class="row mb-3">
            <div class="col">
                <div class="latest-comic-wrapper">
                    <div class="d-flex justify-content-between align-content-center mb-3">
                        <div class="latest-title">
                            {{-- <div class="wow fadeInUp" data-wow-delay="0.1s"> --}}
                            <h3 class="">Sedang Trending</h3>
                            {{-- </div> --}}
                        </div>
                        <a href="#" class=" text-decoration-none text-dark">
                            {{ __('Lihat semua') }} <span class="fas fa-arrow-right"></span>
                        </a>
                    </div>
                    <div class="row justify-content-arround g-4 portfolio-container">
                        @foreach ($comic_trending as $trending)
                            <div class="col-xl-3 col-lg-4 col-md-6 portfolio-item wow fadeInUp" data-wow-delay="0.1s">
                                <div class="rounded overflow-hidden  ">
                                    <div class="comic-inner mb-2 ">
                                        <div class="comic-inner__image">
                                            <div class="position-relative overflow-hidden ">
                                                <a href="{{ route('komikShow', $trending->comic_slug) }}">
                                                    <img class="img-fluid w-100 rounded"
                                                        src="{{ $trending->comic_link_cover }}"
                                                        style="height: 350px; max-width: 100%;"
                                                        alt="{{ $trending->comic_title }}">
                                                    {{-- <img class="img-fluid w-100 rounded"
                                                        src="{{ asset($trending->comic_cover ? 'images/komik/' . $trending->comic_cover : 'images/komik/default.jpg') }}"
                                                        style="height: 250px; max-width: 100%;"
                                                        alt="{{ $trending->comic_title }}"> --}}
                                                </a>
                                            </div>
                                        </div>
                                        <div class="comic-inner mb-3">
                                            <div class="comic-inner__text pt-2 mb-3">
                                                <a href="{{ route('komikShow', $trending->comic_slug) }}"
                                                    class="text-dark">
                                                    <h5 class="text-dark text-capitalize col-lg-auto">
                                                        {!! \Illuminate\Support\Str::limit($trending->comic_title ?? '', 40, ' ...') !!}
                                                    </h5>
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
