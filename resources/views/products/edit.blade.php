@extends('layouts.backend.back_app')
@section('page_title')
Edit Product
@endsection
@section('content')

    <section class="container">
        <div class="card w-75 mx-auto">

            <div class="card-header text-center text-capitalize bg-danger">
                <h1 class="">Edit Product</h1>
            </div><!-- card-header -->

            <div class="card-body">
                <form action="{{ route('products.update', ['id'=> $product->id]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="my-3">
                        <label>Product Name</label>
                        <input type="text" name="name" value="{{ $product->name }}" class="form-control form-control-lg">
                    </div>  <!-- Product Name -->


                    <div class="my-3">
                        <label>Product Quantity</label>
                        <input type="number" name="quantity" value="{{ $product->quantity }}" class="form-control form-control-lg" >
                    </div>  <!-- Product quantity -->

                    <div class="my-3">
                        <label>Product Category</label>
                        <select name="category" class="form-control form-control-lg">

                            <option value="{{ $product->category }}">{{ $product->category }}</option>

                            <option value="burgers">burgers</option>
                            <option value="chicken">chicken</option>
                            <option value="beverages">beverages</option>
                            <option value="breakfast">breakfast</option>
                        </select>
                    </div>  <!-- Product category -->

                    <div class="my-3">
                        <label>Product type</label>
                        <input type="text" name="type" value="{{ $product->type }}" class="form-control form-control-lg">
                    </div>  <!-- Product type -->

                    <div class="my-3">
                        <label>Product Sale price</label>
                        <input type="text"  name="sale_price" value="{{ $product->sale_price }}" class="form-control form-control-lg">
                    </div>  <!-- Product sale_price -->

                    <div class="my-3">
                        <label>Product Price</label>
                        <input type="text" name="price" value="{{ $product->price }}" class="form-control form-control-lg">
                    </div>  <!-- Product Price -->

                    <div class="my-3">
                        <label>Product Description</label>
                        <textarea rows="3" name="description" class="form-control form-control-lg">{{ $product->description }}</textarea>
                    </div>  <!-- Product description -->

                    <div class="my-3">
                        <label>Product Image</label>
                        <input type="file" name="image" class="form-control form-control-lg mb-3"><br>
                        {{-- <img src="{{ asset(Storage::url( $product->image )) }}" width="50px" alt=""> --}}
                        <img src="{{ asset(( $product->image )) }}"  alt="">

                    </div>  <!-- Product image -->


                    <div class="my-3 text-center">
                        <button type="submit" class="btn btn-lg btn-success ">Update</button>
                    </div>  <!-- Product description -->




                </form>
            </div><!-- card-body -->

            <div class="card-footer text-center text-capitalize bg-danger">
            </div><!-- card-footer -->

        </div><!-- card -->

    </section><!-- container -->

@endsection
