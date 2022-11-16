@extends('layouts.dashboard.index')

@section('breadcrumb')
    {{ Breadcrumbs::render('dashboard-author') }}
@endsection

@section('container')
    <div class="container-fluid" style="background-color: #fafafa;">
        <div class="d-flex justify-content-end mb-3">
            <a href="https://zaotaku.herokuapp.com/" class="btn btn-link text-dark">
                Buka Situs Zaotaku
            </a>
        </div>
        <hr />
        <div class="d-flex flex-column mb-3 ">
            <h4 class="text-dark">Selamat Datang Kembali , {{ Auth::user()->name }}</h4>
        </div>
        <div class="row">
            <div class="col-xl-6 col-md-6 mb-4">
                <div class="card  h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                    TOTAL SEMUA ARTIKEL</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $total_artikel }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-blog fa-3x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-md-6 mb-4">
                <div class="card  h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                    ARTIKEL DITERBITKAN</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $total_blog_publish }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-globe fa-3x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-md-6 mb-4">
                <div class="card  h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                    ARTIKEL TIDAK DITERBITKAN</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $total_blog_unpublish }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-bookmark fa-3x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('javascript')
    <!-- Page level plugins -->
    <script src="{{ asset('assets/vendor/chart.js/Chart.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('assets/js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('assets/js/demo/chart-pie-demo.js') }}"></script>
@endpush
