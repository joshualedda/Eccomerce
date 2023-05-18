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
                    <a href="{{ url('admin/colors') }}" class="btn btn-sm btn-dark float-end">Back</a>
                </h4>
            </div>

            <div class="card-body">

<form action="{{ url('admin/colors/create') }}" method="POST">
@csrf
<div class="row">
<div class="mb-3 col-md-6">
    <label>Color Name</label>
<input type="text" name="name" class="form-control">
</div>

<div class="mb-3 col-md-6">
    <label>Color Code</label>
<input type="text" name="code" class="form-control">
</div>


<div class="mb-3 col-md-12">
    <input class="form-check-input" name="status" type="checkbox" value="" id="flexCheckDefault">
    <label class="form-check-label" for="flexCheckDefault">
     Color Status
    </label>
</div>
<div class="mb-3">
    <button type="submit" class="btn btn-sm btn-dark float-end">Add</button>
</div>
</div>
</form>


    </div>

</div>
</div>

</div>
@endsection
