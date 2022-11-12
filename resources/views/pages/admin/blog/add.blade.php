@extends('layouts.dashboard.index')

@section('breadcrumb')
    {{ Breadcrumbs::render('blog-add') }}
@endsection

@section('container')
    <!-- Begin Page Content -->
    <div class="container-fluid p-0 mb-5">
        <div class="card mx-3" style="border-radius: 8px; background-color: #fff;">
            <div class="row">
                <div class="col">
                    <div class="dashoard">
                        <div class="dashboard-inner">
                            <div class="dashboard-inner__backbutton pt-2">
                                <a href="{{ route('manageBlogIndex') }}" class="btn btn-link text-dark text-decoration-none">
                                    <span class="fas fa-arrow-left mr-2"></span> {{ __('Kembali ke halaman blog') }}
                                </a>
                            </div>
                            <hr />
                        </div>
                        <div class="dashboard-inner__item">
                            <div class="dashboard-item__list px-3">
                                <form action="{{ route('manageBlogStore') }}" autocomplete="off" method="POST"
                                    enctype="multipart/form-data">
                                    {{ csrf_field() }}

                                    <div class="form-group">
                                        <label for="title">{{ 'Title:' }}
                                            <span class="text-danger">*</span></label>
                                        <input name="blog_name" type="text"
                                            class="form-control @error('blog_name') is-invalid @enderror" id="title"
                                            value="{{ old('blog_name') }}">

                                        @error('blog_name')
                                            <span class="invalid-feedback">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group ">
                                        <label for="inputZip">Upload Cover:</label>
                                        <div class="custom-file">
                                            <input name="blog_cover" type="file"
                                                class="custom-file-input  @error('blog_cover') is-invalid @enderror"
                                                id="customFile" value="{{ old('blog_cover') }}">
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="status">Publish / Unpublish Blog:</label>
                                        <select class="custom-select" name="status" id="status">
                                            <option value="Publish">Publish</option>
                                            <option value="Unpublish">Unpublish</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="blog_desc">Description:</label>
                                        <textarea style="align-content:left; overflow:auto; resize:none; text-align: left; font-weight: 400;" name="blog_desc"
                                            value="{{ old('blog_desc') }}"class="form-control ckeditor" id="blog_desc" rows="10" cols="50" onKeyPress
                                            placeholder="Tuliskan sinopsis disini...">
                                            {{ old('blog_desc') }}
                                        </textarea>
                                    </div>

                                    <div class="form-group ">
                                        <div class="d-flex justify-content-end px-2">
                                            <a href="{{ route('manageBlogIndex') }}"
                                                class="btn btn-dark text-white">Batalkan</a>
                                            <button style="background-color: #c22dba;" type="submit"
                                                class="btn text-white mx-1">Simpan</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection



@push('javascript')
    <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.ckeditor').ckeditor();
        });
    </script>
    <script type="text/javascript">
        CKEDITOR.replace('blog_desc', {
            filebrowserUploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        });
    </script>
    <script>
        $('.custom-file-input').on('change', function() {
            let fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass("select d").html(fileName);
        });
    </script>
@endpush
