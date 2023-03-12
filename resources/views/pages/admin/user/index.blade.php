@extends('layouts.dashboard.index')

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
@endpush

@section('breadcrumb')
    {{ Breadcrumbs::render('data-user') }}
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
                            <a data-toggle="modal" data-target="#exampleModal" style="background-color: #c22dba;"
                                href="#" class="btn text-white">
                                {{ __('Add New User') }} <span class="fas fa-edit"></span>
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

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Users</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('manageUserStore') }}">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                value="{{ old('name') }}" id="name">

                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email address:</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" id="email">

                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="role_id">Role:</label>
                            <select class="custom-select @error('role_id') is-invalid @enderror" name="role_id">
                                <option selected value="">Select Role Users</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">{{ ucfirst($role->role_name) }}</option>
                                @endforeach
                            </select>
                            @error('role_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password"
                                class="form-control @error('password') is-invalid @enderror" id="password"
                                autocomplete="new-password">

                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">Confirm Password</label>
                            <input type="password" name="password_confirmation"
                                class="form-control @error('password_confirmation') is-invalid @enderror"
                                id="password_confirmation" autocomplete="current-password">

                            @error('password_confirmation')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="d-flex justify-content-end ">
                                <a href="#" data-dismiss="modal" class="btn btn-dark text-white">Batalkan</a>
                                <button onclick="return confirm('Are you sure you want to submit?')"
                                    style="background-color: #c22dba;" type="submit"
                                    class="btn text-white mx-1">Simpan</button>
                            </div>
                        </div>
                    </form>
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
