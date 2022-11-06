     <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
         <!-- Sidebar - Brand -->
         <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
             <div class="sidebar-brand-text mx-3">{{ config('app.name', 'Laravel') }}</div>
         </a>

         <!-- Divider -->
         <hr class="sidebar-divider my-0">

         <!-- Nav Item - Dashboard -->
         <li class="nav-item ">
             <a class="nav-link" href="">
                 <i class="fas fa-fw fa-tachometer-alt"></i>
                 <span>Dashboard</span></a>
         </li>
         <!-- Divider -->
         <hr class="sidebar-divider">

         <!-- Heading -->
         <div class="sidebar-heading">
             Management All Data
         </div>
         <li class="nav-item {{ Route::is('manageKomik') ? 'active' : '' }}">
             <a class="nav-link" href="{{ route('manageKomik') }}">
                 <i class="fas fa-fw fa-book"></i>
                 <span>Komik</span></a>
         </li>
         <li class="nav-item {{ Route::is('manageBlogIndex') ? 'active' : '' }}">
             <a class="nav-link" href="{{ route('manageBlogIndex') }}">
                 <i class="fas fa-fw fa-blog"></i>
                 <span>Blog</span></a>
         </li>
         <li class="nav-item">
             <a class="nav-link" href="#">
                 <i class="fas fa-fw fa-book"></i>
                 <span>Service</span></a>
         </li>
         <li class="nav-item">
             <a class="nav-link" href="#">
                 <i class="fas fa-fw fa-book"></i>
                 <span>Teams</span></a>
         </li>
         <!-- Divider -->
         <hr class="sidebar-divider d-none d-md-block m-0">
         <li class="nav-item">
             <a class="nav-link" href="#">
                 <i class="fas fa-fw fa-sign-out-alt"></i>
                 <span>Logout</span></a>
         </li>
         <!-- Sidebar Toggler (Sidebar) -->
         <div class="text-center d-none d-md-inline">
             <button class="rounded-circle border-0" id="sidebarToggle"></button>
         </div>

     </ul>
