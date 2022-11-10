<div class="container-xxl position-relative p-0 py-5 mt-5">
    <div class="container py-3 px-lg-5">
        <div class="row justify-content-center align-items-center mb-3">
            <div class="col-lg-6 col-md-6">
                <h3 class="text-dark text-capitalize">
                    Cari & Temukan komik Pilihan
                </h3>
            </div>
        </div>
        <div class="row filtering-data pt-3 mb-3">
            <div class="col-lg-4 col-md-6">
                <div class="input-group mb-3">
                    <input wire:model.debounce.500ms="search" type="search" class="form-control"
                        placeholder="Cari daftar komik..." aria-label="Cari daftar komik..."
                        aria-describedby="button-addon2">
                    {{-- <button class="btn btn-outline-primary" type="button" id="button-addon2"><i
                            class="fas fa-search"></i></button> --}}
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-3">
                <select wire:model.debounce.500ms="selectedGenre" class="form-select" aria-label="Selected Genre">
                    <option selected value="">Pilih Genre</option>
                    @foreach ($genres as $genre)
                        <option value="{{ $genre->genre_name }}">{{ $genre->genre_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-lg-4 col-md-6">
                <select class="form-select" aria-label="Default select example">
                    <option selected>Pilih status</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </div>
        </div>
        <div class="card p-3"
            style="background-color: #fff; border-radius: 12px; box-shadow: rgba(17, 17, 26, 0.05) 0px 1px 0px, rgba(17, 17, 26, 0.1) 0px 0px 8px;">
            <div class="d-flex justify-content-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('homePageIndex') }}">Beranda</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Daftar Komik</li>
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
                                                    src="{{ asset($value->comic_cover ? 'images/komik/' . $value->comic_cover : 'images/default-komik.jpg') }}"
                                                    style="height: 300px;">
                                            </a>
                                        </div>
                                    </div>

                                    <div class="comic-inner mb-3">
                                        <div class="comic-inner__text px-2 pt-2 mb-3">
                                            <a href="{{ route('komikShow', $value->comic_slug) }}" class="text-dark">
                                                <h5 class="text-dark text-capitalize col-lg-auto">
                                                    {!! \Illuminate\Support\Str::limit($value->comic_title ?? '', 38, ' ...') !!}
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
