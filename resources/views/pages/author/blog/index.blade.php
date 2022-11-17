@extends('layouts.dashboard.index')

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
@endpush
@section('breadcrumb')
    {{ Breadcrumbs::render('author-blog') }}
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
                    <div class="dashboard-inner__item px-3 mb-3">
                        <div class="dashboard-inner__addbutton mt-3  mb-3">
                            <a style="background-color: #c22dba;" href="{{ route('authorBlogAdd') }}"
                                class="btn  text-white">
                                {{ __('Buat Blog Baru') }} <span class="fas fa-plus "></span>
                            </a>
                        </div>
                        <div class="dashboard-item__list">
                            <div class="row justify-content-arround align-items-center">
                                <div class="col">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered" id="example" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col-lg-6">Judul Blog</th>
                                                    <th scope="col-*">Dibuat</th>
                                                    <th scope="col-*">Diperbarui</th>
                                                    <th scope="col-*">Status</th>
                                                    <th scope="col-*">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($blog as $data)
                                                    <tr>
                                                        <td class="align-middle">
                                                            {{ $loop->iteration }}
                                                        </td>
                                                        <td class="align-middle"><a
                                                                href="{{ route('authorBlogShow', $data->blog_slug) }}"
                                                                class="btn btn-link text-dark">
                                                                {{ $data->blog_name }} </a></td>
                                                        <td class="align-middle">
                                                            {{ date('d/m/y H:i:s', strtotime($data->created_at)) }}
                                                        </td>
                                                        <td class="align-middle">
                                                            {{ date('d/m/y H:i:s', strtotime($data->updated_at)) }}
                                                        </td>
                                                        <td class="align-middle">
                                                            @if ($data->status == 'Unpublish')
                                                                <span class="text-danger">Tersimpan</span>
                                                            @else
                                                                <span class="text-success">Diterbitkan</span>
                                                            @endif
                                                        </td>
                                                        <td class="align-middle">
                                                            <form
                                                                onsubmit="return confirm('Are you sure you want to delete?')"
                                                                action="{{ route('authorBlogDestroy', $data->blog_slug) }}"
                                                                method="post">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger btn-md mb-2">
                                                                    <span class="fas fa-trash-alt"></span>
                                                                </button>
                                                                <a href="{{ route('authorBlogEdit', $data->blog_slug) }}"
                                                                    class="btn btn-danger btn-md mb-2 ">
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
