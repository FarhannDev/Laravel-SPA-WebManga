@extends('layouts.dashboard.index')

@section('container')
    <!-- Begin Page Content -->
    <div class="container-fluid mb-5">
        <div class="card" style="border-radius: 8px; background-color: #fff;">
            <div class="row">
                <div class="col">
                    <div class="dashoard">
                        <div class="dashboard-inner">
                            <div class="dashboard-inner__backbutton pt-2">
                                <a href="{{ route('manageKomik') }}" class="btn btn-link text-dark text-decoration-none">
                                    <span class="fas fa-arrow-left mr-2"></span> {{ __('Kembali ke halaman komik') }}
                                </a>
                            </div>
                            <hr />
                        </div>
                        <div class="dashboard-inner__item">
                            <div class="dashboard-item__list px-3">
                                <form action="{{ route('manageKomikUpdate', $comic->comic_slug) }}" autocomplete="off"
                                    method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    @method('PUT')
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="title">{{ 'Title:' }}
                                                <span class="text-danger">*</span></label>
                                            <input name="comic_title" type="text"
                                                class="form-control @error('comic_title') is-invalid @enderror"
                                                id="title"
                                                value="{{ $comic->comic_title ? $comic->comic_title : old('comic_title') }}">

                                            @error('comic_title')
                                                <span class="invalid-feedback">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="artist">{{ __('Artist:') }} <span
                                                    class="text-danger">*</span></label>
                                            <input name="comic_artist" type="text"
                                                class="form-control @error('comic_artist') is-invalid @enderror"
                                                id="artist"
                                                value="{{ $comic->comic_artist ? $comic->comic_artist : old('comic_artist') }}">
                                            @error('comic_artist')
                                                <span class="invalid-feedback">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="author">{{ __('Author:') }} <span
                                                    class="text-danger">*</span></label>
                                            <input name="comic_author" type="text"
                                                class="form-control @error('comic_author') is-invalid @enderror"
                                                id="author"
                                                value="{{ $comic->comic_author ? $comic->comic_author : old('comic_author') }}">
                                            @error('comic_author')
                                                <span class="invalid-feedback">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div wire:ignore class="form-group col-md-4">
                                            <label for="comic_genre_id">{{ __('Select Category:') }} <span
                                                    class="text-danger">*</span></label>
                                            <select name="comic_genre_id" id="comic_genre_id"
                                                class="form-control  @error('comic_genre_id') is-invalid @enderror">
                                                <option selected value="">{{ __('Selected Genre') }}</option>
                                                @foreach ($genre as $data)
                                                    <?php $dash = ''; ?>
                                                    @if (old('comic_genre_id') == $data->id)
                                                        <option value="{{ $data->id }}">
                                                            {{ $data->genre_name }}
                                                        </option>
                                                    @else
                                                        <option value="{{ $data->id }}"
                                                            {{ $comic->comic_genre_id == $data->id ? 'selected' : '' }}>
                                                            {{ $data->genre_name }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            @error('comic_genre_id')
                                                <span class="invalid-feedback">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-1">
                                            <label for="comic_rating">Rating: <span class="text-danger">*</span></label>
                                            <input name="comic_rating" type="text"
                                                class="form-control  @error('comic_rating') is-invalid @enderror"
                                                id="comic_rating"
                                                value="{{ $comic->comic_rating ? $comic->comic_rating : old('comic_rating') }}">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="comic_released">Released: <span class="text-danger">*</span></label>
                                            <input name="comic_released" type="date"
                                                class="form-control  @error('comic_released') is-invalid @enderror"
                                                id="comic_released"
                                                value="{{ $comic->comic_released ? $comic->comic_released : old('comic_released') }}">
                                        </div>
                                        <div class="form-group col-md">
                                            <label for="inputZip">Upload Cover:</label>
                                            <div class="custom-file">
                                                <input name="comic_cover" type="file"
                                                    class="custom-file-input  @error('comic_cover') is-invalid @enderror"
                                                    id="customFile"
                                                    value="{{ $comic->comic_cover ? $comic->comic_cover : old('comic_cover') }}">
                                                <label class="custom-file-label"
                                                    for="customFile">{{ $comic->comic_cover ? $comic->comic_cover : old('comic_alternative') }}</label>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label for="comic_alternative">Alternative Name:</label>
                                        <textarea style="resize:none; text-align: justify; font-weight: 400;" name="comic_alternative"
                                            value="{{ old('comic_alternative') }}" class="form-control" id="comic_alternative" rows="5" cols="50"
                                            onKeyPress placeholder="Tuliskan alternative name disini...">
                                          {{ $comic->comic_alternative ? $comic->comic_alternative : old('comic_alternative') }}
                                        </textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="comic_sinopsis">Sinopsis:</label>
                                        <textarea style="align-content:left; overflow:auto; resize:none; text-align: left; font-weight: 400;"
                                            name="comic_sinopsis" value="{{ old('comic_sinopsis') }}"class="form-control" id="comic_sinopsis" rows="10"
                                            cols="50" onKeyPress placeholder="Tuliskan sinopsis disini...">
                                            {{ $comic->comic_sinopsis ? $comic->comic_sinopsis : old('comic_sinopsis') }}
                                        </textarea>
                                    </div>

                                    <div class="form-group ">
                                        <div class="d-flex justify-content-end px-2">
                                            <button type="submit" class="btn btn-primary mx-1">Perbarui</button>
                                            <a href="{{ route('manageKomik') }}" class="btn btn-danger">Batalkan</a>
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
    <script>
        $('.custom-file-input').on('change', function() {
            let fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass("select d").html(fileName);
        });
    </script>
@endpush