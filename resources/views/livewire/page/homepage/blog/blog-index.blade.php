<div class="container py-5 px-lg-5" style="padding-top: 10em !important;">

    <div class="d-flex justify-content-between align-items-center ">
        <div class="search-blog__title col-lg-8 col-md-6">
            <h3 class="text-dark">
                Baca Semua berita Terkini
            </h3>
        </div>
        <div class="search-blog col-lg-4 col-md-6">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Search All Berita" aria-label="Search All Berita"
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
                <li class="breadcrumb-item active" aria-current="page">Daftar Berita</li>
            </ol>
        </nav>
    </div>
    <div class="row justify-content-arround align-content-center">
        @foreach ($blogs as $blog)
            <div class="col-lg-4 col-md-6">
                <div class="card mb-3">
                    <a href="#">
                        <img class="card-img-top"
                            src="{{ asset($blog->blog_cover ? 'images/blog/' . $blog->blog_cover : 'images/blog/default.jpg') }}"
                            alt="Card image cap" height="300px;">
                        <div class="card-body">
                            <h4 class="card-title">
                                {{ \Illuminate\Support\Str::limit($blog->blog_name ?? '', 50, ' ...') }}</h4>
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
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</div>
