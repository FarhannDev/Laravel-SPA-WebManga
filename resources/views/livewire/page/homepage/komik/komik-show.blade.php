<div class="container-xxl position-relative p-0">
    <div class="container pt-3 mb-3 px-lg-5">
        <div class="card p-3" style="border-radius: 8px;">
            <div class="d-flex justify-content-arround ">
                <div class="action-detail__back pt-3">
                    <a href="{{ route('komikIndex') }}" class="ls-base text-dark">
                        <span class="fas fa-arrow-left"> Kembali</span>
                    </a>
                </div>
            </div>
            <hr />
            <div class="d-flex justify-content-end mb-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('homePageIndex') }}">Beranda</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('komikIndex') }}"> Daftar Komik</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> {!! \Illuminate\Support\Str::limit($comic_title ?? '', 50, ' ...') !!}</li>
                    </ol>
                </nav>
            </div>
            <div class="row justify-content-arround  align-content-center">
                <div class="col-lg-4 col-md-6 mb-3">
                    <img src="{{ asset($comic_cover ? 'images/komik/' . $comic_cover : 'images/blog/default.jpg') }}"
                        class="img-fluid rounded" width="350" alt="{{ $comic_title }}">
                </div>
                <div class="col-lg-8 col-md-6">
                    <div class="detail-info">
                        <div class="detail-info__title">
                            <h5 class="text-dark text-capitalize px-3">
                                Komik: {{ $comic_title }}
                            </h5>
                        </div>
                        <hr />
                        <div class="detail-info__list">
                            <div class="row justify-content-between align-content-center">
                                <div class="col-lg-8 col-md-6">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">Title : {{ $comic_title }}</li>
                                        <li class="list-group-item">Genre : {{ $comic_genre }}</li>
                                        <li class="list-group-item">Author : {{ $comic_author }}</li>
                                        <li class="list-group-item">Artist : {{ $comic_artist }}</li>
                                        <li class="list-group-item">Release : {{ $comic_released }}</li>
                                    </ul>
                                </div>

                                <div class="col-lg-4 col-md-6">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">Rating : {{ $comic_rating }}</li>
                                        <li class="list-group-item">Total Volume:
                                            {{ $volumes->count() ? $volumes->count() : '-' }}</li>
                                        <li class="list-group-item">Total Chapter: -</li>
                                        <li class="list-group-item">Status: Oungoing</li>
                                    </ul>
                                </div>

                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="container py-3 px-lg-5">
        <div class="row justify-content-arround align-content-center">
            <div class="col-lg-6 col-md-6">
                <div class="card p-3 mb-3"
                    style="background-color: #fff; border-radius: 12px; height: 300px; overflow: auto;">
                    <div class="sinopsis p-2">
                        <div class="sinopsis-title">
                            <h5>
                                {{ __('Sinopsis') }}
                            </h5>
                        </div>
                        <hr />
                        <div class="detail-sinopsis__text text-justify">
                            {!! $comic_sinopsis !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="card p-3"
                    style="background-color: #fff; border-radius: 12px; height: 300px; overflow: auto;">
                    <div class="sinopsis p-2">
                        <div class="sinopsis-title">
                            <h5>
                                {{ __('Alternative Name') }}
                            </h5>
                        </div>
                        <hr />
                        <div class="detail-sinopsis__text text-justify">
                            {!! $comic_alternative !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container py-2 px-lg-5">
        <div class="card p-3" style="background-color: #fff; border-radius: 12px; height: 300px; overflow: auto;">
            <div class="row justify-content-arround">
                <div class="col">
                    <div class="detail-volumes">
                        <div class="detail-volumes__title text-center">
                            <h5>
                                Donwload Volume
                            </h5>
                        </div>
                        <hr />
                        <div class="row justify-content-center mb-3">
                            <div class="col">
                                @if (!$volumes->count())
                                    <div class="d-flex justify-content-center pt-5">
                                        <p class="text-dark px-3">
                                            Volume belum tersedia.
                                        </p>
                                    </div>
                                @else
                                    <div class="detail-volumes__list p-3">
                                        <table class="table table-striped" style="width:100%" id="example">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Volume Name</th>
                                                    <th scope="col" class="text-center">Download
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($volumes as $volume)
                                                    <tr>
                                                        <td class="align-middle">
                                                            {{ $volume->volume_name }}
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <a download target="_blank"
                                                                href="{{ $volume->volume_link }}" style="border: none;"
                                                                class="ls-base text-dark">
                                                                <span class="fas fa-download"></span>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
