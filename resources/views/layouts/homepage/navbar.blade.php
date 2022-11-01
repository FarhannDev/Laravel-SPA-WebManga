         <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
             <a href="" class="navbar-brand p-0">
                 <h1 class="m-0 text-monospace">{{ 'Zaotaku' }}</h1>
                 <!-- <img src="img/logo.png" alt="Logo"> -->
             </a>
             <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                 <span class="fa fa-bars"></span>
             </button>
             <div class="collapse navbar-collapse" id="navbarCollapse">
                 <div class="navbar-nav mx-auto py-0">
                     <a href="{{ route('homePageIndex') }}"
                         class="nav-item mx-md-3 nav-link {{ Route::is('homePageIndex') ? 'active' : '' }}">Beranda</a>
                     <a href="{{ route('komikIndex') }}"
                         class="nav-item mx-md-3 nav-link {{ Route::is('komikIndex') ? 'active' : '' }} ">Daftar
                         Komik</a>
                     <a href="{{ route('aboutIndex') }}"
                         class="nav-item mx-md-3 nav-link {{ Route::is('aboutIndex') ? 'active' : '' }}">Tentang
                         Kami</a>
                     <a href="{{ route('contactIndex') }}"
                         class="nav-item mx-md-3 nav-link {{ Route::is('contactIndex') ? 'active' : '' }}">Hubungi
                         Kami</a>
                 </div>
                 <a href="" class="btn rounded-pill py-2 px-4 ms-3 d-none d-lg-block">Bergabung Sekarang</a>
             </div>
         </nav>
