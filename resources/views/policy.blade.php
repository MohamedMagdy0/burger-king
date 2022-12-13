@extends('layouts.backend.auth_app')
@section('page_title')
    Policy
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



                    <div class="text-center  " style="color: #f43438;">
                        {!! $policy !!}
                    </div>

                </div><!-- /.login-card-body -->
            </div><!-- card -->
        </div><!-- /.login-box -->
    @endsection






    {{-- @extends('layouts.backend.auth_app')
@section('name')

<div class="pt-4 bg-gray-100">
    <div class="min-h-screen flex flex-col items-center pt-6 sm:pt-0">
            <div>
                <x-jet-authentication-card-logo />
            </div>

            <div class="w-full sm:max-w-2xl mt-6 p-6 bg-white shadow-md overflow-hidden sm:rounded-lg prose">
                {!! $policy !!}
            </div>
        </div>
    </div>


    @endsection --}}
