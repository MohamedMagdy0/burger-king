@extends('layouts.backend.back_app')
@section('page_title')
Product Details
@endsection
@section('content')

<section class="container p-4">
    <div class="card mx-auto w-50">
        <div class="card-header bg-danger mb-3 text-center">
             <h3>Product Details</h3>
        </div><!-- card-header  -->

        <div class="card-body m-3 ">
            <div class="p-5 mb-3 text-center">
                <img src="{{ asset(Storage::url( $product->image )) }}" width="200" alt="">
            </div>
            <div class="text-center">

                <h5 class=" mb-3 text-primary">Name : {{ $product->name }}</h5>
                <h6 class=" mb-3 text-success">Category : {{ $product->category }}</h6>
                <h6 class=" mb-3 text-success">Type : {{ $product->type }}</h6>
                <h6 class=" mb-3 text-success">Price : {{ $product->price }}</h6>
                <h6 class=" mb-3 text-warning">Sale price : {{ $product->sale_price }}</h6>
                <p class=" mb-3 text-secondary">Description : {{ $product->description }}</p>
            </div>

        </div><!-- card-footer -->

        <div class="card-body bg-danger mb-1">

        </div><!-- card-footer -->
    </div><!-- card -->
</section><!-- container -->



@endsection
