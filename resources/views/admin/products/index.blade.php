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
                <h4>
                    <a href="products/create" class="btn btn-sm btn-dark float-end"> Add</a>
                </h4>
            </div>

            <div class="card-body">
                <table class="table table-bordered table-striped">
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
        {{-- {{$products->links()}} --}}
    </div>
</div>
</div>

</div>
@endsection
