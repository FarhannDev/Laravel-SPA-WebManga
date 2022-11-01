     @include('layouts.homepage.navbar')
     <div class="container-xxl position-relative p-0">
         <div class="container-xxl py-5 bg-primary hero-header">

         </div>
         <div class="container py-5 px-lg-5">

             <div class="row justify-content-arround align-content-center mb-5">
                 <div class="col-lg-4 col-md-6">
                     <div class="input-group mb-3">
                         <input type="text" class="form-control" placeholder="Search Komik Name"
                             aria-label="Search Komik Name" aria-describedby="button-addon2">
                     </div>
                 </div>
                 <div class="col-lg-4 col-md-6">
                     <select class="form-select" aria-label="Default select example">
                         <option selected>Selected Genre</option>
                         <option value="1">One</option>
                     </select>
                 </div>
                 <div class="col-lg-4 col-md-6">
                     <select class="form-select" aria-label="Default select example">
                         <option selected>Selected Status</option>
                         <option value="1">One</option>
                     </select>
                 </div>
             </div>

             <div class="row justify-content-arround g-4 portfolio-container">

                 @if (!is_null($comics))
                     @foreach ($comics as $comic)
                         <div class="col-lg-4 col-md-6 portfolio-item first wow fadeInUp" data-wow-delay="0.1s">
                             <div class="rounded overflow-hidden">
                                 <div class="position-relative overflow-hidden">
                                     <img class="img-fluid w-100" src="{{ asset('images/' . $comic->comic_cover) }}"
                                         style="height: 350px;">
                                 </div>
                                 <div class="bg-light p-4">
                                     <div class="d-flex flex-wrap justify-content-end align-items-center mb-3">
                                         <a href=""
                                             class="ls-base btn btn-primary btn-sm rounded-pill mx-2">{{ $comic->genre['genre_name'] }}</a>
                                         <a href=""
                                             class="ls-base btn btn-primary btn-sm rounded-pill">ongoing</a>
                                     </div>
                                     <h5 class="lh-base mb-0">{{ $comic->comic_title }}</h5>

                                     <a href="{{ route('komikShow', $comic->comic_slug) }}"
                                         class="ls-base btn btn-primary w-100 d-block mt-3">Details <span
                                             class="fas fa-arrow-right"></span></a>
                                 </div>
                             </div>
                         </div>
                     @endforeach
                 @endif

             </div>
         </div>
     </div>
