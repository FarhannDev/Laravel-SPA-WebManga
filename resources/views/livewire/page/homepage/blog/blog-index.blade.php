@section('header')
    <header class="header-content-main">
        <div class="container-xxl hero-header">
            <div class="container px-lg-6">
                <div class="row g-5 justify-content-end align-items-center">
                    <div class="col-lg-6 text-center text-lg-start">
                        <h1 class="text-dark mb-4 animated slideInDown text-capitalize"> Temukan & Baca semua daftar berita
                            terkini
                        </h1>
                        <div class="d-flex justify-content-start">
                            <nav aria-label="breadcrumb"
                                style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('homePageIndex') }}">Beranda</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Daftar Berita</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
@endsection


<div class="container py-3 px-lg-5">
    <div class="row justify-content-arround align-items-center mb-5">
        <div class="col-lg-4 col-md-6">
            <div class="search-blog ">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Cari daftar berita:</label>
                    <input wire:model.debounce.500ms="search" type="search" class="form-control"
                        placeholder="Cari semua berita" aria-label="Cari semua berita" aria-describedby="button-addon2">
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="search-blog">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Cari berdasarkan tanggal:</label>
                    <input wire:model.debounce.500ms="publish" type="date" class="form-control"
                        placeholder="Cari semua berita" aria-label="Cari semua berita" aria-describedby="button-addon2">
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="search-blog">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Cari berdasarkan status:</label>
                    <select wire:model.debounce.500ms="status" class="form-select" aria-label="Default select example">
                        <option selected hidden value="">Pilih status</option>
                        <option value="Publish">Publish</option>
                        {{-- <option value="Unpublish">Unpublish</option> --}}
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-arround align-content-center">
        @forelse ($blogs as $blog)
            @if ($blog->status == 'Publish')
                <div class="col-lg-4 col-md-6">
                    <div class="card mb-3">
                        <img class="card-img-top" src="{{ $blog->blog_cover_link }}" alt="{{ $blog->blog_name }}"
                            height="300px;">
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
                                        <i class="far fa-user "><span class="font-weight-bold">
                                                {{ $blog->publish_by }}</span> </i>
                                    </a>
                                    <br />
                                    <i class="fas fa-calendar-alt">
                                        {{ date('d M Y', strtotime($blog->created_at)) }}</i>
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
