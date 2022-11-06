<div class="container-xxl position-relative p-0" style="padding-top: 5em !important;">

    <div class="d-flex justify-content-arround border px-2">
        <div class="action-detail__back px-3 pt-3 mb-3">
            <a href="{{ route('komikIndex') }}" class="ls-base text-dark">
                <span class="fas fa-arrow-left"> Kembali ke halaman komik</span>
            </a>
        </div>
    </div>
    <div class="container pt-5 mb-3 px-lg-5">
        <div class="card p-3" style="border-radius: 8px;">
            <div class="row justify-content-arround  align-items-center">
                <div class="col-lg-4 col-md-6 mb-3">
                    <img src="{{ asset('/images/default-komik.jpg') }}" class="img-fluid rounded" width="350"
                        alt="">
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
            <div class="row justify-content-between  align-items-center border-top ">
                <div class="col-lg-2">
                    <div class="detail-sinopsis__title p-3">
                        <h5 class="text-dark text-capitalize">
                            Sinopsis:
                        </h5>
                    </div>
                </div>
                <div class="col-lg-10 col-md-6">
                    <div class="detail-sinopsis__text p-3">
                        <p class="text-dark">{{ $comic_sinopsis }}</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-between align-items-center border-top ">
                <div class="col-lg-2">
                    <div class="detail-sinopsis__title p-3">
                        <h5 class="text-dark text-capitalize">
                            Alternative Name:
                        </h5>
                    </div>
                </div>
                <div class="col-lg-10 col-md-6">
                    <div class="detail-sinopsis__text p-3">
                        <p class="text-dark">{!! $comic_alternative !!} </p>
                    </div>
                </div>
            </div>
            <div class="row border-top">
                <div class="col-lg-12">
                    <div class="detail-volumes">
                        <div class="row justify-content-center mb-3">
                            <div class="col">
                                <div class="detail-volume__title text-center pt-3">
                                    <h5 class="text-dark">
                                        Donwload Volume <span class="fas fa-download"></span>
                                    </h5>
                                </div>
                                @if (!$volumes->count())
                                    <div class="d-flex justify-content-center pt-3">
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
                                                    <th scope="col" class="text-center">Download</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach ($volumes as $volume)
                                                    <tr>
                                                        <td class="align-middle">{{ $volume->volume_name }}
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <a href="" class="ls-base text-dark">
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
                    <div class="detail-volume__pagination">
                        {{ $volumes->links() }}
                    </div>
                </div>
            </div>
        </div>

    </div>
    {{-- <div class="container px-lg-5">
        <div class="card" style="border-radius: 12px;">
            <div class="detail-volumes">
                <div class="row justify-content-center mb-3">
                    <div class="col">
                        <div class="detail-volume__title text-center pt-3">
                            <h5 class="text-dark">
                                Donwload Volume <span class="fas fa-download"></span>
                            </h5>
                        </div>
                        <hr />

                        @if (!$volumes->count())
                            <div class="d-flex justify-content-center pt-3">
                                <p class="text-dark px-3">
                                    Volume {{ $comic_title }} belum tersedia.
                                </p>
                            </div>
                        @else
                            <div class="detail-volumes__list p-3">
                                <table class="table table-striped" style="width:100%" id="example">
                                    <thead>
                                        <tr>
                                            <th scope="col">Volume Name</th>
                                            <th scope="col" class="text-center">Download</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($volumes as $volume)
                                            <tr>
                                                <td class="align-middle">{{ $volume->volume_name }}
                                                </td>
                                                <td class="align-middle text-center">
                                                    <a href="" class="ls-base text-dark">
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
    </div> --}}

</div>
