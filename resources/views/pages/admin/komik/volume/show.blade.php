@extends('layouts.dashboard.index')

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
@endpush

@section('breadcrumb')
    {{ Breadcrumbs::render('data-volume-detail', $comic) }}
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
                            <a href="{{ route('manageVolumeIndex') }}" class="btn btn-link text-dark text-decoration-none">
                                <span class="fas fa-arrow-left"></span> {{ __('Kembali') }}
                            </a>
                        </div>
                    </div>
                    <div class="dashboard-inner__item px-3 mb-3">
                        <div class="dashboard-inner__addbutton mb-3 ">
                            <a data-toggle="modal" data-target="#exampleModal" style="background-color: #c22dba;"
                                href="#" class="btn text-white">
                                {{ __('Add New Volume') }} <span class="fas fa-edit"></span>
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
                                                    <th scope="col-lg-6">Volume Name</th>
                                                    <th scope="col-lg-6">Volume Link</th>
                                                    <th scope="col-lg-6">Created</th>
                                                    {{-- <th scope="col-lg-6">Updated</th> --}}
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($volumes as $volume)
                                                    <tr>
                                                        <th scope="row" class="align-middle">
                                                            {{ $loop->iteration }}
                                                        </th>
                                                        <td class="align-middle text-dark ">
                                                            {{ $volume->volume_name }}
                                                        </td>
                                                        <td class="align-middle">
                                                            <a href="{{ $volume->volume_link }}" target="_blank"
                                                                class="btn btn-link text-dark">
                                                                {{ $volume->volume_link }}
                                                            </a>
                                                        </td>
                                                        <td class="align-middle">
                                                            {{ !is_null($volume->created_at) ? date('d/m/Y, H:i:s', strtotime($volume->created_at)) : '-' }}
                                                        </td>
                                                        {{-- <td class="align-middle">
                                                            {{ !is_null($volume->created_at) ? date('d/m/Y, H:i:s', strtotime($volume->updated_at)) : '-' }}
                                                        </td> --}}
                                                        <td class="align-middle">
                                                            <a href="{{ route('manageVolumeShow', $comic->comic_slug) }}"
                                                                class="btn btn-md text-white mb-2"
                                                                style="background-color: #c22dba;"><span
                                                                    class="fas fa-trash-alt"></span></a>
                                                            {{-- <a data-toggle="modal"
                                                                data-target="#exampleModalEdit{{ $comic->id }}"
                                                                href="#" class="btn btn-md text-white  mb-2"
                                                                style="background-color: #c22dba;"><span
                                                                    class="fas fa-pen"></span></a> --}}
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
                    <h5 class="modal-title" id="exampleModalLabel">Add New Volume</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
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
                                        <button type="button" class="btn btn-dark mr-2"
                                            data-dismiss="modal">Cancel</button>
                                        <button onclick="return confirm('Are you sure you want to submit?')"
                                            style="background-color: #c22dba;" type="submit" class="btn text-white">Add
                                            New
                                            Volume</button>
                                    </div>
                                </div>
                            </form>
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
