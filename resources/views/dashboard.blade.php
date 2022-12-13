@extends('layouts.frontend.master_app')
@section('page_title')
    Dashboard
@endsection
@section('content')

    @if (session('status'))
        <div class="alert alert-success text-center text-warning">
            <h3>{{ session('status') }}</h3>
        </div>
    @endif

    <!-- Profile Image -->
    <div class="card card-primary card-outline py-2">
        <div class="card-body box-profile" style="margin: 20px; padding: 15px">

            <div class=""style="margin: 20px;">
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                    <div class="image"style="width: 100px;">
                        @if (Auth::check() && auth()->user()->profile_photo_url != null)
                            <img src="{{ asset(auth()->user()->profile_photo_url) }}" class="img-circle" alt="User Image">
                        @else
                            <img src="{{ asset('assets/client/images/male-avatar.jpg') }}" class="img-circle"
                                alt="User ">
                        @endif
                    </div> <!--  image -->
                @endif <!-- end if (Laravel\Jetstream\Jetstream::managesProfilePhotos()) -->

            </div> <!-- image -->

            <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item" style="margin: 10px;">
                    <b>Name : </b> <a class="float-right">{{ auth()->user()->name }}</a>
                </li>
                <li class="list-group-item" style="margin: 10px;">
                    <b>Role : </b> <a class="float-right">{{ auth()->user()->is_admin }}</a>
                </li>
                <li class="list-group-item" style="margin: 10px;">
                    <b>Email : </b> <a class="float-right">{{ auth()->user()->email }}</a>
                </li>
            </ul> <!--  -->
            <div style="margin: 30px; display: flex; justify-content: space-between">

                <a class="btn btn-success" href="{{ route('profile.show') }}">Edit Profile</a>


                <a class="btn btn-primary" href="{{ route('burgers.user_orders') }}">My Orders</a>


                <form action="{{ route('logout') }}" method="get">
                    <button class="btn btn-danger " type="submit">Logout</button>
                </form> <!-- logout -->
            </div> <!-- btn div -->

        </div> <!-- /.card-body -->
    </div> <!-- /.card -->

@endsection






















{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-jet-welcome />
            </div>
        </div>
    </div>
</x-app-layout> --}}
