<div class="container-xxl position-relative p-0 py-5 mt-5 ">
    <div class="container py-3 px-lg-5">
        <div class="d-flex flex-column mb-3">
            <h3 class="text-dark">
                Semua Aktifitas Komunitas
            </h3>
        </div>

        <div class="row justify-content-arround">

            @forelse ($community as $data)
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="card p-3 mb-3" style="height: 200px;">
                        <div class="table">
                            <h6 class="category text-danger">
                                <i class="fa fa-clock "></i> <span class="text-capitalize">
                                    {{ $data->created_at->diffForhumans() }}</span>
                            </h6>
                            <p class="card-caption">
                                <a href="#" class="text-dark"> {!! \Illuminate\Support\Str::limit($data->description ?? '', 100, ' ...') !!}</a>
                            </p>
                            <div class="ftr d-flex justify-content-between m-0">
                                <div class="author">
                                    <a style="font-size: 16px; !important" href="#" class="text-dark"> <img
                                            src="{{ asset('assets/img/profile/undraw_profile_2.svg') }}" width="30"
                                            alt="" class="avatar img-raised">
                                        <span>{{ $data->user['name'] }}</span>
                                        <div class="ripple-cont">
                                            <div class="ripple ripple-on ripple-out"
                                                style="left: 574px; top: 364px; background-color: rgb(60, 72, 88); transform: scale(11.875);">
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="stats"> <i class="fa fa-heart"></i> 342 &nbsp; <i
                                        class="fa fa-comment"></i> 45
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="d-flex justify-content-center pt-3">
                    <p class="text-dark">Belum Ada Aktivitas Terbaru.</p>
                </div>
            @endforelse

        </div>
    </div>
</div>




<div class="container-fluid position-relative p-0 py-3 border-top">
    <div class="container px-lg-5">
        <h4 class="mb-3 text-capitalize">Buat aktifitas terbaru <span class="fas fa-edit"></span></h4>

        <div class="row">
            <div class="col-lg-12">
                {{-- <form wire:submit.prevent="postCommunity"> --}}
                <div class="form-group">
                    {{-- <label for="comic_sinopsis">Sinopsis:</label> --}}
                    <textarea wire:model="descriptions"
                        style="align-content:left; overflow:auto; resize:none; text-align: left; font-weight: 400;" class="form-control"
                        id="comic_sinopsis" rows="10" cols="50" placeholder="Tuliskan sinopsis disini...">  </textarea>
                </div>

                <div class="form-group mt-3">
                    <div class="d-flex justify-content-start ">
                        <button wire:click="postCommunity" class="btn btn-primary">
                            Publish
                        </button>
                    </div>
                </div>
                {{-- </form> --}}
            </div>
        </div>
    </div>
</div>
