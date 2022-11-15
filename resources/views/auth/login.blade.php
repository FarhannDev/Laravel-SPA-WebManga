 @extends('layouts.login.index')

 @section('content')
     <div class="container">
         <div class="row justify-content-end align-self-center pt-5 mt-3">
             <div class="col-lg-4">
                 <div class="d-flex flex-column mb-3">
                     <img src="{{ asset('images/logo/zaotaku-logo.png') }}" width="250" alt="Zaotaku Logo">
                 </div>
                 <div class="d-flex flex-column">
                     <div class="card rounded" style="height: 350px;">
                         <div class="card-body">
                             <div class="d-flex justify-content-arround align-items-center border-bottom mb-3">
                                 <a href="{{ route('homePageIndex') }}" class="btn btn-link text-dark text-decoration-none">
                                     <span class="fas fa-arrow-left mr-2"></span> Kembali Ke Beranda
                                 </a>
                             </div>
                             <div class="row py-3">
                                 <div class="col">
                                     <div class="login-form ">
                                         @if (session()->has('error'))
                                             <div class="alert alert-danger" role="alert">
                                                 {{ session()->get('error') }}
                                             </div>
                                         @endif
                                         <form method="POST" action="{{ route('login') }}">
                                             @csrf
                                             <div class="form-group mb-2">
                                                 <label for="email mb-2">{{ __('Email Address') }}</label>
                                                 <input type="email"
                                                     class="form-control @error('email') is-invalid @enderror"
                                                     id="email" name="email" value="{{ old('email') }}" required
                                                     autocomplete="email">
                                                 @error('email')
                                                     <span class="invalid-feedback" role="alert">
                                                         <strong>{{ $message }}</strong>
                                                     </span>
                                                 @enderror
                                             </div>
                                             <div class="form-group">
                                                 <label for="password">Password</label>
                                                 <input type="password"
                                                     class="form-control @error('password') is-invalid @enderror"
                                                     id="password" name="password" required
                                                     autocomplete="current-password">
                                                 @error('password')
                                                     <span class="invalid-feedback" role="alert">
                                                         <strong>{{ $message }}</strong>
                                                     </span>
                                                 @enderror
                                             </div>
                                             <div class="form-group pt-3 mb-3 pt-3">
                                                 <div class="d-block ">
                                                     <button type="submit"
                                                         class="btn rounded-pill w-100 btn-dark">{{ __('Login') }}</button>
                                                 </div>
                                             </div>
                                         </form>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 @endsection
