<div class="container-xxl position-relative p-0 mb-3">
    <div class="container mt-5 py-5 px-lg-5">
        <div class="d-flex justify-content-end ">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('homePageIndex') }}">Beranda</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('genreIndex') }}"> Daftar Genre</a></li>
                    <li class="breadcrumb-item active" aria-current="page"> {!! \Illuminate\Support\Str::limit($genre_name ?? '', 50, ' ...') !!}</li>
                </ol>
            </nav>
        </div>
        <hr />
        <div class="d-flex justify-content-arround">
            <div class="action-detail__back  pt-3 mb-3">
                <a href="{{ route('genreIndex') }}" class="ls-base text-dark font-weight-normal">
                    <span class="fas fa-arrow-left"> Kembali ke halaman sebelumnya</span>
                </a>
            </div>
        </div>
        <div class="row justify-content-arround g-4 portfolio-container pt-3">
            @forelse ($comics as $comic)
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
            @empty
                <div class="d-flex justify-content-center pt-3">
                    <p>Genre tidak tersedia...</p>
                </div>
            @endforelse



        </div>
    </div>
</div>
