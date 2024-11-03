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
                    <a href="colors/create" class="btn btn-sm btn-dark float-end"> Add</a>
                </h4>
            </div>

            <div class="card-body">

                               <table class="datatable table table-bordered table-striped" id="datatable">
                    <thead>
                        <tr>
                            <th>Color ID</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Manage</th>
                        </tr>
                    </thead>
                    <tbody>
                 @forelse ($colors as $color )
                        <tr>
                <th>{{ $color->id}}</th>
                <th>{{ $color->name }}</th>
                <th>{{ $color->code }}</th>
                <th>
                    <a href="{{url('admin/colors/'.$color->id.'/edit')}}"  class="btn btn-sm btn-dark" >Update</a>
                    <a href="#"  class="btn btn-sm btn-dark" >Delete</a>
                </th>
            </tr>
                       @empty
                        <td colspan="5">No Colors Found</td>
                    @endforelse
                    </tbody>
                </table>






        {{-- {{$products->links()}} --}}
    </div>
</div>
</div>

</div>
@endsection
