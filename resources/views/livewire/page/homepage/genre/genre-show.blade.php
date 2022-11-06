<div class="container-xxl position-relative p-0 mb-3" style="padding-top: 5rem;">
    <div class="container py-5 px-lg-5">
        <div class="row justify-content-center">
            <div class="col">
                <h5 class="text-dark text-capitalize">
                    Genre {{ $genre_name }}
                </h5>
            </div>
        </div>
        <div class="row justify-content-arround g-4 portfolio-container">
            @if (!is_null($comics))
                @foreach ($comics as $comic)
                    <div class="col-lg-4 col-md-6 portfolio-item first wow fadeInUp" data-wow-delay="0.1s">
                        <div class="rounded overflow-hidden ">
                            <div class="position-relative overflow-hidden">
                                <a href="{{ route('komikShow', $comic->comic_slug) }}">
                                    <img class="img-fluid w-100" src="{{ asset('images/' . $comic->comic_cover) }}"
                                        style="height: 500px;">
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>
