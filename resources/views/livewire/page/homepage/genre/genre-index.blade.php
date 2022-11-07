@section('header')
    <header class="header-content-main">
        <div class="container-xxl hero-header"
            style="background-image: url('https://wallpaperaccess.com/full/2010880.jpg'); background-size: cover; min-height: 100vh; background-position: center;">
        </div>
    </header>
@endsection

<div class="container-xxl position-relative p-0 py-5" style="background-color: #fafafa !important;">
    <div class="container py-5 px-lg-5">
        <div class="d-flex justify-content-between align-items-center ">
            <div class="search-blog__title col-lg-6 col-md-6">
                <h3 class="text-dark">
                    Cari & Temukan komik sesuai Genre pilihan
                </h3>
            </div>
            <div class="search-blog col-lg-4 col-md-6">
                <div class="input-group mb-3">
                    <input wire:model.debounce.500ms="search" type="search" class="form-control"
                        placeholder="Cari daftar genre" aria-label="Cari daftar genre..."
                        aria-describedby="button-addon2">

                    <button class="btn btn-outline-primary" type="button" id="button-addon2"><i
                            class="fas fa-search"></i></button>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-end mb-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('homePageIndex') }}">Beranda</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Daftar Genre</li>
                </ol>
            </nav>
        </div>
        <div class="row justify-content-arround align-content-center pt-3">

            @forelse ($data as $value)
                <div class="col-lg-3 col-md-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="feature-item bg-light rounded text-center p-4 mb-3"
                        style="height: 150px; background-color: #fff !important; border-radius: 8px; box-shadow: rgba(0, 0, 0, 0.08) 0px 4px 12px;">
                        {{-- <a href="{{ route('genreShow', $genre->genre_slug) }}"> --}}
                        {{-- <i class="fa fa-2x fa-bookmark text-primary mb-4"></i> --}}
                        <h5 style="font-size: 18px; line-height: 100px;" class="mb-3 text-uppercase">
                            <a href="{{ route('genreShow', $value->genre_slug) }}" class="text-dark text-monospace">
                                {{ $value->genre_name }}</a>
                        </h5>
                        {{-- </a> --}}
                    </div>

                </div>
            @empty
                <div class="d-flex justify-content-center">
                    <p class="text-monospace">
                        {{ __('Genre tidak di temukan.') }}
                    </p>
                </div>
            @endforelse

        </div>
    </div>
</div>

</div>
