@extends('layouts.dashboard.index')

@section('breadcrumb')
    {{ Breadcrumbs::render('dashboard') }}
@endsection

@section('container')
    <div class="container-fluid">
        <div class="card p-3" style="border-radius: 8px;">

            <div class="d-flex flex-column mb-3 border-bottom">
                <h4 class="text-dark">Welcome Back , {{ Auth::user()->name }}</h4>
            </div>
            <div class="row">
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card  h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                        TOTAL KOMIK</div>
                                    <div class="h5 mb-0 font-books-bold text-gray-800">{{ $total_komik }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-book fa-3x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card  h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                        TOTAL ARTIKEL</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $total_artikel }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-blog fa-3x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card  h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                        TOTAL KOMUNITAS</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $total_komunitas }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-users fa-3x text-gray-300"></i>
                                </div>
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
