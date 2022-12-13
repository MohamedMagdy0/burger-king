@extends('layouts.backend.auth_app')
@section('page_title')
    Register
@endsection
@section('content')

    <body class="hold-transition register-page my-3">
        <div class="register-box mx-auto">
            <div class="card ">

                <div class="card-header mb-0">
                    <div class="register-logo">
                        <a href="/"><b style="color: #f43438;"><img src="{{ asset('assets/client/images/logo.png') }}"
                                    class="rounded-circle m-0 p-3" style="background-color: #f43438"
                                    alt=""><br>Burgers</b></a>
                    </div><!-- /.login-logo -->
                </div><!-- card-header -->

                <div class="card-body register-card-body">
                    <h5 class="register-box-msg text-primary text-bold mt-2 mb-3">Sign Up | Register</h5>



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

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Name" type="text" name="name"
                                :value="old('name')" required autofocus autocomplete="name" />
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                        </div><!-- name -->

                        <div class="input-group mb-3">
                            <input type="email" class="form-control" placeholder="Email" type="email" name="email"
                                :value="old('email')" required />
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div><!-- email -->

                        <div class="input-group mb-3">
                            <input type="password" class="form-control" placeholder="Password" type="password"
                                name="password" required autocomplete="new-password" />
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div><!-- password -->

                        <div class="input-group mb-3">
                            <input type="password" class="form-control" placeholder="Password Confirmation" type="password"
                                name="password_confirmation" required autocomplete="new-password" />
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div><!-- Password Confirmation -->

                        <div class="row">

                            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                                <!-- app/config/Jetstream-> features uncomment   -->
                                <div class="col-8 flex">
                                    <label for="terms">

                                        {{-- C:\Users\IMEX\Desktop\PROJECTS\Burgers\vendor\laravel\jetstream\src\Http\Controllers\Livewire\PrivacyPolicyController.php: 23 --}}
                                        <input type="checkbox" class="mx-1" name="terms" id="terms" />
                                        {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                            'terms_of_service' =>
                                                '<a target="_blank" href="' .
                                                route('terms.show') .
                                                '" class="underline text-sm  ">' .
                                                __('Terms of Service') .
                                                '</a>',

                                            'privacy_policy' =>
                                                '<a target="_blank" href="' .
                                                route('policy.show') .
                                                '" class="underline text-sm  ">' .
                                                __('Privacy Policy') .
                                                '</a>',
                                        ]) !!}

                                    </label>
                                </div><!-- col-8  -->
                            @endif

                            <div class="col-4  ">
                                <button type="submit" class="btn btn-primary btn-block">Register</button>
                            </div><!-- /.Register -->

                        </div><!-- row -->

                    </form>

                    @if (Route::has('password.request'))
                        <p class="mb-2">
                            <a href="{{ route('password.request') }}">Forgot Your Password?</a>
                        </p>
                    @endif

                    <p class="mb-1">
                        <a href="{{ route('login') }}" class="text-center">Already registered? </a>
                    </p>


                </div><!-- /.register-card-body -->
            </div><!-- card -->
        </div><!-- /.register-box -->
    @endsection
