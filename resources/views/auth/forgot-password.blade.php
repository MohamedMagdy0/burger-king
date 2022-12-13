

@extends('layouts.backend.auth_app')
@section('page_title')
    Forget Password
@endsection
@section('content')

    <body class="hold-transition login-page">
        <div class="register-box">
            <div class="card m-auto">

                <div class="card-header  ">
                    <div class="login-logo">
                        <a href="/"><b style="color: #f43438;"><img src="{{ asset('assets/client/images/logo.png') }}"
                                    class="rounded-circle m-0 p-3" style="background-color: #f43438"
                                    alt=""><br>Burgers</b></a>
                    </div><!-- /.login-logo -->
                </div><!-- card-header -->

                <div class="card-body reset_password-card-body">
                    <h5 class="login-box-msg text-primary text-bold mt-2 mb-3">Forget Password</h5>


                    <div class="my-2 text-sm ">
                        <p>Forgot your password? No problem. Just let us know your email address and we will email you a
                            password reset link that will allow you to choose a new one.</p>
                    </div>

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




                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="input-group mb-3">
                            <input class="form-control" placeholder="Email" type="email" name="email"
                                :value="old('email')" required autofocus />
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope">Email</span>
                                </div>
                            </div>
                        </div><!-- email -->

                        <div class="my-2 mx-auto">
                            <button type="submit" class="btn btn-primary btn-block">Email Password Reset Link</button>
                        </div><!-- /.button submit -->

                    </form>

                </div><!-- /.forget-card-body -->
            </div><!-- card -->
        </div><!-- /.forget_password-box -->
    @endsection


