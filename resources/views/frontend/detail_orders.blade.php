@extends('layouts.frontend.master_app')
@section('page_title')
    User Orders
@endsection
@section('content')
    <section class="container">
        <div class="card w-75">
            <div class="card-header" style="margin: 5px; padding: 15px; color: #fff; background: #f43438;">
                <h3 class="text-center">Your Orders : {{ auth()->user()->name }}</h3>
            </div>
            <div class="card-body table-responsive p-0">
                <table class="table table-hover table-striped table-bordered text-center" style=" padding: 15px;">
                    <thead style="background: #f43438;  color: #fff;">
                        <tr>
                            <th>Image</th>
                            <th>Order Id</th>
                            <th>Quantity</th>
                            <th>price</th>
                            <th>Date</th>

                        </tr>
                    </thead>
                    <tbody>


                            <tr>
                                <td><img src="{{ asset( $order_item->product_image ) }}" style="width: 80px;" alt=""> </td>
                                <td>{{ $order_item->order_id }}</td>
                                <td>${{ $order_item->product_quantity }}</td>
                                <td>{{ $order_item->product_price }}</td>
                                <td class="text-center">{{ Carbon\Carbon::parse($order_item->order_date)->diffForHumans() }}<br>
                                    {{ $order_item->order_date }}
                                </td>

                            </tr>


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
