@extends('layouts.frontend.master_app')
@section('page_title')
    User Orders
@endsection
@section('content')
    <section class="container">
        <div class="card ">
            <div class="card-header" style="margin: 5px; padding: 15px; color: #fff; background: #f43438;">
                <h3 class="text-center">Your Orders : {{ auth()->user()->name }}</h3>
            </div>
            <div class="card-body table-responsive p-0">
                <table class="table table-hover table-striped table-bordered text-center" style=" padding: 15px;">
                    <thead style="background: #f43438;  color: #fff;">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Cost</th>
                            <th>City</th>
                            <th>Phone</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Detail Orders</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($user_orders as $user_order)
                            <tr>
                                <td>{{ $user_order->id }}</td>
                                <td>{{ $user_order->name }}</td>
                                <td>${{ $user_order->cost }}</td>

                                <td>{{ $user_order->city }}</td>
                                <td>{{ $user_order->phone }}</td>
                                <td>{{ $user_order->status }}</td>

                                <td class="text-center">{{ Carbon\Carbon::parse($user_order->date)->diffForHumans() }}<br>
                                    {{ $user_order->date }}
                                </td>
                                <td><a class="btn btn-primary" href="{{ route('burgers.detail_orders', ['id'=>$user_order->id]) }}">Detail Orders</a></td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div><!-- /.card-body -->

            <div style="margin: 30px; display: flex; justify-content: space-between">

                <a class="btn btn-success" href="{{ route('profile.show') }}">Edit Profile</a>


                <form action="{{ route('logout') }}" method="get">
                    <button class="btn btn-danger " type="submit">Logout</button>
                </form> <!-- logout -->
            </div> <!-- btn div -->
        </div><!-- card -->
    </section><!-- container -->
@endsection
