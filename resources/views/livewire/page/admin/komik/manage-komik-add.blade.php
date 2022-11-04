   <!-- Begin Page Content -->
   <div class="container-fluid mb-5">
       <div class="card" style="border-radius: 8px; background-color: #fff;">
           <div class="row">
               <div class="col">
                   <div class="dashoard">
                       <div class="dashboard-inner">
                           <div class="dashboard-inner__backbutton pt-2">
                               <a href="{{ route('manageKomik') }}" class="btn btn-link text-dark text-decoration-none">
                                   <span class="fas fa-arrow-left mr-2"></span> {{ __('Back To Komik') }}
                               </a>
                           </div>
                           <hr />
                       </div>
                       <div class="dashboard-inner__item">
                           <div class="dashboard-item__list px-3">
                               <form wire:submit.prevent="store" autocomplete="off" method="POST">
                                   {{ csrf_field() }}
                                   <div class="form-row">
                                       <div class="form-group col-md-6">
                                           <label for="title">{{ 'Title:' }}
                                               <span class="text-danger">*</span></label>
                                           <input wire:model.debounce.500ms="comic_title" type="text"
                                               class="form-control @error('comic_title') is-invalid @enderror"
                                               id="title" value="{{ old('comic_title') }}">
                                       </div>
                                       <div class="form-group col-md-3">
                                           <label for="artist">{{ __('Artist:') }} <span
                                                   class="text-danger">*</span></label>
                                           <input wire:model.debounce.500ms="comic_artist" type="text"
                                               class="form-control @error('comic_artist') is-invalid @enderror"
                                               id="artist">
                                       </div>
                                       <div class="form-group col-md-3">
                                           <label for="author">{{ __('Author:') }} <span
                                                   class="text-danger">*</span></label>
                                           <input wire:model.debounce.500ms="comic_author" type="text"
                                               class="form-control @error('comic_author') is-invalid @enderror"
                                               id="author">
                                       </div>
                                   </div>
                                   <div class="form-row">
                                       <div wire:ignore class="form-group col-md-4">
                                           <label for="comic_genre_id">{{ __('Select Category:') }} <span
                                                   class="text-danger">*</span></label>
                                           <select wire:model.debounce.500ms="comic_genre_id" id="comic_genre_id"
                                               class="form-control">
                                               <option selected>{{ __('Selected Genre') }}</option>
                                               @foreach ($genre as $data)
                                                   <option value="{{ $data->id }}">{{ $data->genre_name }}
                                                   </option>
                                               @endforeach
                                           </select>
                                       </div>
                                       <div class="form-group col-md-1">
                                           <label for="comic_rating">Rating:</label>
                                           <input wire:model.debounce.500ms="comic_rating" type="text"
                                               class="form-control" id="comic_rating">
                                       </div>
                                       <div class="form-group col-md-1">
                                           <label for="comic_released">Released:</label>
                                           <input wire:model.debounce.500ms="comic_released" type="text"
                                               class="form-control" id="comic_released">
                                       </div>
                                       <div class="form-group col-md">
                                           <label for="inputZip">Upload Cover:</label>
                                           <div class="custom-file">
                                               <input wire:model.debounce.500ms="comic_cover" type="file"
                                                   class="custom-file-input" id="customFile">
                                               <label class="custom-file-label" for="customFile">Choose file</label>
                                           </div>
                                       </div>

                                   </div>
                                   <div class="form-group">
                                       <label for="comic_alternative">Alternative Name:</label>
                                       <textarea wire:model.debounce.500ms="comic_alternative" class="form-control" id="comic_alternative" rows="3"></textarea>
                                   </div>
                                   <div class="form-group">
                                       <label for="comic_sinopsis">Sinopsis:</label>
                                       <textarea wire:model.debounce.500ms="comic_sinopsis"class="form-control" id="comic_sinopsis" rows="3"></textarea>
                                   </div>

                                   <div class="form-group ">
                                       <div class="d-flex justify-content-end px-2">
                                           <button type="submit" class="btn btn-primary mx-1">Add</button>
                                           <button type="button" class="btn btn-danger">Cancel</button>
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
