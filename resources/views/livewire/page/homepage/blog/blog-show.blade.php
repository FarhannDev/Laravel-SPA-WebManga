<div class="container-xxl py-md-5 position-relative p-0">
    <div class="container py-5 px-lg-5">
        <div class="row justify-content-center align-content-center ">
            <div class="col-lg-10">
                <div class="blog-content">
                    <div class="blog-details">
                        <div class="card mb-3 pt-3 p-3" style="border-radius: 0px 0px 8px 8px; overflow: auto;">
                            <div class="d-flex justify-content-arround">
                                <div class="action-detail__back  pt-3">
                                    <a href="{{ route('blogIndex') }}" class="ls-base text-dark">
                                        <span class="fas fa-arrow-left"> Kembali</span>
                                    </a>
                                </div>
                            </div>
                            <hr />
                            <div class="d-flex justify-content-end ">
                                <nav aria-label="breadcrumb"
                                    style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ route('homePageIndex') }}">Beranda</a>
                                        </li>
                                        <li class="breadcrumb-item"><a href="{{ route('blogIndex') }}"> Daftar Blog</a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page"> {!! \Illuminate\Support\Str::limit($blog_name ?? '', 50, ' ...') !!}
                                        </li>
                                    </ol>
                                </nav>
                            </div>
                            <hr />
                            <div class="blog-details__image">
                                <img src="{{ $blog_cover_link }}" width="100%" style="max-width: 100%;"
                                    class="img-fluid">
                                {{-- <img src="{{ asset($blog_cover ? 'images/blog/' . $blog_cover : 'images/blog/default.jpg') }}"
                            width="100%" style="max-width: 100%;" class="img-fluid"> --}}
                            </div>
                            <div class="d-flex flex-column justify-content-center">
                                <div class="mx-auto text-center">
                                    <div class="author-image ">
                                        <figure class="figure">
                                            <img src="{{ asset('assets/img/profile/undraw_profile_2.svg') }}"
                                                class="rounded mx-auto d-block" width="100">
                                            <figcaption class="figure-caption pt-3">
                                                <a href="" class="text-dark">
                                                    {{ $blog_by_user }}
                                                </a>
                                            </figcaption>
                                        </figure>
                                    </div>
                                </div>
                            </div>
                            <hr />
                            <div class="blog-details__title">
                                <div class="blog-details__title-name">
                                    <h3 class="text-dark">
                                        <div>
                                            {{ $blog_name }}
                                        </div>
                                    </h3>
                                </div>
                                <div class="blog-details__title-author mb-3">
                                    <span class="fas fa-user font-weight-normal mr-2 ml-2"
                                        style="font-weight: 300; font-size: 16px;"> By <em class="text-dark"
                                            style="font-style: normal"> {{ $blog_by_user }}</em> -
                                        {{ date('d M Y', strtotime($publish_date)) }}</span>
                                </div>
                            </div>
                            <div class="blog-details__desc mb-3">
                                {!! $blog_desc !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container px-lg-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card p-3 mb-3 bg-white">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="col">
                            <div class="d-flex flex-column border-bottom">
                                <h3>Komentar</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row flex-column pt-3">
                        @forelse ($blog_comment as $data)
                            <div class="col">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="flex-shrink-0">
                                        <img src="https://secure.gravatar.com/avatar/45fc29e21456ca554ef65fa3db0bbc04?s=500&d=mm&r=g"
                                            width="50">
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <div class="d-flex flex-column">
                                            <span><strong> {{ $data->comment_name }} </strong> -
                                                {{ $data->created_at->diffForHumans() }}</span>
                                            <div class="d-block pt-2">
                                                {!! $data->comment_desc !!}
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <hr />
                            </div>
                        @empty
                            <div class="d-flex justify-content-center pt-3 mb-3">
                                <span class="text-dark">
                                    Belum Ada Komentar Saat Ini.
                                </span>
                            </div>
                        @endforelse
                        <div class="d-flex justify-content-center">
                            {{ $blog_comment->links() }}
                        </div>
                    </div>

                    <div class="row justify-content-arround align-content-center border-top pt-3">
                        <div class="col">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="col-lg-8 col-lg-6">
                                    <div class="d-flex flex-column border-bottom mb-3">
                                        <h3>Tinggalkan Balasan Anda</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex flex-column">
                                <form wire:submit.prevent="sendComment" autocomplete="on">
                                    <div class="form-group">
                                        <div class="mb-3">
                                            <label for="comic_sinopsis">Nama Lengkap:</label>
                                            <input wire:model="comment_name" type="text"
                                                class="form-control @error('comment_name') is-invalid @enderror"
                                                id="exampleInputEmail1" aria-describedby="emailHelp"
                                                autocomplete="name">

                                            @error('comment_name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="mb-3">
                                            <label for="comic_sinopsis">Alamat Email:</label>
                                            <input wire:model="comment_email" type="text"
                                                class="form-control  @error('comment_email') is-invalid @enderror"
                                                id="exampleInputEmail1" aria-describedby="emailHelp"
                                                autocomplete="email">
                                            @error('comment_email')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="mb-3">
                                            <label for="comic_sinopsis">Balasan:</label>
                                            <textarea wire:model="comment_desc"
                                                style="align-content:left; overflow:auto; resize:none; text-align: left; font-weight: 400;"
                                                class="form-control  @error('comment_desc') is-invalid @enderror" id="comic_sinopsis" rows="5"
                                                cols="30" onKeyPress placeholder="Tuliskan pendapat mu disini...">
                                        </textarea>
                                            @error('comment_desc')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Kirimkan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
