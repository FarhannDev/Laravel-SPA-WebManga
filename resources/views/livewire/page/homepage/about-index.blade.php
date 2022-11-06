<div class="container-xxl position-relative p-0 py-5">
    <div class="container py-5 px-lg-5">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                <h1 class="mb-5 text-dark ">Zaotaku - Situs Volume Download Manga</h1>
                <h5 class="mb-4 text-dark ">ZaOtaku merupakan situs download volume manga. Kamu bisa membaca beberapa
                    komik
                    yang kami update setiap hari secara gratis. Memiliki desain yang responsif dan modern, website
                    ini
                    adalah tempat terbaik untuk kalian yang biasa membaca satu volume lengkap.</h5>
            </div>
            <div class="col-lg-6">
                <img class="img-fluid wow zoomIn" data-wow-delay="0.5s" src="{{ asset('images/logo/zaotaku-logo.png') }}">
            </div>
        </div>
    </div>
    <div class="container py-5 px-lg-5">
        <div class="wow fadeInUp" data-wow-delay="0.1s">

            <h3 class="text-center mb-5">Pelayanan yang kami berikan</h3>
        </div>
        <div class="row justify-content-center g-4">
            @foreach ($services as $service)
                <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="feature-item bg-light rounded text-center p-4">
                        <i class="{{ $service->icon }}"></i>
                        <h5 class="mb-3">{{ $service->name }}</h5>
                        <p class="m-0"> {!! \Illuminate\Support\Str::limit($service->desc ?? '', 200, '') !!}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="container py-5 px-lg-5">
        <div class="d-flex justify-content-center mb-3">
            <div class="kategori">
                <div class="kategori-title">
                    <h3>Kumpulan Genre Lengkap & Terupdate</h3>
                </div>
            </div>
        </div>
        <div class="row justify-content-center g-4">
            @foreach ($genres as $genre)
                <div class="col-lg-2 col-md-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="feature-item bg-light rounded text-center p-4" style="height: 150px;">
                        {{-- <a href="{{ route('genreShow', $genre->genre_slug) }}"> --}}
                        <i class="fa fa-2x fa-bookmark text-primary mb-4"></i>
                        <h5 style="font-size: 16px;" class="mb-3">
                            {{ $genre->genre_name }}
                        </h5>
                        {{-- </a> --}}
                    </div>

                </div>
            @endforeach
        </div>
    </div>
    <div class="container py-5 px-lg-5">
        <div class="wow fadeInUp" data-wow-delay="0.1s">

            <h3 class="text-center mb-5">Bersama Dengan Tim Kami</h3>
        </div>
        <div class="row justify-content-arround g-4">
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="team-item bg-white shadow rounded">
                    <div class="team-item__image">
                        <img class="img-fluid mb-4" src="{{ asset('images/teams/teams1.jpg') }}">
                    </div>
                    <div class="team-item__info">
                        <div class="text-center border-bottom p-4">
                            <h5>Farhan</h5>
                            <span>Mahasiswa di universitas bina sarana informatika</span>
                        </div>
                        <div class="d-flex justify-content-center p-4">
                            <a class="btn btn-square mx-1" target="__blank" href=""><i
                                    class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-square mx-1" target="__blank" href=""><i
                                    class="fab fa-twitter"></i></a>
                            <a class="btn btn-square mx-1" target="__blank" href=""><i
                                    class="fab fa-instagram"></i></a>
                            <a class="btn btn-square mx-1" target="__blank"
                                href="https://www.linkedin.com/in/farhan-20241221a/"><i
                                    class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="team-item bg-white shadow rounded">
                    <div class="team-item__image">
                        <img class="img-fluid mb-4" src="{{ asset('images/teams/teams1.jpg') }}">
                    </div>
                    <div class="team-item__info">
                        <div class="text-center border-bottom p-4">
                            <h5>Farhan</h5>
                            <span>Mahasiswa di universitas bina sarana informatika</span>
                        </div>
                        <div class="d-flex justify-content-center p-4">
                            <a class="btn btn-square mx-1" target="__blank" href=""><i
                                    class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-square mx-1" target="__blank" href=""><i
                                    class="fab fa-twitter"></i></a>
                            <a class="btn btn-square mx-1" target="__blank" href=""><i
                                    class="fab fa-instagram"></i></a>
                            <a class="btn btn-square mx-1" target="__blank"
                                href="https://www.linkedin.com/in/farhan-20241221a/"><i
                                    class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="team-item bg-white shadow rounded">
                    <div class="team-item__image">
                        <img class="img-fluid mb-4" src="{{ asset('images/teams/teams1.jpg') }}">
                    </div>
                    <div class="team-item__info">
                        <div class="text-center border-bottom p-4">
                            <h5>Farhan</h5>
                            <span>Mahasiswa di universitas bina sarana informatika</span>
                        </div>
                        <div class="d-flex justify-content-center p-4">
                            <a class="btn btn-square mx-1" target="__blank" href=""><i
                                    class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-square mx-1" target="__blank" href=""><i
                                    class="fab fa-twitter"></i></a>
                            <a class="btn btn-square mx-1" target="__blank" href=""><i
                                    class="fab fa-instagram"></i></a>
                            <a class="btn btn-square mx-1" target="__blank"
                                href="https://www.linkedin.com/in/farhan-20241221a/"><i
                                    class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
