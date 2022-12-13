@extends('layouts.frontend.master_app')
@section('page_title')
    Thank You
@endsection

@section('content')

    <section class="container">
        <div class=" text-center bg-info " style="padding: 10px; margin-top: 40px; margin-bottom: 40px;">



            {{-- @if (Session::has('transaction_id') && Session::get('transaction_id') != null) --}}
                @if (Session::has('order_id') && Session::get('order_id') != null)
                    <h1 class="text-center text-danger" style="margin-bottom: 20px;">thank you</h1>
                    <h3 class="bg-danger " style="margin-bottom: 30px; font-weight: bold">Order Id :
                        {{ Session::get('order_id') }}</h3>
                    <h4 class="text-success" style="margin-bottom: 20px;">please keep your Order Id in Save place for future reference
                    <h5 class="text-pink" style="margin-bottom: 20px;">The order will deliver with 30:45 be ready and keep in touch
                    </h5>
                @endif
            {{-- @endif --}}
        </div>

    </section><!-- container -->


@endsection
