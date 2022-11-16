@extends('layouts.dashboard.index')

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
@endpush
@section('breadcrumb')
    {{ Breadcrumbs::render('author-blog-publish') }}
@endsection

@section('container')
    <!-- Begin Page Content -->
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

                    <div class="dashboard-inner border-bottom mb-3">
                        <div class="dashboard-inner__text px-3 mx-2 pt-2 mb-2">
                            <div class="d-flex justify-content-arroud align-items-center">
                                <span class="fas fa-2x fa-globe mr-2"></span>
                                <h4 class="text-dark text-capitalize pt-2">Kelola semua postingan publish</h4>
                            </div>

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
                                                    <th scope="col-lg-6">Judul Blog</th>
                                                    <th scope="col">Publish</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($blog as $data)
                                                    @if ($data->status == 'Publish')
                                                        <tr>
                                                            <td class="align-middle">
                                                                {{ $loop->iteration }}
                                                            </td>
                                                            <td class="align-middle"><a
                                                                    href="{{ route('manageBlogShow', $data->blog_slug) }}"
                                                                    class="btn btn-link text-dark">{{ $data->blog_name }}</a>
                                                            </td>
                                                            <td class="align-middle">
                                                                {{ date('d/m/y H:i:s', strtotime($data->publish_date)) }}
                                                            </td>
                                                            <td class="align-middle "><span
                                                                    class="text-success">{{ $data->status }}</span></td>
                                                            <td class="align-middle">
                                                                <form
                                                                    action="{{ route('authorBlogPublishUpdate', $data->id) }}"
                                                                    method="post"
                                                                    onclick="return confirm('Are you sure you want to unpublish post?')">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <button type="submit"
                                                                        class="btn btn-danger btn-sm">Draft
                                                                        To Post </span>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    @endif
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
