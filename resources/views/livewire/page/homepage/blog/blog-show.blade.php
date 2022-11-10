<div class="container-xxl position-relative p-0">
    <div class="container py-3 px-lg-5">
        <div class="d-flex justify-content-end mb-3 pt-5">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('homePageIndex') }}">Beranda</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('blogIndex') }}"> Daftar Blog</a></li>
                    <li class="breadcrumb-item active" aria-current="page"> {!! \Illuminate\Support\Str::limit($blog_name ?? '', 50, ' ...') !!}</li>
                </ol>
            </nav>
        </div>
        <div class="row justify-content-center align-content-center ">
            <div class="col-lg-10">
                <div class="blog-details">
                    <div class="d-flex justify-content-arround">
                        <div class="action-detail__back  pt-3 mb-3">
                            <a href="{{ route('blogIndex') }}" class="ls-base text-dark">
                                <span class="fas fa-arrow-left"> Kembali</span>
                            </a>
                        </div>
                    </div>
                    <div class="blog-details__image">
                        <img src="{{ asset($blog_cover ? 'images/blog/' . $blog_cover : 'images/blog/default.jpg') }}"
                            width="100%" style="max-width: 100%;" class="img-fluid">
                    </div>
                    <div class="card mb-3  pt-3 p-3" style="border-radius: 0px 0px 8px 8px; overflow: auto;">
                        <div class="blog-details__title mb-5">
                            <div class="blog-details__title-name">
                                <h3 class="text-dark">
                                    <div>
                                        {{ $blog_name }}
                                    </div>
                                </h3>
                            </div>
                            <div class="blog-details__title-author">
                                <span class="fas fa-user font-weight-normal mr-2 ml-2"
                                    style="font-weight: 300; font-size: 16px;"> Di
                                    tulis oleh:
                                    <em class="text-dark" style="font-style: normal"> {{ $blog_by_user }}</em> -
                                    {{ date('d M Y', strtotime($blog_created)) }}</span>
                            </div>
                        </div>
                        <div class="blog-details__desc mb-3">
                            {!! $blog_desc !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container px-lg-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card p-3"
                    style="background-color: #fff; border-radius: 12px; height: 500px; overflow: hidden;">
                    <div class="d-flex justify-content-center">
                        <div class="text-center mb-3">
                            <div class="author-image ">
                                <figure class="figure">
                                    <img src="{{ asset('assets/img/profile/undraw_profile_2.svg') }}"
                                        class="rounded mx-auto d-block" width="250">
                                    <figcaption class="figure-caption pt-2">{{ $blog_by_user }}</figcaption>
                                </figure>
                            </div>
                            <div class="author-desc mt-3 mb-3">
                                <p>Halo, saya adalah admin zaotaku saya suka menulis sesuatu dan menceritakan langsung
                                    disini...</p>
                            </div>
                            <div class="author-sociallinks">
                                <div class="d-flex justify-content-center flex-wrap">
                                    <a href="https://www.linkedin.com/in/farhan-20241221a/">
                                        <i class="fab fa-facebook mx-2"></i></a>
                                    <a href="https://www.linkedin.com/in/farhan-20241221a/"> <i
                                            class="fab fa-instagram mx-2"></i></a>
                                    <a href="https://www.linkedin.com/in/farhan-20241221a/">
                                        <i class="fab fa-linkedin mx-2"></i></a>
                                    <a href="https://www.linkedin.com/in/farhan-20241221a/">
                                        <i class="fab fa-twitter mx-2"></i>
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>



</div>
