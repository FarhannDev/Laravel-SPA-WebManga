<div class="container py-5 px-lg-5" style="padding-top: 10em !important;">

    <div class="row justify-content-center">
        <div class="col">
            <div class="search-blog__title text-center mb-3 ">
                <h3 class="text-dark text-capitalize">
                    Temukan semua daftar berita
                </h3>
            </div>
        </div>
    </div>
    <div class="row justify-content-arround align-items-center ">
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
                        <option selected value="">Pilih status</option>
                        <option value="Publish">Publish</option>
                        <option value="Unpublish">Unpublish</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-end mb-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('homePageIndex') }}">Beranda</a></li>
                <li class="breadcrumb-item active" aria-current="page">Daftar Berita</li>
            </ol>
        </nav>
    </div>
    <div class="row justify-content-arround align-content-center">

        @forelse ($blogs as $blog)
            @if ($blog->status == 'Publish')
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
                                    <a href="" class="text-dark">
                                        <i class="far fa-user "> By <span
                                                class="font-weight-bold">{{ $blog->user['name'] }}</span> </i>
                                    </a>
                                    <br />
                                    <i class="fas fa-clock"> {{ $blog->created_at->diffForHumans() }}</i>
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
