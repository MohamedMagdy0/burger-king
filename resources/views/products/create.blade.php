@extends('layouts.backend.back_app')
@section('page_title')
Create Product
@endsection
@section('content')

    <section class="container">
        <div class="card w-75 mx-auto">

            <div class="card-header text-center text-capitalize bg-danger">
                <h1 class="">Create Product</h1>
            </div><!-- card-header -->

            <div class="card-body">


@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif



                <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="my-3">
                        <label>Product Name</label>
                        <input type="text" name="name" class="form-control form-control-lg" placeholder="Product Name">
                    </div>  <!-- Product Name -->


                    <div class="my-3">
                        <label>Product Quantity</label>
                        <input type="number" value="0" name="quantity" class="form-control form-control-lg" placeholder="Product Quantity">
                    </div>  <!-- Product quantity -->

                    <div class="my-3">
                        <label>Product Category</label>
                        <select name="category" class="form-control form-control-lg">

                            <option value="">Select Category</option>

                            <option value="burgers">burgers</option>
                            <option value="chicken">chicken</option>
                            <option value="beverages">beverages</option>
                            <option value="breakfast">breakfast</option>
                        </select>
                    </div>  <!-- Product category -->

                    <div class="my-3">
                        <label>Product type</label>
                        <input type="text" name="type" class="form-control form-control-lg" placeholder="Product type">
                    </div>  <!-- Product type -->

                    <div class="my-3">
                        <label>Product Price</label>
                        <input type="text" name="price" class="form-control form-control-lg" placeholder="Product price">
                    </div>  <!-- Product Price -->

                    <div class="my-3">
                        <label>Product Sale price</label>
                        <input type="text" value="0" name="sale_price" class="form-control form-control-lg" placeholder="Product Sale price">
                    </div>  <!-- Product sale_price -->

                    <div class="my-3">
                        <label>Product Description</label>
                        <textarea rows="3" name="description" class="form-control form-control-lg" placeholder="Product Description"></textarea>
                    </div>  <!-- Product description -->

                    <div class="my-3">
                        <label>Product Image</label>
                        <input type="file" name="image" class="form-control form-control-lg">
                    </div>  <!-- Product image -->


                    <div class="my-3 text-center">
                        <button type="submit" class="btn btn-lg btn-warning ">Create</button>
                    </div>  <!-- Product description -->




                </form>
            </div><!-- card-body -->

            <div class="card-footer text-center text-capitalize bg-danger">
            </div><!-- card-footer -->

        </div><!-- card -->

    </section><!-- container -->

@endsection
