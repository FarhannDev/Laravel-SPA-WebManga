         <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
             <a href="{{ route('homePageIndex') }}" class="navbar-brand p-0">
                 <img src="{{ asset('images/logo/zaotaku-logo.png') }}" alt="">
                 {{-- <h1 class="m-0 text-monospace">{{ 'Zaotaku' }}</h1> --}}
                 <!-- <img src="img/logo.png" alt="Logo"> -->
             </a>
             <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                 <span class="fa fa-bars"></span>
                 <small>Menu</small>
             </button>
             <div class="collapse navbar-collapse  justify-content-between align-items-center" id="navbarCollapse">
                 <div class="navbar-nav mx-auto py-0">
                     <a href="{{ route('homePageIndex') }}"
                         class="nav-item mx-md-3 nav-link {{ Route::is('homePageIndex') ? 'active' : '' }}">Beranda</a>
                     <a href="{{ route('komikIndex') }}"
                         class="nav-item mx-md-3 nav-link {{ Route::is('komikIndex') ? 'active' : '' }}">Daftar
                         Komik</a>
                     <a href="{{ route('blogIndex') }}"
                         class="nav-item mx-md-3 nav-link {{ Route::is('blogIndex') ? 'active' : '' }} ">Blog</a>
                     {{-- <a href="{{ route('communityIndex') }}"
                         class="nav-item mx-md-3 nav-link  {{ Route::is('communityIndex') ? 'active' : '' }}">Komunitas</a> --}}
                     <a href="{{ route('aboutIndex') }}"
                         class="nav-item mx-md-3 nav-link {{ Route::is('aboutIndex') ? 'active' : '' }}">Tentang
                         Kami</a>
                     <a href="{{ route('contactIndex') }}"
                         class="nav-item mx-md-3 nav-link {{ Route::is('contactIndex') ? 'active' : '' }}">Pusat
                         Bantuan</a>
                 </div>
                 {{-- <div class="navbar-nav py-0">
                     <a href="{{ route('login') }}" class=" btn btn-secondary rounded-pill me-3">Bergabung Komunitas
                     </a>
                 </div> --}}
             </div>
         </nav>
