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
@section('breadcrumb')
    {{ Breadcrumbs::render('komik-detail', $comic) }}
@endsection

@section('container')
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
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('manageKomik') }}" class="btn btn-link text-dark text-decoration-none">
                                    <span class="fas fa-arrow-left"></span> {{ __('Kembali') }}
                                </a>
                                <div class="mx-3">
                                    <form action="{{ route('manageKomikDestroy', $comic->comic_slug) }}"
                                        onsubmit="return confirm('Are you sure you want to delete?')" method="post"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm mb-md-2"><i
                                                class="fas fa-trash-alt"></i></button>
                                        <a href="{{ route('manageKomikEdit', $comic->comic_slug) }}"
                                            class="btn btn-danger btn-sm mb-md-2"><i class="fas fa-edit"></i></a>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="dashboard-inner__item px-3 mb-3">
                        <div class="dashboard-item__list">
                            <div class="row">
                                <div class="col">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered " style="width:100%;">
                                            <tbody>
                                                <tr class="d-flex">
                                                    <th class="col-6 d-flex justify-content-between align-items-center">
                                                        Cover:</th>
                                                    <td class="col-6 px-3">
                                                        <img src="{{ !is_null($comic->comic_link_cover) ? $comic->comic_link_cover : asset('images/komik/default.jpg') }}"
                                                            width="150" class="rounded img-fluid" alt="">
                                                        {{-- <img
                                                            src="{{ asset($comic->comic_cover ? 'images/komik/' . $comic->comic_cover : 'images/komik/default.jpg') }}"
                                                            width="150" class="rounded img-fluid" alt="">
                                                         --}}
                                                    </td>
                                                </tr>
                                                <tr class="d-flex">
                                                    <th class="col-6"> Name:</th>
                                                    <td class="col-6">{{ $comic->comic_title }}
                                                    </td>
                                                </tr>
                                                <tr class="d-flex">
                                                    <th class="col-6"> Genre:</th>
                                                    <td class="col-6">
                                                        @foreach (json_decode($comic->comic_genre) as $data)
                                                            <span class="text-dark">{{ $data }}, </span>
                                                        @endforeach
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
