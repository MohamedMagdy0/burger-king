@extends('layouts.frontend.master_app')
@section('page_title')
    Cart
@endsection
@section('content')

    <section class="cart container mt-2 my-3 py-5">
        <div class="container mt-2 text-center">
            <h4>Your Cart</h4>
            <hr class="mx-auto">
        </div>

        <table class="pt-5">
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Subtotal</th>
            </tr>

            @if (session()->has('cart'))
                @foreach (session()->get('cart') as $id => $product)
                    <tr>
                        <td>
                            <div class="product-info">
                                <img src="{{ asset($product['image']) }}">
                                <div>
                                    <p>{{ $product['name'] }}</p>
                                    <small><span>$</span>{{ $product['price'] }}</small>
                                    <br>

                                    <form action="{{ route('burgers.remove_from_cart') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $product['id'] }}">

                                        <input type="submit" name="remove_btn" class="remove-btn" value="remove">
                                    </form>

                                </div>
                            </div>
                        </td>

                        <td>
                            <form action="{{ route('burgers.edit_product_quantity_btn') }}" method="post">
                                @csrf
                                <input type="submit" value="-" class="edit-btn" name="decrease_product_quantity_btn">

                                <input type="hidden" name="id" value="{{ $product['id'] }}">
                                <input type="text" name="quantity" value="{{ $product['quantity'] }}" readonly>

                                <input type="submit" value="+" class="edit-btn" name="increase_product_quantity_btn">
                            </form>
                        </td>

                        <td>
                            <span class="product-price">
                               $ {{ (double) $product['price'] * (double) $product['quantity'] }}</span>
                        </td>
                    </tr>
                @endforeach
            @endif

        </table>


        <div class="cart-total">
            <table>
                @if (Session::has('cart'))
                    <tr>
                        <td>Total</td>
                        @if (Session::has('total_price'))
                            <td>$ {{ Session::get('total_price') }}</td>
                        @endif <!-- if (Session::has('total_price')) -->

                    </tr>
                @endif <!-- if (Session::has('cart')) -->
            </table>
        </div><!-- cart-total -->


        <!-- start checkout part -->
        <div class="checkout-container">

        @if (Session::has('total_price') && Session::get('total_price')>0)
             <form action="{{ route('burgers.checkout') }}" method="post">
                @csrf
                <input type="submit" class="btn checkout-btn" value="Checkout" >
            </form>

        @endif <!-- if (Session::has('total_price') && Session::get('total_price') >0) -->

        </div><!-- checkout-container -->

    </section><!-- cart -->

@endsection
