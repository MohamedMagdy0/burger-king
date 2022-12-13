@extends('layouts.backend.auth_app')
@section('page_title')
    Reset Password
@endsection
@section('content')

    <body class="hold-transition reset_password-page">
        <div class="reset_password-box">
            <div class="card m-auto">

                <div class="card-header mb-0">
                    <div class="reset_password-logo">
                        <a href="/"><b style="color: #f43438;"><img src="{{ asset('assets/client/images/logo.png') }}"
                                    class="rounded-circle m-0 p-3" style="background-color: #f43438"
                                    alt=""><br>Burgers</b></a>
                    </div><!-- /.reset_password-logo -->
                </div><!-- card-header -->

                <div class="card-body reset_password-card-body">
                    <h5 class="reset_password-box-msg text-primary text-bold mt-2 mb-3">Reset Password</h5>


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

                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $request->route('token') }}">

                        <div class="input-group mb-3">
                            <input type="email" class="form-control" placeholder="Email"  name="email" :value="old('email', $request->email)" required autofocus />
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div><!-- email -->
                        <div class="input-group mb-3">
                            <input class="form-control" placeholder="Password"type="password" name="password" required autocomplete="new-password" />
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div><!-- password -->

                        <div class="input-group mb-3">
                            <input  class="form-control" placeholder="Password Confirmation" type="password" name="password_confirmation" required autocomplete="new-password" />
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div><!-- Password Confirmation -->

                        <div class="">
                                <button type="submit" class="btn btn-primary btn-block">Reset Password</button>
                            </div>
                            <!-- /.submit -->


                </div><!-- /.reset_password-card-body -->
            </div><!-- card -->
        </div><!-- /.reset_password-box -->
    @endsection
