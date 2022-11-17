@extends('layouts.dashboard.index')

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
@endpush

@section('breadcrumb')
    {{ Breadcrumbs::render('data-komik') }}
@endsection

@section('container')
    <div class="card mx-2 p-3"
        style="border-radius: 12px; background-color: #fff; box-shadow: rgba(0, 0, 0, 0.09) 0px 3px 12px;">
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
                    <div class="dashboard-inner__item px-3 mb-3">
                        <div class="dashboard-inner__addbutton mb-3 ">
                            <a style="background-color: #c22dba;" href="{{ route('manageKomikCreate') }}"
                                class="btn text-white">
                                {{ __('Add New Komik') }} <span class="fas fa-edit"></span>
                            </a>
                        </div>
                        <div class="dashboard-item__list mb-3">
                            <div class="row justify-content-arround align-items-center">
                                <div class="col">
                                    <div class="table-responsive mb-3">
                                        <table class="table table-striped table-bordered" id="example" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col-lg-6">Title</th>
                                                    <th scope="col-lg-6">Genre</th>
                                                    <th scope="col-lg-6">Author</th>
                                                    <th scope="col">Artist</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Details</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($comics as $comic)
                                                    <tr>
                                                        <th scope="row" class="align-middle">
                                                            {{ $loop->iteration }}
                                                        </th>
                                                        <td class="align-middle text-dark ">
                                                            {{ $comic->comic_title }}
                                                        </td>
                                                        <td class="align-middle">
                                                            @if (!is_null($comic->comic_genre))
                                                                @foreach (json_decode($comic->comic_genre) as $data)
                                                                    <span class="text-dark">
                                                                        {{ $data }},
                                                                    </span>
                                                                @endforeach
                                                            @else
                                                                -
                                                            @endif
                                                        </td>
                                                        <td class="align-middle">{{ $comic->comic_author }}</td>
                                                        <td class="align-middle">{{ $comic->comic_artist }}</td>
                                                        <td class="align-middle">Ongoing</td>
                                                        <td class="align-middle">
                                                            <a href="{{ route('manageKomikShow', $comic->comic_slug) }}"
                                                                class="btn btn-md text-white"
                                                                style="background-color: #c22dba;">Details</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
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

@push('javascript')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
@endpush
