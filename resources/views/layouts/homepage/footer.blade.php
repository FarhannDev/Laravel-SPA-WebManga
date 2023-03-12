<!-- Footer Start -->
<div class="container-fluid bg-primary text-light footer wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5 px-lg-5">
        <div class="row justify-content-between g-5">
            <div class="col-md-6 col-lg-6">
                <p class="section-title text-white h5 mb-4">Address<span></span></p>
                <p><i class="fa fa-map-marker-alt me-3"></i>Bekasi, Jawa Barat Indonesia</p>
                <p><i class="fa fa-phone-alt me-3"></i>+62 821-2430-1984</p>
                <p><i class="fa fa-envelope me-3"></i>zaotaku3108@gmail.com</p>
                {{-- <div class="d-flex pt-2">
                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-instagram"></i></a>
                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                </div> --}}
            </div>
            <div class="col-md-6 col-lg-6">
                <p class="section-title text-white h5 mb-4">Quick Link<span></span></p>
                <a class="btn btn-link" href="{{ route('aboutIndex') }}">Tentang Kami</a>
                <a class="btn btn-link" href="{{ route('contactIndex') }}">Pusat Bantuan</a>
                <a class="btn btn-link" href="{{ route('komikIndex') }}">Daftar Komik</a>
                <a class="btn btn-link" href="{{ route('blogIndex') }}">Blog</a>
            </div>
        </div>
    </div>
    <div class="container px-lg-5">
        <div class="copyright">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">{{ date('Y') }}
                    &copy; <a class="border-bottom" href="https://zaotaku.herokuapp.com/"> Zaotaku</a>, All Right
                    Reserved.</a> <br />
                    Develop By <a href="https://www.linkedin.com/in/farhan-20241221a/" class="text-white">Farhan</a>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <div class="footer-menu">
                        <a href="{{ route('homePageIndex') }}">Beranda</a>
                        <a href="{{ route('aboutIndex') }}">Tentang Kami</a>
                        <a href="{{ route('komikIndex') }}">Daftar Komik</a>
                        <a href="{{ route('blogIndex') }}">Blog</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->
