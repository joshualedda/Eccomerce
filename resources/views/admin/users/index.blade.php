@extends('layouts.admin')
@section('content')

<div class="row">
    <div class="col-md-12">
        @if(session('message'))
        <div class="alert alert-success">{{session('message')}}</div>
        @endif
        <div class="card">
            <div class="card-header">
                <h4>
                    <a href="user/create" class="btn btn-sm btn-dark float-end"> Add</a>
                </h4>
            </div>

            <div class="card-body">

                <table class="datatable table table-bordered table-striped" id="datatable">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Manage</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <a href="{{ url('admin/user/edit/'.$user->id) }}" class="btn btn-dark">Edit</a>

                                    <a href="#" class="btn btn-dark">Delete</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">No Users Found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

    </div>
</div>
</div>

</div>



@endsection
