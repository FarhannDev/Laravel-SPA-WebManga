         <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
             <a href="{{ route('homePageIndex') }}" class="navbar-brand p-0">
                 <h1 class="m-0 text-monospace">{{ 'Zaotaku' }}</h1>
                 <!-- <img src="img/logo.png" alt="Logo"> -->
             </a>
             <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                 <span class="fa fa-bars"></span>
                 <small>Menu</small>
             </button>
             <div class="collapse navbar-collapse" id="navbarCollapse">
                 <div class="navbar-nav mx-auto py-0">
                     <a href="{{ route('homePageIndex') }}"
                         class="nav-item mx-md-3 nav-link {{ Route::is('homePageIndex') ? 'active' : '' }}">Home</a>
                     <a href="{{ route('komikIndex') }}"
                         class="nav-item mx-md-3 nav-link {{ Route::is('komikIndex') ? 'active' : '' }}">Daftar
                         Komik</a>
                     <a href="{{ route('aboutIndex') }}"
                         class="nav-item mx-md-3 nav-link {{ Route::is('aboutIndex') ? 'active' : '' }}">About Us</a>
                     <a href="{{ route('blogIndex') }}"
                         class="nav-item mx-md-3 nav-link {{ Route::is('blogIndex') ? 'active' : '' }} ">Blog</a>
                     <a href="" class="nav-item mx-md-3 nav-link ">Event</a>
                     <a href="{{ route('contactIndex') }}"
                         class="nav-item mx-md-3 nav-link {{ Route::is('contactIndex') ? 'active' : '' }}">Contact
                         Us</a>
                     {{-- <a href="{{ route('communityIndex') }}"
                         class="nav-item mx-md-3 nav-link {{ Route::is('communityIndex') ? 'active' : '' }}">Community
                     </a> --}}
                     {{-- <div class="nav-item dropdown">
                         <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Daftar Manga</a>
                         <div class="dropdown-menu m-0">
                             <a href="{{ route('komikIndex') }}"
                                 class="dropdown-item {{ Route::is('komikIndex') ? 'active' : '' }}">Manga komik</a>
                             <a href="{{ route('komikVidio') }}"
                                 class="dropdown-item {{ Route::is('komikVidio') ? 'active' : '' }}">Manga Vidio</a>
                         </div>
                     </div> --}}
                 </div>

             </div>
         </nav>
