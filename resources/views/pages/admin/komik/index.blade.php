@extends('layouts.dashboard.index')

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
@endpush


@section('container')
    <!-- Begin Page Content -->
    <div class="card" style="border-radius: 8px; background-color: #fff;">
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
                        <div class="dashboard-inner__text px-3 mx-2 pt-2">
                            <h4 class="text-dark text-capitalize">Kelola Semua Data Komik</h4>
                        </div>
                        <div class="dashboard-inner__addbutton  px-3  mx-2  mb-3">
                            <a href="{{ route('manageKomikCreate') }}" class="btn btn-primary">
                                {{ __('Buat Komik Terbaru') }} <span class="fas fa-plus"></span>
                            </a>
                        </div>
                    </div>
                    <div class="dashboard-inner__item px-3 mb-3">
                        <div class="dashboard-item__list">
                            <div class="row justify-content-arround align-items-center">
                                <div class="col">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered" id="example" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col-lg-6">Title</th>
                                                    <th scope="col-*">Author</th>
                                                    <th scope="col-*">Artist</th>
                                                    <th scope="col-*">Created At</th>
                                                    <th scope="col-*">Status</th>
                                                    <th scope="col-*">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($comics as $comic)
                                                    <tr>
                                                        <th scope="row" class="align-middle">
                                                            {{ $loop->iteration }}
                                                        </th>
                                                        <td class="align-middle font-weight-dark-500">
                                                            <a href="{{ route('manageKomikShow', $comic->comic_slug) }}"
                                                                class="text-dark text-decoration-none">{{ $comic->comic_title }}
                                                            </a>
                                                        </td>
                                                        <td class="align-middle font-weight-dark-500">
                                                            {{ $comic->comic_author }}
                                                        </td>
                                                        <td class="align-middle font-weight-dark-500">
                                                            {{ $comic->comic_artist }}
                                                        </td>
                                                        <td class="align-middle">
                                                            {{ date('m/d/Y H:i:s', strtotime($comic->created_at)) }}</td>
                                                        <td class="align-middle font-weight-dark-500">
                                                            {{ $comic->is_active }}
                                                        </td>
                                                        <td>
                                                            <form
                                                                action="{{ route('manageKomikDestroy', $comic->comic_slug) }}"
                                                                method="post" class="d-inline">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger mb-2"><i
                                                                        class="fas fa-trash-alt"></i></button>
                                                                <a href="{{ route('manageKomikEdit', $comic->comic_slug) }}"
                                                                    class="btn btn-danger"><i class="fas fa-edit"></i></a>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td class="align-middle">
                                                            Data Not Found.
                                                        </td>
                                                    </tr>
                                                @endforelse
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
