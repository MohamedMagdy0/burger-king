@extends('layouts.backend.auth_app')
@section('page_title')
    Login
@endsection
@section('content')

    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="card m-auto">

                <div class="card-header mb-0">
                    <div class="login-logo">
                        <a href="/"><b style="color: #f43438;"><img src="{{ asset('assets/client/images/logo.png') }}"
                                    class="rounded-circle m-0 p-3" style="background-color: #f43438"
                                    alt=""><br>Burgers</b></a>
                    </div><!-- /.login-logo -->
                </div><!-- card-header -->

                <div class="card-body login-card-body">
                    <h5 class="login-box-msg text-primary text-bold mt-2 mb-3">Sign In | Login</h5>




                    @if (session('status'))
                        <div class="alert alert-success text-center text-warning">
                            <h3>{{ session('status') }}</h3>
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif


                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="input-group mb-3">
                            <input type="email" class="form-control" placeholder="Email" name="email"
                                :value="old('email')" required autofocus />
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div><!-- email -->

                        <div class="input-group mb-3">
                            <input type="password" class="form-control" placeholder="Password" name="password" required
                                autocomplete="current-password" />
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div><!-- password -->

                        <div class="row my-3">

                            <div class="col-8">
                                <div class="icheck-primary">
                                    <input type="checkbox"  id="remember_me" name="remember" />
                                    <label for="remember_me">Remember Me</label>


                                </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-4">
                                <button type="submit" class="btn btn-primary btn-block">Login</button>
                            </div>
                            <!-- /.submit -->

                        </div>
                    </form>



                    @if (Route::has('password.request'))
                        <p class="mb-2">
                            <a href="{{ route('password.request') }}">Forgot Your Password?</a>
                        </p>
                    @endif

                    <p class="mb-3">
                        <a href="{{ route('register') }}" class="text-center">Register </a>
                    </p>

                    <div class="text-sm text-center">
                        <p>This is a secure area of the application. Please confirm your password before continuing.</p>
                    </div>

                </div><!-- /.login-card-body -->
            </div><!-- card -->
        </div><!-- /.login-box -->
    @endsection
