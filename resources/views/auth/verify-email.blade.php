@extends('layouts.backend.auth_app')
@section('page_title')
    Verify Password
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
                    <h5 class="login-box-msg text-primary text-bold mt-2 mb-3">Verify Password</h5>


                    <div class="my-2 text-sm ">
                        <p>Before continuing, could you verify your email address by clicking on the link we just emailed to
                            you? If you didn\'t receive the email, we will gladly send you another.</p>
                    </div>


                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if (session('status') == 'verification-link-sent')
                        <div class="mb-4 font-medium text-sm">
                            <p>A new verification link has been sent to the email address you provided in your profile settings.</p>
                        </div>
                    @endif




                    <div class="my-3 flex items-center justify-between">
                        <form method="POST" action="{{ route('verification.send') }}">
                            @csrf



                            <div class="">
                                <button type="submit" class="btn btn-primary btn-block">Resend Verification Email</button>
                            </div>
                            <!-- /.submit -->
                        </form>


                        <div>
                            <a href="{{ route('profile.show') }}" class="underline text-sm ">Edit Profile</a>

                            <form method="POST" action="{{ route('logout') }}" class="inline">
                                @csrf

                                <button type="submit" class="underline text-sm ">Log Out</button>
                            </form>
                        </div>


                    </div><!-- flex -->

                </div><!-- /.forget-card-body -->
            </div><!-- card -->
        </div><!-- /.forget_password-box -->
    @endsection
