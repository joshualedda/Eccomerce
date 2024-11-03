@extends('layouts.admin')
@section('content')

<section>

    <div class="d-flex justify-content-end my-2">
        <a href="products/create" class="btn btn-sm btn-dark">Add Product</a>
    </div>

    @if(session('message'))
    <div class="alert alert-success">{{session('message')}}</div>
    @endif



    <div class="col-md-12">

        <div class="card">


            <div class="card-body">
                               <table class="datatable table table-bordered table-striped" id="datatable">
                    <thead>
                        <tr>
                            <th>Category ID</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Brand</th>
                            <th>Quantity</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                 @forelse ($products as $product )

                        <tr>
                <th>{{ $product->category->name }}</th>
                <th>
                @if($product->category)
                    {{ $product->name }}
                @endif
                </th>
                <th>{{ $product->slug }}</th>
                <th>{{ $product->brand }}</th>
                <th>{{ $product->quantity }}</th>
                <th>{{ $product->status }}</th>
                <th>
                    <a href="{{url('admin/product/'.$product->id.'/edit')}}"  class="btn btn-sm btn-dark" > Update</a>
                    <a href="#"  class="btn btn-sm btn-dark" >Delete</a>
                </th>
            </tr>
                       @empty
                        <td colspan="5">No Brands Found</td>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>


</div>

</section>
@endsection
