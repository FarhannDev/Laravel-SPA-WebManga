@extends('layouts.dashboard.index')

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
@endpush

@section('breadcrumb')
    {{ Breadcrumbs::render('data-author') }}
@endsection

@section('container')
    <div class="card mx-2" style="border-radius: 12px; background-color: #fff; box-shadow: rgba(0, 0, 0, 0.09) 0px 3px 12px;">
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
                                <span class="fas fa-2x fa-users mr-2"></span>
                                <h4 class="text-dark text-capitalize pt-2">Manage All Data Author</h4>
                            </div>

                        </div>
                    </div>
                    <div class="dashboard-inner__item px-3 mb-3">
                        <div class="dashboard-item__list mb-3">
                            <div class="row justify-content-arround align-items-center">
                                <div class="col">
                                    <div class="table-responsive mb-3">
                                        <table class="table table-striped table-bordered" id="example" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col-lg-6">Name</th>
                                                    <th scope="col-lg-6">Email</th>
                                                    <th scope="col-lg-6">Role</th>
                                                    <th scope="col-lg-6">Join Date</th>
                                                    <th scope="col-lg-6">Updated</th>
                                                    <th scope="col-lg-6">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach ($users as $user)
                                                    <tr>
                                                        <td class="align-middle">
                                                            {{ $loop->iteration }}
                                                        </td>
                                                        <td class="align-middle">
                                                            {{ $user->name }}
                                                        </td>
                                                        <td class="align-middle">
                                                            {{ $user->email }}
                                                        </td>
                                                        <td class="align-middle">
                                                            <span class="text-capitalize">
                                                                {{ $user->role['role_name'] }}
                                                            </span>
                                                        </td>
                                                        <td class="align-middle">
                                                            {{ date('m/d/Y', strtotime($user->created_at)) }}
                                                        </td>
                                                        <td class="align-middle">
                                                            {{ date('m/d/Y', strtotime($user->updated_at)) }}
                                                        </td>
                                                        <td class="align-middle">
                                                            <form action="{{ route('manageUserDestroy', $user->id) }}"
                                                                method="post"
                                                                onclick="return confirm('Are you sure you want to delete user?')">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn text-white btn-danger"
                                                                    style="background-color: #c22dba;">
                                                                    <i class="fas fa-trash"></i>
                                                                    </span>
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
