@extends('layouts.backend.back_app')
@section('page_title')
    Orders
@endsection
@section('content')

    @if (session('success'))
        <div class="alert alert-success text-center text-warning">
            <h3>{{ session('success') }}</h3>
        </div>
    @endif

    @if (count($orders) > 0)
        <div class="card-header text-center text-capitalize bg-danger">
            <h1 class="">All Orders : {{ count($orders) }}</h1>
        </div><!-- card-header -->

        <div class="card-body text-center ">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>

                        <th>City</th>
                        <th>Address</th>
                        <th>Phone</th>

                        <th>Cost</th>
                        <th>Date</th>


                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>


                    @php($i=1)
                    @foreach ($orders as $order)
                        <tr class="m-0">

                        <td>{{ $orders->firstItem()+$loop->index }}</td>
                        <td>{{ $order->name }}</td>
                        <td>{{ $order->email }}</td>

                        <td>{{ $order->city }}</td>
                        <td>{{ $order->address }}</td>
                        <td>{{ $order->phone }}</td>

                        <td>${{ $order->cost }}</td>
                      <td>{{ Carbon\Carbon::parse($order->date)->diffForHumans() }}<br>{{ $order->date  }}</td>


                            <!-- delete btn -->
                            <td>

                                <button class="btn btn-danger btn-sm" data-toggle="modal"
                                    data-target="#modal-default{{ $order->id }}">Delete</button>

                                <div class="modal fade" id="modal-default{{ $order->id }}">

                                    <form action="{{ route('products.soft_delete', ['id' => $order->id]) }}" method="post">
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
                                                            class="text-success">{{ $order->name }}</span> <br>
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
                            </td> <!-- delete button model -->

                        </tr>
                    @endforeach


                </tbody>

            </table>
        </div><!-- card-body -->
    @else
        <div class="alert alert-dark text-warning text-center m-5 p-3">
            <h3>Sorry No Orders added <br><a class="linked text-primary" href="/">Click
                    To Add</a></h3>
        </div>
    @endif

    <div class="card-header text-center text-capitalize bg-danger ">
            {{ $orders->links() }}
        </div><!-- card-header -->

@endsection
