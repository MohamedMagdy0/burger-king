@extends('layouts.backend.back_app')
@section('page_title')
    Payments
@endsection
@section('content')

    @if (session('success'))
        <div class="alert alert-success text-center text-warning">
            <h3>{{ session('success') }}</h3>
        </div>
    @endif

    @if (count($payments) > 0)
        <div class="card-header text-center text-capitalize bg-danger">
            <h1 class="">All Payment : {{ count($payments) }}</h1>
        </div><!-- card-header -->

        <div class="card-body text-center ">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>order_id</th>
                        <th>transaction_id</th>
                        <th>date</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>


                    @php($i=1)
                    @foreach ($payments as $payment)
                        <tr class="m-0">

                        {{-- <td>{{ $payment->firstItem()+$loop->index }}</td> --}}
                        <td>{{ $i++ }}</td>
                        <td>{{ $payment->order_id }}</td>
                        <td>{{ $payment->transaction_id }}</td>
                      <td>{{ Carbon\Carbon::parse($payment->date)->diffForHumans() }}<br>{{ $payment->date  }}</td>


                            <!-- delete btn -->
                            <td>

                                <button class="btn btn-danger btn-sm" data-toggle="modal"
                                    data-target="#modal-default{{ $payment->id }}">Delete</button>

                                <div class="modal fade" id="modal-default{{ $payment->id }}">

                                    <form action="{{ route('products.soft_delete', ['id' => $payment->id]) }}" method="post">
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
                                                            class="text-success">{{ $payment->transaction_id }}</span> <br>
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
            {{-- {{ $orders->links() }} --}}
        </div><!-- card-header -->

@endsection
