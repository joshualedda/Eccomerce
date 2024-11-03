@extends('layouts.admin')
@section('content')


<div class="row">
    <div class="col-md-12">
        @if(session('message'))
        <div class="alert alert-success">{{session('message')}}</div>
        @endif
        <div class="card">
            <div class="card-header">
                <h4> Edit Colors
                    <a href="{{ url('admin/colors') }}" class="btn btn-sm btn-dark float-end">Back</a>
                </h4>
            </div>

            <div class="card-body">

<form action="{{ url('admin/colors/'.$color->id) }}" method="POST">
@csrf
@method('put')
<div class="row">
<div class="mb-3 col-md-6">
    <label class="form-label">Color Name</label>
<input type="text" name="name" class="form-control" value="{{ $color->name }}">
</div>

<div class="mb-3 col-md-6">
    <label class="form-label">Color Code</label>
<input type="text" name="code" class="form-control"  value="{{ $color->code }}">
</div>


<div class="mb-3 col-md-12">
    <input class="form-check-input" name="status" type="checkbox" value="" id="flexCheckDefault">
    <label class="form-check-label" for="flexCheckDefault">
     Color Status
    </label>
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
