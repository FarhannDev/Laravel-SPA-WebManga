@extends('layouts.dashboard.index')

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
@endpush

@section('breadcrumb')
    {{ Breadcrumbs::render('data-genre') }}
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
                                {{ __('Add New Genre') }} <span class="fas fa-edit"></span>
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
                                                    <th scope="col-lg-6">Genre Name</th>
                                                    <th scope="col-lg-6">Created</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($genres as $genre)
                                                    <tr>
                                                        <td class="align-middle">{{ $loop->iteration }}</td>
                                                        <td class="align-middle">{{ $genre->genre_name }}</td>
                                                        <td class="align-middle">
                                                            {{ date('d/m/Y', strtotime($genre->created_at)) }}</td>
                                                        <td class="align-middle">
                                                            <form action="{{ route('manageGenreDeleted', $genre->id) }}"
                                                                method="post"
                                                                onclick="return confirm('Are you sure you want to delete?')">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn  text-white btn-md"
                                                                    style="background-color: #c22dba;">
                                                                    <i class="fas fa-trash"></i>
                                                                </button>
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
                    <h5 class="modal-title text-dark" id="exampleModalLabel">Add New Genre Komik</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('manageGenreAdd') }}" enctype="multipart/form-data"
                        autocomplete="on">
                        @csrf
                        <div class="form-group">
                            <label for="genre_name">Genre Name</label>
                            <input type="text" class="form-control @error('genre_name')  is-invalid @enderror"
                                name="genre_name" id="genre_name" value="{{ old('genre_name') }}">

                            @error('genre_name')
                                <span class="invalid-feedback">{{ $message }}</span>
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
