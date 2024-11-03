@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h4>
                        <a href="{{ url('admin/users') }}" class="btn btn-sm btn-dark float-end">Back</a>
                    </h4>
                </div>

                <div class="card-body">

                    <form action="{{ route('user.update', $user->id) }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                            </div>


                            <div class="mb-3 col-md-6">
                                <label class="form-label">Email</label>
                                <input type="email" name="name" class="form-control" value="{{ $user->email }}">
                            </div>

                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="role">Role</label>
                                <select class="form-select" id="role" name="role_as">
                                    <option value="1" {{ $user->role_as == 1 ? 'selected' : '' }}>Admin</option>
                                    <option value="0" {{ $user->role_as == 0 ? 'selected' : '' }}>User</option>
                                </select>
                            </div>


                            <div class="mb-3 col-md-6">
                                <label class="form-label">Password</label>
                                <input type="text" name="password" class="form-control">
                            </div>


                            <div class="mb-3">
                                <button type="submit" class="btn btn-sm btn-dark float-end">Update</button>
                            </div>
                        </div>
                    </form>


                </div>

            </div>
        </div>

    </div>
@endsection
