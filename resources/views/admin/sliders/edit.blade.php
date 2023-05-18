@extends('layouts.admin')
@section('content')

<div class="row">
    <div class="col-md-12">
        @if(session('message'))
        <div class="alert alert-success">{{session('message')}}</div>
        @endif
        <div class="card">
            <div class="card-header">
                <h4>Edit Slider
                    <a href="{{ url('admin/sliders') }}" class="btn btn-sm btn-dark float-end">Back</a>
                </h4>
            </div>

            <div class="card-body">

<form action="{{ url('admin/sliders/'.$slide->id) }}" method="POST" enctype="multipart/form-data">
@method('PUT')
@csrf

<div class="mb-3">
    <label>Title</label>
<input type="text" name="title" class="form-control" value="{{ $slide->title }}">
</div>

<div class="mb-3">
    <label>Description</label>
<input type="text" name="description" class="form-control" value="{{ $slide->description }}">
</div>


<div class="mb-3">
    <label>Image</label>
<input type="file" name="image" class="form-control">
<img src="{{ asset($slide->image) }}" width="70px" height="60px"  class="mt-2"/>
</div>


<div class="mb-3">
    <label>Status</label>
<input type="checkbox" name="status" style="width:30xp;height:30px"
value="{{ $slide->status }}
/> Checked=Hidden, Uncheked=Visibke
</div>


<div class="mb-3">
    <button type="submit" class="btn btn-sm btn-dark float-end">Save</button>
</div>
</div>
</form>


    </div>

</div>
</div>

</div>
@endsection
