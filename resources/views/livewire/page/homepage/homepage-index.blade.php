@section('header')
    <header class="header-content-main">
        <div class="container-xxl hero-header">
            <div class="container px-lg-6">
                <div class="row g-5 justify-content-end align-items-center">
                    <div class="col-lg-6 text-center text-lg-start">
                        <h1 class="text-dark mb-4 animated slideInDown">Selamat datang di <span class="">
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

<div class="container-xxl  position-relative p-0 py-5" id="main-content" style="background-color: #fafafa !important;">
    <div class="container pt-3 px-lg-5">
        <div class="card p-3"
            style="border-radius: 12px; box-shadow: rgba(17, 17, 26, 0.05) 0px 1px 0px, rgba(17, 17, 26, 0.1) 0px 0px 8px;">
            <div class="latest-comic-wrapper">
                <div class="row justify-content-center align-items-center">
                    <div class="col">
                        <div class="latest-title">
                            {{-- <div class="wow fadeInUp" data-wow-delay="0.1s"> --}}
                            <h3 class="text-center">Komik Terbaru Dari Kami</h3>
                            {{-- </div> --}}
                        </div>
                    </div>
                </div>
                <hr />
                <div class="row justify-content-arround g-4 portfolio-container">
                    @foreach ($comic_latest as $latest)
                        <div class="col-lg-3 col-md-6 portfolio-item wow fadeInUp" data-wow-delay="0.1s">
                            <div class="rounded overflow-hidden  ">
                                <div class="comic-inner mb-2 ">
                                    <div class="comic-inner__image">
                                        <div class="position-relative overflow-hidden ">
                                            <a href="{{ route('komikShow', $latest->comic_slug) }}">
                                                <img class="img-fluid w-100 rounded"
                                                    src="{{ asset($latest->comic_cover ? 'images/komik/' . $latest->comic_cover : 'images/default-komik.jpg') }}"
                                                    style="height: 300px;">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="comic-inner mb-3">
                                        <div class="comic-inner__text px-2 pt-2 mb-3">
                                            <a href="{{ route('komikShow', $latest->comic_slug) }}" class="text-dark">
                                                <h5 class="text-dark text-capitalize col-lg-auto">
                                                    {!! \Illuminate\Support\Str::limit($latest->comic_title ?? '', 18, ' ...') !!}
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
                <hr />
                <div class="d-flex justify-content-center">
                    <a href="" class=" text-decoration-none text-dark">
                        {{ __('Lihat semua komik terbaru') }} <span class="fas fa-arrow-right"></span>
                    </a>
                </div>
            </div>

        </div>

    </div>
    <div class="container pt-3 mb-3 px-lg-5">
        <div class="card p-3"
            style="border-radius: 12px; box-shadow: rgba(17, 17, 26, 0.05) 0px 1px 0px, rgba(17, 17, 26, 0.1) 0px 0px 8px;">
            <div class="d-flex justify-content-center align-content-center">
                <div class="latest-title">
                    {{-- <div class="wow fadeInUp" data-wow-delay="0.1s"> --}}
                    <div class="wow fadeInUp" data-wow-delay="0.1s">
                        <h3 class="text-center">Pilih Berdasarkan Genre</h3>
                    </div>
                    {{-- </div> --}}
                </div>
            </div>
            <hr />
            <div class="row">
                <div class="col-12">
                    <div class="tabs">
                        <div class="tab-2">
                            <label for="tab2-1" class="text-dark">Komik Romantis</label>
                            <input id="tab2-1" name="tabs-two" type="radio" checked="checked">
                            <div class="row justify-content-arround g-4 portfolio-container">
                                @foreach ($comic_romantis as $data)
                                    <div class="col-lg-3 col-md-6 portfolio-item  wow fadeInUp" data-wow-delay="0.1s">
                                        <div class="rounded overflow-hidden">
                                            <div class="comic-inner">
                                                <div class="comic-inner__image">
                                                    <div class="position-relative overflow-hidden ">
                                                        <a href="{{ route('komikShow', $data->comic_slug) }}">
                                                            <img class="img-fluid w-100 rounded"
                                                                src="{{ asset($data->comic_cover ? 'images/komik/' . $data->comic_cover : 'images/default-komik.jpg') }}"
                                                                style="height: 300px;">
                                                        </a>
                                                    </div>
                                                </div>

                                                <div class="comic-inner mb-3">
                                                    <div class="comic-inner__text px-2 pt-2 mb-3">
                                                        <a href="{{ route('komikShow', $data->comic_slug) }}"
                                                            class="text-dark">
                                                            <h5 class="text-dark text-capitalize col-lg-auto">
                                                                {!! \Illuminate\Support\Str::limit($data->comic_title ?? '', 18, ' ...') !!}
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

                        <div class="tab-2">
                            <label for="tab2-2" class="text-dark">Komik Fantasi</label>
                            <input id="tab2-2" name="tabs-two" type="radio">
                            <div class="row justify-content-arround g-4 portfolio-container">
                                @foreach ($comic_fantasi as $data)
                                    <div class="col-lg-3 col-md-6 portfolio-item first wow fadeInUp"
                                        data-wow-delay="0.1s">
                                        <div class="rounded overflow-hidden">
                                            <div class="comic-inner">
                                                <div class="comic-inner__image">
                                                    <div class="position-relative overflow-hidden ">
                                                        <a href="{{ route('komikShow', $data->comic_slug) }}">
                                                            <img class="img-fluid w-100 rounded"
                                                                src="{{ asset($data->comic_cover ? 'images/komik/' . $data->comic_cover : 'images/default-komik.jpg') }}"
                                                                style="height: 300px;">
                                                        </a>
                                                    </div>
                                                </div>

                                                <div class="comic-inner mb-3">
                                                    <div class="comic-inner__text px-2 pt-2 mb-3">
                                                        <a href="{{ route('komikShow', $data->comic_slug) }}"
                                                            class="text-dark">
                                                            <h5 class="text-dark text-capitalize col-lg-auto">
                                                                {!! \Illuminate\Support\Str::limit($data->comic_title ?? '', 18, ' ...') !!}
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
            <hr />
            <div class="d-flex justify-content-center">
                <a href="{{ route('genreIndex') }}" class=" text-decoration-none text-dark">
                    {{ __('Lihat semua genre ') }} <span class="fas fa-arrow-right"></span>
                </a>
            </div>
        </div>
    </div>
    <hr />
    <div class="container pt-5 px-lg-5">
        <div class="d-flex justify-content-center align-content-center mb-3">
            <div class="latest-title">
                {{-- <div class="wow fadeInUp" data-wow-delay="0.1s"> --}}
                <div class="wow fadeInUp" data-wow-delay="0.1s">
                    <h3 class="text-center">Baca Artikel Terbaru</h3>
                </div>
                {{-- </div> --}}
            </div>
        </div>
        <div class="row justify-content-arround ">
            @foreach ($blogs as $blog)
                <div class="col-lg-4 col-md-6">
                    <div class="card mb-3">
                        <img class="card-img-top"
                            src="{{ asset($blog->blog_cover ? 'images/blog/' . $blog->blog_cover : 'images/blog/default.jpg') }}"
                            alt="Card image cap" height="300px;">
                        <div class="card-body">
                            <h4 class="card-title"><a href="{{ route('blogShow', $blog->blog_slug) }}"
                                    class="text-dark">
                                    {{ \Illuminate\Support\Str::limit($blog->blog_name ?? '', 50, ' ...') }}
                                </a>
                            </h4>
                            <div class="text-dark">
                                {!! \Illuminate\Support\Str::limit($blog->blog_desc ?? '', 160, ' ...') !!}
                            </div>

                            <p class="card-text">
                            <div class="d-flex">
                                <small class="text-muted">
                                    <i class="far fa-user "> {{ $blog->user['name'] }} </i> <br />
                                    <i class="fas fa-calendar-alt"> {{ $blog->created_at->diffForHumans() }}</i>
                                </small>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

@push('javascript')
    <script>
        $(document).ready(function() {
            $(".owl-carousel").owlCarousel();
        });
    </script>
    <script>
        $('.slider-komik').owlCarousel({
            animateOut: 'fadeOut'
        });
    </script>
@endpush
