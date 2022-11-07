<div class="container-xxl position-relative p-0">
    <div class="container py-5 px-lg-5">
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
                                <span class="fas fa-arrow-left"> Kembali ke halaman sebelumnya</span>
                            </a>
                        </div>
                    </div>
                    <div class="blog-details__image">
                        <img src="https://4.bp.blogspot.com/-cLaYNBfwlHk/XGCrtANnA_I/AAAAAAAABsg/M1QserS5vm0abZ5OaKR7TuaTO3Bw9xehQCLcBGAs/s1600/landscape%2Bphotography.jpg"
                            width="100%" style="max-width: 100%;" class="img-fluid">
                    </div>
                    <div class="card mb-3  pt-3 p-3" style="border-radius: 0px 0px 8px 8px;">
                        <div class="blog-details__title mb-5">
                            <div class="blog-details__title-name">
                                <h3 class="text-dark">
                                    {{ $blog_name }}
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



</div>
