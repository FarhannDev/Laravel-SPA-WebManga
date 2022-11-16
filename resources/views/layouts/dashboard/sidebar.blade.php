     <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #c22dba;">
         <!-- Sidebar - Brand -->
         <a class="sidebar-brand d-flex align-items-center " href="{{ route('manageDashboard') }}">
             <div class="sidebar-brand-text mx-3">Zaotaku Dashboard</div>
         </a>

         <!-- Divider -->
         <hr class="sidebar-divider ">

         <!-- Nav Item - Dashboard -->
         <li class="nav-item {{ Route::is('manageDashboard') ? 'active' : '' }}">
             <a class="nav-link" href="{{ route('manageDashboard') }}">
                 <i class="fas fa-fw fa-chart-line"></i>
                 <span>Dashboard</span></a>
         </li>
         <!-- Divider -->
         <hr class="sidebar-divider">
         <li class="nav-item">
             <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse"
                 aria-expanded="true" aria-controls="collapse">
                 <i class="fas fa-fw fa-users"></i>
                 <span>Manage Data Users</span>
             </a>
             <div id="collapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                 <div class="bg-white py-2 collapse-inner rounded">
                     <h6 class="collapse-header">Manage Data Users:</h6>
                     <a class="collapse-item" href="{{ route('manageUserIndex') }}">Daftar User</a>
                     {{-- <a class="collapse-item" href="{{ route('manageAuthorIndex') }}">Author</a> --}}
                 </div>
             </div>
         </li>
         <li class="nav-item">
             <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                 aria-expanded="true" aria-controls="collapseTwo">
                 <i class="fas fa-fw fa-book"></i>
                 <span>Manage Data Komik</span>
             </a>
             <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                 <div class="bg-white py-2 collapse-inner rounded">
                     <h6 class="collapse-header">Manage Data Komik:</h6>
                     {{-- <a class="collapse-item" href="">Genre</a> --}}
                     <a class="collapse-item" href="{{ route('manageKomik') }}">Daftar Komik</a>
                     <a class="collapse-item" href="{{ route('manageGenreIndex') }}">Genre </a>
                     <a class="collapse-item" href="{{ route('manageVolumeIndex') }}">Volumes </a>
                 </div>
             </div>
         </li>
         <li class="nav-item">
             <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree"
                 aria-expanded="true" aria-controls="collapseThree">
                 <i class="fas fa-fw fa-blog"></i>
                 <span>Manage Data Blog</span>
             </a>
             <div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                 <div class="bg-white py-2 collapse-inner rounded">
                     <h6 class="collapse-header">Manage Data Blog:</h6>
                     <a class="collapse-item" href="{{ route('manageBlogIndex') }}">Daftar Blog</a>
                     <a class="collapse-item" href="{{ route('manageBlogPublish') }}">Publish</a>
                     <a class="collapse-item" href="{{ route('manageBlogDraft') }}">Unpublish</a>
                 </div>
             </div>
         </li>
         <!-- Divider -->
         <hr class="sidebar-divider d-none d-md-block m-0">
         <li class="nav-item">
             <a class="nav-link" href="#"
                 onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                 <i class="fas fa-fw fa-sign-out-alt"></i>
                 <span>Logout</span></a>
         </li>
         <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
             @csrf
         </form>
         <!-- Sidebar Toggler (Sidebar) -->
         <div class="text-center d-none d-md-inline">
             <button class="rounded-circle border-0" id="sidebarToggle"></button>
         </div>

     </ul>
