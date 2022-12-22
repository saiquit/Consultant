@extends('layouts.auth.app')

@section('content')
    <div class="login-header box-shadow">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <div class="brand-logo">
                <a href="{{ route('home') }}">
                    <img src="/b/vendors/images/deskapp-logo.svg" alt="">
                </a>
            </div>
            <div class="login-menu">
                <ul>
                    <li><a href="{{ route('register') }}">Register</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 col-lg-7">
                    <img src="/b/vendors/images/login-page-img.png" alt="">
                    Admin: <code>email: office@xpertgroupbd.com;<br>password: password</code>
                    Company: <code>email: company@xpertgroupbd.com;<br>password: password</code>
                    Expert: <code>email: expert@xpertgroupbd.com;<br>password: password</code>
                </div>
                <div class="col-md-6 col-lg-5">
                    <div class="login-box bg-white box-shadow border-radius-10">
                        <div class="login-title">
                            <h2 class="text-center text-primary">Login To DeskApp</h2>
                        </div>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="input-group custom">
                                <input id="email" type="email"
                                    class="form-control form-control-lg  @error('email') is-invalid @enderror"
                                    placeholder="Email" name="email" value="{{ old('email') }}" required
                                    autocomplete="email" autofocus>
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
                                </div>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="input-group custom">
                                <input name="password" required autocomplete="current-password" id="password"
                                    type="password"
                                    class="form-control form-control-lg @error('password') is-invalid @enderror"
                                    placeholder="**********">
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
                                </div>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="row pb-30">
                                <div class="col-6">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="remember" name="remember"
                                            id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="remember">Remember</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="forgot-password"><a href="forgot-password.html">Forgot Password</a>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="input-group mb-0">
                                        <input class="btn btn-primary btn-lg btn-block" type="submit" value="Sign In">
                                        {{-- <a class="btn btn-primary btn-lg btn-block" type="subm">Sign In</a> --}}
                                    </div>
                                    <div class="font-16 weight-600 pt-10 pb-10 text-center" data-color="#707373">OR
                                    </div>
                                    <div class="input-group mb-0">
                                        <a class="btn btn-outline-primary btn-lg btn-block"
                                            href="{{ route('register') }}">Register To
                                            Create Account</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
