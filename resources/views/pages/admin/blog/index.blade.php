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
                            <h4 class="text-dark text-capitalize">Kelola semua blog</h4>
                        </div>
                        <div class="dashboard-inner__addbutton  px-3  mx-2  mb-3">
                            <a href="{{ route('manageBlogCreate') }}" class="btn btn-primary">
                                {{ __('Buat Blog Terbaru') }} <span class="fas fa-plus"></span>
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
                                                    <th scope="col-*" class="text-center">Author</th>
                                                    <th scope="col-*">Created At</th>
                                                    <th scope="col-*" class="text-center">Status</th>
                                                    <th scope="col-*">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($blog as $data)
                                                    <tr>
                                                        <td class="align-middle">
                                                            {{ $loop->iteration }}
                                                        </td>
                                                        <td class="align-middle">{{ $data->blog_name }}</td>
                                                        <td class="align-middle text-center">{{ $data->user['name'] }}</td>
                                                        <td class="align-middle">
                                                            {{ date('d/m/y H:i:s', strtotime($data->created_at)) }}</td>
                                                        <td class="align-middle text-dark text-center">{{ $data->status }}
                                                        </td>
                                                        <td class="align-middle">
                                                            <form
                                                                action="{{ route('manageBlogDestroy', $data->blog_slug) }}"
                                                                method="post">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger btn-md">
                                                                    <span class="fas fa-trash-alt"></span>
                                                                </button>
                                                                <a href="{{ route('manageBlogEdit', $data->blog_slug) }}"
                                                                    class="btn btn-danger btn-md">
                                                                    <span class="fas fa-edit"></span>
                                                                </a>
                                                            </form>
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