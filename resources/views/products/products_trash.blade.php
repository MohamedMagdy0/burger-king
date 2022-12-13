@extends('layouts.backend.back_app')
@section('page_title')
    Products Trash
@endsection
@section('content')

    @if (session('success'))
        <div class="alert alert-success text-center text-warning">
            <h3>{{ session('success') }}</h3>
        </div>
    @endif

    @if (count($products) > 0)
        <div class="card-header text-center text-capitalize bg-orange">
            <h1 class=""> Product Trash : {{ count($products) }}</h1>
        </div><!-- card-header -->

        <div class="card-body text-center ">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>User Name</th>
                        <th>Category</th>
                        <th>Image</th>
                        <th>Price</th>
                        {{-- <th>Sale price</th> --}}
                        <th>Type</th>
                        {{-- <th>Description</th> --}}
                        {{-- <th>Quantity</th> --}}


                        <th>Restore</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>


                    @php($i = 1)
                    @foreach ($products as $product)
                        <tr class="m-0">

                            <td>{{ $products->FirstItem() + $loop->index }}</td>

                            <td>{{ $product->name }}</td>


                            @if (Auth::check() &&  $product->user->name == null)
                                <td><span class="text-danger text-bold">Null Name</span></td>
                            @else
                                <td>{{ $product->user->name }}</td>
                            @endif


                            <td>{{ $product->category }}</td>
                            {{-- <td><img src="{{ asset(Storage::url($product->image)) }}" width="60px" alt=""></td> --}}
                            <td><img src="{{ asset($product->image) }}" width="60px" alt=""></td>

                            <td>{{ $product->price }}</td>
                            {{-- <td>{{ $product->sale_price }}</td> --}}

                            <td>{{ $product->type }}</td>
                            {{-- <td>{{ $product->description }}</td> --}}
                            {{-- <td>{{ $product->quantity }}</td> --}}

                            <!-- Restore btn -->
                            <td><a
                                    href="{{ route('products.products_restore', ['id' => $product->id]) }}"class="btn btn-primary btn-sm">Restore</a>
                            </td>


                            <!-- delete btn -->
                            <td>

                                <button class="btn btn-danger btn-sm" data-toggle="modal"
                                    data-target="#modal-default{{ $product->id }}">Delete</button>

                                <div class="modal fade" id="modal-default{{ $product->id }}">

                                    <form action="{{ route('products.delete', ['id' => $product->id]) }}" method="post">
                                        @csrf
                                        @method('delete')

                                        <div class="modal-dialog">
                                            <div class="modal-content">

                                                <div class="modal-header bg-danger">
                                                    <h4 class="modal-title italic text-center">Alert</h4>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div><!-- modal-header -->

                                                <div class="modal-body">
                                                    <p>Are you make sure of deleting : <span
                                                            class="text-success">{{ $product->name }}</span> <br>
                                                        it will be deleted permenantly&hellip;</p>
                                                </div><!-- modal-body" -->

                                                <div class="modal-footer justify-content-between bg-danger">
                                                    <button type="button" class="btn btn-default"
                                                        data-dismiss="submit">Close</button>
                                                    <button type="submit" class="btn btn-default">Delete</button>
                                                </div><!-- modal-footer -->

                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->

                                    </form> <!-- enddd form -->

                                </div><!-- /.modal -->




                            </td>
                        </tr>
                    @endforeach


                </tbody>

            </table>
        </div><!-- card-body -->
    @else
        <div class="alert alert-dark text-warning text-center m-5 p-3">
            <h3>Sorry No Products Trashed Available <br> Now</h3>
        </div>
    @endif

    <div class="card-footer text-center text-capitalize bg-orange ">
        {{ $products->links() }}
    </div><!-- card-body -->

@endsection
