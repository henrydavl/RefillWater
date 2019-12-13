@extends('layouts.app')

@section('content')
    <div class="container py-5 my-5">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-12 col-xl-10">
                <div class="card shadow-lg o-hidden border-0 my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-flex">
                                <div class="flex-grow-1 bg-login-image" style="background-image: url({{asset('assets/img/dogs/image3.jpeg')}});"></div>
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    @if (session('Success'))
                                        @include('inc.alert')
                                        @else
                                        <div class="text-center">
                                            <h4 class="text-dark mb-4">Welcome Back!</h4>
                                        </div>
                                        <form class="user" method="POST" action="{{ route('login') }}">
                                            @csrf
                                            <div class="form-group">
                                                <input id="email" type="email" class="form-control form-control-user @error('email') is-invalid @enderror" placeholder="Enter Email Address..." name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <input id="password" type="password" class="form-control form-control-user @error('password') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="current-password">
                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox small">
                                                    <div class="form-check">
                                                        <input class="form-check-input custom-control-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                        <label class="form-check-label custom-control-label" for="remember">{{ __('Remember Me') }}</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="btn btn-primary btn-block text-white btn-user" type="submit">{{ __('Login') }}</button>
                                            <hr>
                                        </form>
                                        @if (Route::has('password.request'))
                                            <div class="text-center">
                                                <a class="small" href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
                                            </div>
                                        @endif
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
