@extends('layouts.dashboard.index')

@push('css')
    <style>
        .project-tab {
            padding: 0;
        }

        .project-tab #tabs {
            background: #007b5e;
            color: #eee;
        }

        .project-tab #tabs h6.section-title {
            color: #eee;
        }

        .project-tab #tabs .nav-tabs .nav-item.show .nav-link,
        .nav-tabs .nav-link.active {
            color: #0062cc;
            background-color: transparent;
            border-color: transparent transparent #f3f3f3;
            border-bottom: 3px solid !important;
            font-size: 16px;
            font-weight: bold;
        }

        .project-tab .nav-link {
            border: 1px solid transparent;
            border-top-left-radius: .25rem;
            border-top-right-radius: .25rem;
            color: #0062cc;
            font-size: 16px;
            font-weight: 600;
        }

        .project-tab .nav-link:hover {
            border: none;
        }

        .project-tab thead {
            background: #f3f3f3;
            color: #333;
        }

        .project-tab a {
            text-decoration: none;
            color: #333;
            font-weight: 600;
        }

        table td[class*=col-],
        table th[class*=col-] {
            position: static;
            display: table-cell;
            float: none;
        }
    </style>
@endpush

@section('container')
    <div class="d-flex justify-content-end mx-3">
        {{ Breadcrumbs::render('komik-detail', $comic) }}
    </div>
    <div class="card mx-3" style="border-radius: 8px; background-color: #fff;">
        <div class="row">
            <div class="col">
                <div class="dashboard">

                    @if (session()->has('message_success'))
                        <div class="notification-feedback">
                            <div class="alert alert-success alert-dismissible fade show" role="alert"
                                style="border-radius: 0;">
                                {{ session()->get('message_success') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                    @endif

                    <div class="dashboard-inner">
                        <div class="dashboard-inner__actionback pt-3 mb-3 border-bottom">
                            <a href="{{ route('manageKomik') }}" class="btn btn-link text-dark text-decoration-none">
                                <span class="fas fa-arrow-left"></span> {{ __('Kembali Ke Halaman Daftar Komik') }}
                            </a>
                        </div>
                    </div>
                    <div class="dashboard-inner__item px-3 mb-3">
                        <div class="dashboard-item__list">
                            <div class="row justify-content-arround align-items-center">
                                <div class="col">
                                    <div class="row project-tab">
                                        <div class="col-md-12">
                                            <nav>
                                                <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab"
                                                        href="#nav-home" role="tab" aria-controls="nav-home"
                                                        aria-selected="true">Komik Details</a>
                                                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab"
                                                        href="#nav-profile" role="tab" aria-controls="nav-profile"
                                                        aria-selected="false">Volumes List</a>
                                                </div>
                                            </nav>
                                            <div class="tab-content" id="nav-tabContent">
                                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                                    aria-labelledby="nav-home-tab">
                                                    <div class="d-flex justify-content-end mx-2 mb-3 mt-3">
                                                        <a href="{{ route('manageKomikEdit', $comic->comic_slug) }}"
                                                            class="btn btn-danger text-white"><i class="fas fa-edit"></i>
                                                            Edit</a>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="table-responsive">
                                                                <table class="table table-striped table-bordered "
                                                                    style="width:100%;">
                                                                    <tbody>
                                                                        <tr class="d-flex">
                                                                            <th
                                                                                class="col-6 d-flex justify-content-between align-items-center">
                                                                                Cover:</th>
                                                                            <td class="col-6 px-3"><img
                                                                                    src="{{ asset($comic->comic_cover ? 'images/komik/' . $comic->comic_cover : 'images/default-komik.jpg') }}"
                                                                                    width="250" class="rounded img-fluid"
                                                                                    alt=""></td>
                                                                        </tr>
                                                                        <tr class="d-flex">
                                                                            <th class="col-6"> Name:</th>
                                                                            <td class="col-6">{{ $comic->comic_title }}
                                                                            </td>
                                                                        </tr>
                                                                        <tr class="d-flex">
                                                                            <th class="col-6"> Author:</th>
                                                                            <td class="col-6">{{ $comic->comic_author }}
                                                                            </td>
                                                                        </tr>
                                                                        <tr class="d-flex">
                                                                            <th class="col-6"> Artist:</th>
                                                                            <td class="col-6">{{ $comic->comic_artist }}
                                                                            </td>
                                                                        </tr>
                                                                        <tr class="d-flex">
                                                                            <th class="col-6"> Rating:</th>
                                                                            <td class="col-6">{{ $comic->comic_rating }}
                                                                            </td>
                                                                        </tr>
                                                                        <tr class="d-flex align-items-center">
                                                                            <th class="col-6 d-flex align-items-center ">
                                                                                Released
                                                                                Date:
                                                                            </th>
                                                                            <td class="col-6">
                                                                                {{ date('m/d/y', strtotime($comic->comic_released)) }}
                                                                            </td>
                                                                        </tr>
                                                                        <tr class="d-flex">
                                                                            <th class="col-6"> Alternative Name:</th>
                                                                            <td class="col-6">
                                                                                {!! $comic->comic_alternative !!}
                                                                            </td>
                                                                        </tr>
                                                                        <tr class="d-flex">
                                                                            <th class="col-6"> Sinopsis :</th>
                                                                            <td class="col-6">
                                                                                {!! $comic->comic_sinopsis !!}
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>

                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="tab-pane fade" id="nav-profile" role="tabpanel"
                                                    aria-labelledby="nav-profile-tab">
                                                    <div class="d-flex flex-wrap mb-3 pt-3">
                                                        <a href="#" data-toggle="modal" data-target="#exampleModal"
                                                            class="btn btn-dark btn-md text-white">
                                                            Buat Volume Baru <span class="fas fa-plus"></span>
                                                        </a>
                                                    </div>
                                                    <div class="table-responsive">
                                                        <table class="table table-striped" style="width: 100%">
                                                            <tr>
                                                                <th scope="col">#</th>
                                                                <th scope="col">Volume Name</th>
                                                                <th scope="col" class="text-center">Created</th>
                                                            </tr>
                                                            <tbody>
                                                                @forelse ($volumes as $volume)
                                                                    <tr>
                                                                        <td class="align-middle">{{ $loop->iteration }}
                                                                        </td>
                                                                        <td class="align-middle">
                                                                            {{ $volume->volume_name }}
                                                                        </td>
                                                                        <td class="align-middle text-center">
                                                                            {{ date('d/m/y H:i:s', strtotime($volume->created_at)) }}
                                                                        </td>
                                                                    </tr>
                                                                @empty
                                                                    <tr class="d-flex justify-content-center">
                                                                        <td class="align-middle">
                                                                            <span class="font-weight-bold">Volume tidak
                                                                                tersedia.</span>
                                                                            <div class="mt-2">


                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                @endforelse
                                                            </tbody>
                                                        </table>

                                                        <div class="pt-3">
                                                            {{ $volumes->links() }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-dark" id="exampleModalLabel">Tambah Volume Baru
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('manageVolumeAdd', $comic->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="volume_name">Volume Name:</label>
                            <input type="text" name="volume_name"
                                class="form-control @error('volume_name') is-invalid @enderror"
                                value="{{ old('volume_name') }}" id="volume_name" required autocomplete="name">

                            @error('volume_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="volume_link">Volume Link:</label>
                            <input type="url" name="volume_link"
                                class="form-control  @error('volume_link') is-invalid @enderror"
                                value="{{ old('volume_link') }}" id="volume_link" required autocomplete="url">

                            @error('volume_link')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group pt-3 border-top">
                            <div class="d-flex justify-content-end">
                                <button type="button" class="btn btn-dark mr-2" data-dismiss="modal">Cancel</button>
                                <button style="background-color: #c22dba;" type="submit" class="btn text-white">Add
                                    Volume</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
