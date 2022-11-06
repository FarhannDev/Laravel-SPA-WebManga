@section('header')
    <header class="header-content-main">
        <div class="container-xxl hero-header"
            style="background-image: url('https://wallpaperaccess.com/full/2010880.jpg'); background-size: cover; min-height: 100vh; background-position: center;">
        </div>
    </header>
@endsection

<div class="container-xxl position-relative p-0 py-5">
    <div class="container py-5 px-lg-5">
        <div class="row justify-content-between align-items-center border-bottom mb-3">
            <div class="col-lg-6">
                <h3 class="text-dark text-capitalize">
                    Cari & Temukan komik favorite kamu
                </h3>
            </div>
            <div class="col-lg-4">
                <div class="input-group mb-3">
                    <input type="search" class="form-control" placeholder="Cari komik populer..."
                        aria-label="Cari komik populer..." aria-describedby="button-addon2">

                    <button class="btn btn-outline-primary" type="button" id="button-addon2"><i
                            class="fas fa-search"></i></button>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-end">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('homePageIndex') }}">Beranda</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Daftar Komik</li>
                </ol>
            </nav>
        </div>

        <div class="row justify-content-arround g-4 portfolio-container pt-5">
            @if (!is_null($comics))
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
            @endif

        </div>

        <div class="d-flex  pagination-start pt-5">
            {{ $comics->links() }}
        </div>
    </div>
</div>
