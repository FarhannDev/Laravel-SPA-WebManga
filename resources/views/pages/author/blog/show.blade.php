@extends('layouts.dashboard.index')
@section('breadcrumb')
    {{ Breadcrumbs::render('author-blog-detail', $blogs) }}
@endsection
@section('container')
    <div class="card mx-3" style="border-radius: 8px; background-color: #fff;">
        <div class="row">
            <div class="col">
                <div class="dashboard">
                    <div class="dashboard-inner">
                        <div class="dashboard-inner__actionback pt-3 mb-3 border-bottom">
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('authorBlog') }}" class="btn btn-link text-dark text-decoration-none">
                                    <span class="fas fa-arrow-left"></span> {{ __('Kembali') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="dashboard-inner__desc">
                        <div class="dashboard-inner__desc__image">
                            <div class="row justify-content-center align-content-center">
                                <img src="{{ $blogs->blog_cover_link }}" style="max-width: 100%; width: 350px;"
                                    class="img-fluid" alt="{{ $blogs->blog_name }}">
                            </div>
                        </div>
                        <div class="dashboard-inner__desc__text pt-5 p-3">
                            <div class="row justify-content-center align-content-center">
                                <div class="col-lg-8">
                                    <h3 class="text-dark text-capitalize">
                                        {{ $blogs->blog_name }}
                                    </h3>
                                </div>
                            </div>
                            <div class="row justify-content-center align-content-center">
                                <div class="col-lg-8">
                                    <div>
                                        {!! $blogs->blog_desc !!}
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
