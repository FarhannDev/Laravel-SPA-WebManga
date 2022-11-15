@section('header')
    <header class="header-content-main">
        <div class="container-xxl hero-header">
            <div class="container px-lg-6">
                <div class="row g-5 justify-content-end align-items-center">
                    <div class="col-lg-6 text-center text-lg-start">
                        <h1 class="text-dark mb-4 animated slideInDown text-capitalize"> Cari & Temukan semua daftar komik
                            terbaru
                        </h1>
                        <div class="d-flex justify-content-start">
                            <nav aria-label="breadcrumb"
                                style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('homePageIndex') }}">Beranda</a></li>
                                    <li class="breadcrumb-item active"> <a href="{{ route('komikIndex') }}">Daftar Komik</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Komik Terbaru</li>
                                </ol>
                            </nav>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </header>
@endsection

<div class="container-xxl position-relative p-0 py-3 mt-5">
    <div class="container py-3 px-lg-5">
        <div class="row filtering-data pt-3 mb-3">
            <div class="col-lg-4 col-md-6">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Cari Daftar Komik:</label>
                    <div class="input-group mb-3">
                        <input wire:model.debounce.500ms="search" type="search" class="form-control"
                            placeholder="Cari daftar komik..." aria-label="Cari daftar komik..."
                            aria-describedby="button-addon2">
                        {{-- <button class="btn btn-outline-primary" type="button" id="button-addon2"><i
                            class="fas fa-search"></i></button> --}}
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-3">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Cari Berdasarkan Genre:</label>
                    <select wire:model.debounce.500ms="selected_genre" class="form-select" aria-label="Selected Genre">
                        <option selected value="">Pilih Semua Genre</option>
                        @foreach ($genres as $genre)
                            <option value="{{ strtolower($genre->genre_name) }}">{{ $genre->genre_name }}</option>
                        @endforeach
                    </select>
                </div>

            </div>
            <div class="col-lg-4 col-md-6 mb-3">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Cari Berdasarkan Status:</label>
                    <select wire:model.debounce.500ms="selected_status" class="form-select"
                        aria-label="Selected Status">
                        <option selected value="">Pilih Semua Status</option>
                        <option selected value="Ongoing">Ongoing</option>
                        <option selected value="Completed">Completed</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="row justify-content-arround g-4 portfolio-container pt-5">
                    @if (!is_null($data))
                        @forelse ($data as $value)
                            @if ($value->status == 'Publish')
                                <div class="col-lg-3 col-md-6 portfolio-item wow fadeInUp" data-wow-delay="0.1s">
                                    <div class="rounded overflow-hidden">
                                        <div class="comic-inner">
                                            <div class="comic-inner__image">
                                                <div class="position-relative overflow-hidden ">
                                                    <a href="{{ route('komikShow', $value->comic_slug) }}">
                                                        <img class="img-fluid w-100 rounded"
                                                            src="{{ $value->comic_link_cover }}" style="height: 350px;"
                                                            alt="{{ $value->comic_title }}">
                                                        {{-- <img class="img-fluid w-100 rounded"
                                                    src="{{ asset($value->comic_cover ? 'images/komik/' . $value->comic_cover : 'images/komik/default.jpg') }}"
                                                    style="height: 250px;" alt="{{ $value->comic_title }}"> --}}
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="comic-inner mb-3">
                                                <div class="comic-inner__text pt-2 mb-3">
                                                    <a href="{{ route('komikShow', $value->comic_slug) }}"
                                                        class="text-dark">
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
                            @endif
                        @empty
                            <div class="d-flex justify-content-center">
                                <p class="text-dark">Komik <strong> {{ $search }} </strong> tidak di ditemukan.
                                </p>
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
</div>
