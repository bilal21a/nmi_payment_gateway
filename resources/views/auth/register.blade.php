@extends('layouts.auth.app')
@section('css_after')
    <style>
        .fixed-background {
            background: url("{{ asset('acron/img/background/background-blue.webp') }}") no-repeat center center fixed;
            background-size: cover;
        }
            .logo-default {
            width: 304px !important;
            min-height: 55px !important;
            background-repeat: round !important;
        }
    </style>
@endsection
@section('content')
    <div class="fixed-background"></div>
    <div class="container-fluid p-0 h-100 position-relative">
        <div class="row g-0 h-100">
            <div class="offset-0 col-12 d-none d-lg-flex offset-md-1 col-lg h-lg-100">
                <div class="min-h-100 d-flex align-items-center">
                    <div class="w-100 w-lg-75 ">
                        <div>
                            <div class="mb-5">
                                <h1 class="display-3 text-white">ADMIN PORTAL </h1>
                                {{-- <h1 class="display-3 text-white">Merchents</h1> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-auto h-100 pb-4 px-4 pt-0 p-lg-0">
                <div
                    class="sw-lg-70 min-h-100 bg-foreground d-flex justify-content-center align-items-center shadow-deep py-5 full-page-content-right-border">
                    <div class="sw-lg-50 px-5">
                        <div class="sh-11">
                            <a href="#">
                                <div class="logo-default"></div>
                            </a>
                        </div>
                        <div class="mb-5">
                            <h2 class="cta-1 mb-0 text-primary">Welcome,</h2>
                            <h2 class="cta-1 text-primary">let's get started!</h2>
                        </div>
                        <div class="mb-5">
                            <p class="h6">Please use the form to register.</p>
                            <p class="h6">
                                If you are a member, please
                                <a href="{{ route('login') }}">login</a>
                                .
                            </p>
                        </div>
                        <div>

                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <div class="mb-3">
                                    <label for="name" class="form-label">{{ __('Name') }}</label>
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">{{ __('E-Mail Address') }} <br><small class="text-muted">Allowed formats @gmail.com @yahoo.com</small></label>
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" pattern="^[a-zA-Z0-9._%+-]+@(gmail|yahoo)\.com$" required autocomplete="name">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="role" class="form-label">Role</label>

                                    <select id="role" name="role" class="form-select">
                                        <option value="student" {{ old('role') == 'student' ? 'selected' : '' }}>Student
                                        </option>
                                        <option value="faculty" {{ old('role') == 'faculty' ? 'selected' : '' }}>Faculty
                                        </option>
                                        <option value="librarian" {{ old('role') == 'librarian' ? 'selected' : '' }}>
                                            Librarian</option>
                                    </select>

                                    @error('role')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="password" class="form-label">{{ __('Password') }}</label>
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">

                                    @error('password_confirmation')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-primary btn-lg">{{ __('Register') }}</button>

                                    <a class="btn btn-link" href="{{ route('login') }}">
                                        {{ __('Login') }}
                                    </a>
                                </div>
                            </form>





                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
