@extends('layouts.login.index')

@section('content')
    <div class="container">
        <div class="row justify-content-center align-self-center pt-5 mt-3">
            <div class="col-md-4">
                <div class="card rounded">
                    <div class="card-body">
                        <div class="login-title border-bottom">
                            <h4 class="text-dark">Login To Dashboard</h4>
                        </div>
                        <div class="login-form pt-3">
                            @if (session()->has('error'))
                                <div class="alert alert-danger" role="alert">
                                    {{ session()->get('error') }}
                                </div>
                            @endif
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group mb-2">
                                    <label for="email mb-2">{{ __('Email Address') }}</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        id="email" name="email" value="{{ old('email') }}" required
                                        autocomplete="email" autofocus>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                        id="password" name="password" required autocomplete="current-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group pt-3 mb-3">
                                    <div class="d-block ">
                                        <button type="submit"
                                            class="btn rounded-pill w-100 btn-dark">{{ __('Login') }}</button>
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
