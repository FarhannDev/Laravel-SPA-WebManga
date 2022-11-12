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
</div>
