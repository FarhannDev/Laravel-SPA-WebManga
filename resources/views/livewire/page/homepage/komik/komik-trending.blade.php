<div class="container-xxl position-relative py-md-5 ">
    <div class="container py-5 px-lg-5">
        <div class="card p-3"
            style="background-color: #fff; border-radius: 12px; box-shadow: rgba(17, 17, 26, 0.05) 0px 1px 0px, rgba(17, 17, 26, 0.1) 0px 0px 8px;">
            <div class="d-flex justify-content-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('homePageIndex') }}">Beranda</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('komikIndex') }}">Daftar Komik</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Komik Terbaru</li>
                    </ol>
                </nav>
            </div>
            <hr />

            <div class="row justify-content-arround g-4 portfolio-container pt-5">
                @if (!is_null($data))
                    @forelse ($data as $value)
                        <div class="col-lg-3 col-md-6 portfolio-item wow fadeInUp" data-wow-delay="0.1s">
                            <div class="rounded overflow-hidden">
                                <div class="comic-inner">
                                    <div class="comic-inner__image">
                                        <div class="position-relative overflow-hidden ">
                                            <a href="{{ route('komikShow', $value->comic_slug) }}">
                                                <img class="img-fluid w-100 rounded"
                                                    src="{{ asset($value->comic_cover ? 'images/komik/' . $value->comic_cover : 'images/komik/default.jpg') }}"
                                                    style="height: 250px;" alt="{{ $value->comic_title }}">
                                            </a>
                                        </div>
                                    </div>

                                    <div class="comic-inner mb-3">
                                        <div class="comic-inner__text pt-2 mb-3">
                                            <a href="{{ route('komikShow', $value->comic_slug) }}" class="text-dark">
                                                <h5 class="text-dark text-capitalize col-lg-auto">
                                                    {!! \Illuminate\Support\Str::limit($value->comic_title ?? '', 50, ' ...') !!}
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
                    @empty
                        <div class="d-flex justify-content-center">
                            <p class="text-dark">Komik <strong> {{ $search }} </strong> tidak di ditemukan.</p>
                        </div>
                    @endforelse
                @endif

            </div>

            <div class="d-flex  pagination-start pt-5">
                {{ $data->links() }}
            </div>
        </div>

    </div>
</div>
