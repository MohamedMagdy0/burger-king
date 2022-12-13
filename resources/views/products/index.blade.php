@extends('layouts.backend.back_app')
@section('page_title')
    Products
@endsection
@section('content')

    @if (session('success'))
        <div class="alert alert-success text-center text-warning">
            <h3>{{ session('success') }}</h3>
        </div>
    @endif

    @if (count($products) > 0)
        <div class="card-header text-center text-capitalize bg-danger">
            <h1 class="">All Product : {{ count($products) }}</h1>
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

                        <th>Created at</th>
                        <th>Details</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>


                    @php($i=1)
                    @foreach ($products as $product)
                        <tr class="m-0">
                            <td>{{ $products->FirstItem()+$loop->index}}</td>

                            <td>{{ $product->name }}</td>

                             @if (Auth::check() && $product->user->name == null)
                             <td><span class="text-danger text-bold">Null Name</span></td>
                             @else

                             <td>{{ $product->user->name}}</td>
                             @endif

                            <td>{{ $product->category }}</td>
                            {{-- <td><img src="{{ asset(Storage::url($product->image)) }}" width="60px" alt=""></td> --}}
                            <td><img src="{{  asset($product->image) }}" width="60px" alt=""></td>
                            {{-- <td><img src="{{ asset( ($product->image)) }}" width="60px" alt=""></td> --}}

                            <td>{{ $product->price }}</td>
                            {{-- <td>{{ $product->sale_price }}</td> --}}

                            <td>{{ $product->type }}</td>
                            {{-- <td>{{ $product->description }}</td> --}}
                            {{-- <td>{{ $product->quantity }}</td> --}}

                            <td>{{Carbon\Carbon::parse( $product->created_at)->diffForHumans() }} <br> {{ date('Y-m-d') }}</td>


                            <td><a href="{{ route('products.show', ['id' => $product->id]) }}"
                                    class="btn btn-primary btn-sm">Details</a></td><!-- Details -->
                            <td><a href="{{ route('products.edit', ['id' => $product->id]) }}"
                                    class="btn btn-success btn-sm">Edit</a></td><!-- Edit -->

                            <!-- delete btn -->
                            <td>

                                <button class="btn btn-danger btn-sm" data-toggle="modal"
                                    data-target="#modal-default{{ $product->id }}">Delete</button>

                                <div class="modal fade" id="modal-default{{ $product->id }}">

                                    <form action="{{ route('products.soft_delete', ['id' => $product->id]) }}" method="post">
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
            <h3>Sorry No Products Inserted <br><a class="linked text-primary" href="{{ route('products.create') }}">Click
                    To Add</a></h3>
        </div>
    @endif

    <div class="card-header text-center text-capitalize bg-danger ">
            {{ $products->links() }}
        </div><!-- card-header -->

@endsection
