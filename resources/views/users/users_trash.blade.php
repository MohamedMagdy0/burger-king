@extends('layouts.backend.back_app')
@section('page_title')
    Users Trash
@endsection
@section('content')

    @if (session('success'))
        <div class="alert alert-success text-center text-warning">
            <h3>{{ session('success') }}</h3>
        </div>
    @endif

    @if (count($users) > 0)
        <div class="card-header text-center text-capitalize bg-orange ">
            <h1 class="">Users Trash : {{ count($users) }}</h1>
        </div><!-- card-header -->

        <div class="card-body text-center ">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>

                        <th>Created at</th>
                        <th>Is Admin</th>


                        <th>Restore</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>

                    {{-- @php($key = 1) --}}

                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $users->FirstItem()+$loop->index }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>

 {{-- use it when y dont use mode -> route or controller <td>{{ Carbon\Carbon::parse($user->created_at->diffForHumans()) }}</td> --}}
                            <td class="text-sm">{{ $user->created_at->diffForHumans()  }}<br>{{ $user->created_at }}</td>
                            <td class="text-orange">{{ $user->is_admin }}</td>

                            <!-- Restore btn -->
                            <td><a href="{{ route('users.users_restore', ['id'=> $user->id]) }}" class="btn btn-success btn-sm">Restore</a></td>

                            <td><!-- delete btn -->
                                <button class="btn btn-danger btn-sm" data-toggle="modal"
                                    data-target="#modal-default{{ $user->id }}">Delete</button>

                                <div class="modal fade" id="modal-default{{ $user->id }}">

                                    <form action="{{ route('users.delete', ['id' => $user->id]) }}" method="post">
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
                                                            class="text-success">{{ $user->name }}</span> <br>
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
                        </tr><!-- delete btn -->
                    @endforeach


                </tbody>

            </table>
        </div><!-- card-body -->
    @else
        <div class="alert alert-dark text-warning text-center m-5 p-3">
            <h3>Sorry No Users Trashed Available <br></h3>
        </div>
    @endif
    <div class="card-footer text-center text-capitalize bg-orange ">
            {{ $users->links() }}
        </div><!-- card-header -->

@endsection
