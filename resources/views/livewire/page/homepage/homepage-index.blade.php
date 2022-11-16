@section('header')
    <header class="header-content-main">
        <div class="container-xxl hero-header">
            <div class="container px-lg-6">
                <div class="row g-5 justify-content-end align-items-center">
                    <div class="col-lg-6 text-center text-lg-start">
                        <h1 class="text-dark mb-4 animated slideInDown">Selamat datang di
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

<div class="continer-fluid position-relative py-5 p-0">
    <div class="container px-lg-5">
        <div class="row g-5 justify-content-between align-items-center">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                <p class="section-title text-secondary">About Us<span></span></p>
                <h1 class="mb-5 text-dark ">Zaotaku - Situs Download Volume Manga</h1>
                <h5 class="mb-4 text-dark ">ZaOtaku merupakan situs download volume manga. Kamu bisa membaca beberapa
                    komik
                    yang kami update setiap hari secara gratis. Memiliki desain yang responsif dan modern, website
                    ini
                    adalah tempat terbaik untuk kalian yang biasa membaca satu volume lengkap.</h5>
                <a href="{{ route('aboutIndex') }}"
                    class="btn btn-secondary py-sm-3 px-sm-5 rounded-pill me-3 animated slideInLeft">Baca
                    Selengkapnya</a>
            </div>
            <div class="col-lg-6">
                <img class="img-fluid wow zoomIn" data-wow-delay="0.5s"
                    src="{{ asset('images/logo/zaotaku-logo.png') }}">
            </div>
        </div>
    </div>
</div>
<hr />
<div class="container-fluid  position-relative p-0 pt-5 ">
    <div class="container px-lg-5">
        <div class="row mb-5">
            <div class="col">
                <div class="latest-comic-wrapper mb-3">
                    <div class="d-flex justify-content-between align-content-center mb-3">
                        <div class="latest-title">
                            {{-- <div class="wow fadeInUp" data-wow-delay="0.1s"> --}}
                            <h3 class="">Paling Terbaru</h3>
                            {{-- </div> --}}
                        </div>
                        <a href="{{ route('komikLatest') }}" class=" text-decoration-none text-dark">
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
        <div class="row mb-5">
            <div class="col">
                <div class="latest-comic-wrapper mb-3">
                    <div class="d-flex justify-content-between align-content-center mb-3">
                        <div class="latest-title">
                            {{-- <div class="wow fadeInUp" data-wow-delay="0.1s"> --}}
                            <h3>Sedang Trending</h3>
                            {{-- </div> --}}
                        </div>
                        <a href="{{ route('komikTrending') }}" class=" text-decoration-none text-dark">
                            {{ __('Lihat semua') }} <span class="fas fa-arrow-right"></span>
                        </a>
                    </div>
                    <div class="row justify-content-arround g-4 portfolio-container">
                        @foreach ($trending as $data)
                            <div class="col-xl-3 col-lg-4 col-md-6 portfolio-item wow fadeInUp" data-wow-delay="0.1s">
                                <div class="rounded overflow-hidden  ">
                                    <div class="comic-inner mb-2 ">
                                        <div class="comic-inner__image">
                                            <div class="position-relative overflow-hidden ">
                                                <a href="{{ route('komikShow', $data->comic_slug) }}">
                                                    <img class="img-fluid w-100 rounded"
                                                        src="{{ $data->comic_link_cover }}" style="height: 350px;"
                                                        alt="{{ $data->comic_title }}">
                                                    {{-- <img class="img-fluid w-100 rounded"
                                                        src="{{ asset($latest->comic_cover ? 'images/komik/' . $latest->comic_cover : 'images/komik/default.jpg') }}"
                                                        style="height: 250px; max-width: 100%;"
                                                        alt="{{ $latest->comic_title }}"> --}}
                                                </a>
                                            </div>
                                        </div>
                                        <div class="comic-inner mb-3">
                                            <div class="comic-inner__text pt-2 mb-3">
                                                <a href="{{ route('komikShow', $data->comic_slug) }}"
                                                    class="text-dark">
                                                    <h5 class="text-dark text-capitalize col-lg-auto">
                                                        {!! \Illuminate\Support\Str::limit($data->comic_title ?? '', 40, ' ...') !!}
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
        <div class="row mb-5">
            <div class="col">
                <div class="latest-comic-wrapper mb-3">
                    <div class="d-flex justify-content-between align-content-center mb-3">
                        <div class="latest-title">
                            {{-- <div class="wow fadeInUp" data-wow-delay="0.1s"> --}}
                            <h3 class="">Sedang Populer</h3>
                            {{-- </div> --}}
                        </div>
                        <a href="{{ route('komikPopuler') }}" class=" text-decoration-none text-dark">
                            {{ __('Lihat semua') }} <span class="fas fa-arrow-right"></span>
                        </a>
                    </div>
                    <div class="row justify-content-arround g-4 portfolio-container">
                        @foreach ($populer as $data)
                            <div class="col-xl-3 col-lg-4 col-md-6 portfolio-item wow fadeInUp" data-wow-delay="0.1s">
                                <div class="rounded overflow-hidden  ">
                                    <div class="comic-inner mb-2 ">
                                        <div class="comic-inner__image">
                                            <div class="position-relative overflow-hidden ">
                                                <a href="{{ route('komikShow', $data->comic_slug) }}">
                                                    <img class="img-fluid w-100 rounded"
                                                        src="{{ $data->comic_link_cover }}" style="height: 350px;"
                                                        alt="{{ $data->comic_title }}">
                                                    {{-- <img class="img-fluid w-100 rounded"
                                                        src="{{ asset($latest->comic_cover ? 'images/komik/' . $latest->comic_cover : 'images/komik/default.jpg') }}"
                                                        style="height: 250px; max-width: 100%;"
                                                        alt="{{ $latest->comic_title }}"> --}}
                                                </a>
                                            </div>
                                        </div>
                                        <div class="comic-inner mb-3">
                                            <div class="comic-inner__text pt-2 mb-3">
                                                <a href="{{ route('komikShow', $data->comic_slug) }}"
                                                    class="text-dark">
                                                    <h5 class="text-dark text-capitalize col-lg-auto">
                                                        {!! \Illuminate\Support\Str::limit($data->comic_title ?? '', 40, ' ...') !!}
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
<hr />
<div class="container-fluid  position-relative p-0 pt-5 ">
    <div class="container px-lg-5">
        <div class="d-flex justify-content-between align-content-center mb-3">
            <div class="latest-title">
                {{-- <div class="wow fadeInUp" data-wow-delay="0.1s"> --}}
                <h3 class="">Baca Artikel Terbaru</h3>
                {{-- </div> --}}
            </div>
            <a href="{{ route('blogIndex') }}" class=" text-decoration-none text-dark">
                {{ __('Lihat semua') }} <span class="fas fa-arrow-right"></span>
            </a>
        </div>

        <div class="row justify-content-arround align-content-center">
            @forelse ($blogs as $blog)
                @if ($blog->status == 'Publish')
                    <div class="col-lg-4 col-md-6">
                        <div class="card mb-3">
                            <img class="card-img-top" src="{{ $blog->blog_cover_link }}"
                                alt="{{ $blog->blog_name }}" height="300px;">
                            {{-- <img class="card-img-top"
                            src="{{ asset($blog->blog_cover ? 'images/blog/' . $blog->blog_cover : 'images/blog/default.jpg') }}"
                            alt="{{ $blog->blog_name }}" height="300px;"> --}}
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
                                        <a href="" class="text-dark">
                                            <i class="far fa-user "> <span
                                                    class="font-weight-bold">{{ $blog->publish_by }}</span> </i>
                                        </a>
                                        <br />
                                        <i class="fas fa-clock text-capitalize">
                                            {{ $blog->created_at->diffForHumans() }}</i>
                                    </small>
                                </div>

                            </div>
                        </div>
                    </div>
                @endif
            @empty
                <div class="d-flex justify-content-center">
                    <p class="text-dark">
                        Berita <strong> {{ $search }}</strong> tidak ditemukan.
                    </p>
                </div>
            @endforelse
        </div>
    </div>
</div>
