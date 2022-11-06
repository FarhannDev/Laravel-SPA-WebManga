<div class="container py-5 px-lg-5" style="padding-top: 10em !important;">

    <div class="d-flex justify-content-between align-items-center  mb-5">
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

    <div class="row justify-content-arround align-content-center">
        @foreach ($blogs as $blog)
            <div class="col-lg-4 col-md-6">
                <div class="card mb-3">
                    <a href="#">
                        <img class="card-img-top"
                            src="https://images.unsplash.com/photo-1535025639604-9a804c092faa?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=6cb0ceb620f241feb2f859e273634393&auto=format&fit=crop&w=500&q=80"
                            alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">
                                {{ \Illuminate\Support\Str::limit($blog->blog_name ?? '', 50, ' ...') }}</h5>
                            <div class="text-dark">
                                {!! \Illuminate\Support\Str::limit($blog->blog_desc ?? '', 100, ' ...') !!}
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
