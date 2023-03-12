@section('header')
    <header class="header-content-main">
        <div class="container-xxl hero-header">
            <div class="container px-lg-6">
                <div class="row g-5 justify-content-end align-items-center">
                    <div class="col-lg-6 text-center text-lg-start">
                        <h1 class="text-dark mb-4 animated slideInDown text-capitalize"> Zaotaku - Situs Download Volume
                            Manga
                        </h1>
                        <div class="d-flex justify-content-start">
                            <nav aria-label="breadcrumb"
                                style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('homePageIndex') }}">Beranda</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Hubungi Kami</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
@endsection



<div class="container-xxl position-relative p-0 py-5">
    <div class="container py-5 px-lg-5">
        <div class="wow fadeInUp" data-wow-delay="0.1s">
            <h1 class="text-center mb-5 text-dark">Ada Yang Bisa Kami Bantu?</h1>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="wow fadeInUp" data-wow-delay="0.3s">
                    <form wire:submit.prevent="send">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input wire:model="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" id="name"
                                        placeholder="Your Name">
                                    <label for="name">Your Name</label>

                                    @error('name')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input wire:model="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" id="email"
                                        placeholder="Your Email">
                                    <label for="email">Your Email</label>
                                    @error('email')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input wire:model="subject" type="text"
                                        class="form-control @error('subject') is-invalid @enderror" id="subject"
                                        placeholder="Subject">
                                    <label for="subject">Subject</label>
                                    @error('subject')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea wire:model="message" class="form-control @error('message') is-invalid @enderror"
                                        placeholder="Leave a message here" id="message" style="height: 150px"></textarea>
                                    <label for="message">Message</label>
                                    @error('message')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" type="submit">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
