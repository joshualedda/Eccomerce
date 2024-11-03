@extends('layouts.admin')
@section('content')
    @if (session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif



    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4>Create New User</h4>
            <a href="{{ url('admin/users') }}" class="btn btn-sm btn-dark">Back</a>
        </div>


        <div class="card-body">
            <form action="{{ route('user.store') }}" method="POST">
                @csrf
                <div class="row">

                    <div class="mb-3 col-md-6">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" >
                        @error('name')
                            <span class="text-sm text-danger my-2">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3 col-md-6">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" >
                        @error('email')
                            <span class="text-sm text-danger my-2">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3 col-md-6">
                        <label for="role">Role</label>
                         <select class="form-select" id="role" name="role_as" >
                            <option value="1">Admin</option>
                            <option value="0">User</option>
                        </select>
                        @error('role_as')
                            <span class="text-sm text-danger my-2">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3 col-md-6">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" >
                        @error('password')
                            <span class="text-sm text-danger my-2">{{ $message }}</span>
                        @enderror
                    </div>


                </div>

                <button type="submit" class="btn btn-dark text-white">Create User</button>
            </form>





        </div>

    </div>
@endsection
