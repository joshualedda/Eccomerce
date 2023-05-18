@extends('layouts.admin')
@section('content')

<div class=""></div>
<div class="row">
    <div class="col-md-12">
        @if(session('message'))
        <div class="alert alert-success">{{session('message')}}</div>
        @endif
        <div class="card">
            <div class="card-header">
                <h4>Slider
                    <a href="{{ url('admin/sliders/create') }}" class="btn btn-sm btn-dark float-end"> Add Slider</a>
                </h4>
            </div>

            <div class="card-body">

                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tiltle</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($slides as $slide )
                <tr>

                    <td>{{ $slide->id }}</td>
                    <td>{{ $slide->title }}</td>
                    <td>{{ $slide->description }}</td>
                    <td>
                        <img src="{{ asset($slide->image) }}" width="60px" height="60px" />
                    </td>
                    <td>{{ $slide->status }}</td>
                    <td>
<a href="{{ url('admin/sliders/'.$slide->id.'/edit') }}" class="btn btn-sm btn-success">
    Update
</a >
<a href="{{ url('admin/sliders/'.$slide->id.'/delete') }}" class="btn-sm btn btn-danger"
    onclick="return confirm('Are you sure you want to delete this?');">
    Delete
</a>
                    </td>

                </tr>
                @empty
                <td>No Such Slide Exist</td>
                @endforelse
                    </tbody>
                </table>


        {{-- {{$products->links()}} --}}
    </div>
</div>
</div>

</div>
@endsection

