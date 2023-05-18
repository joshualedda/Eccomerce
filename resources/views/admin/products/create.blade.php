@extends('layouts.admin')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Add Product
                    <a href="{{ url('admin/product') }}" class="btn btn-sm btn-dark float-end">Back</a>
                </h3>
            </div>
            <div class="card-body">
                @if($errors->any())
                <div class="alert alert-warning">
                @foreach ($errors->all() as $error )
                <div>{{ $error }}</div>
                @endforeach
                </div>

                @endif

                <form action="{{url('admin/product')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Home</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="seo-tab" data-bs-toggle="tab" data-bs-target="#seo" type="button" role="tab" aria-controls="profile" aria-selected="false">Seo Tags</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="details-tab" data-bs-toggle="tab" data-bs-target="#details" type="button" role="tab" aria-controls="contact" aria-selected="false">Details</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="images-tab" data-bs-toggle="tab" data-bs-target="#images" type="button" role="tab" aria-controls="images" aria-selected="false">Images</button>
                    </li>

                    {{-- Colors --}}
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="images-tab" data-bs-toggle="tab" data-bs-target="#colors" type="button" role="tab" aria-controls="images" aria-selected="false">Colors</button>
                    </li>

                </ul>


                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane p-3 fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">


                        <div class="mb-3">
                            <label for="category">Category</label>
                            <select name="category_id" class="form-control text-dark">
                                @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label>Product Name</label>
                            <input type="text" name="name" class="form-control">
                        </div>



                        <div class="mb-3">
                            <label>Product Slug</label>
                            <input type="text" name="slug" class="form-control">
                        </div>



                        <div class="mb-3">
                            <label>Select Brand</label>
                            <select name="brand" class="form-control  text-dark">
                                @foreach ($brands as $brand)
                                <option value="{{$brand->name}}">{{$brand->name }}</option>
                                @endforeach
                            </select>
                        </div>


                          <div class="mb-3">
                            <label>Small Description</label>
                            <textarea type="text" name="small_description" class="form-control" rows="4"></textarea>
                        </div>

                        <div class="mb-3">
                            <label>Description</label>
                            <textarea type="text" name="description" class="form-control" rows="4"></textarea>
                        </div>


                    </div>


                    {{-- Next Tab --}}
                    <div class="tab-pane fade p-3" id="seo" role="tabpanel" aria-labelledby="profile-tab">

                        <div class="mb-3">
                            <label>Meta Title</label>
                            <textarea type="text" name="meta_title" class="form-control" rows="4"></textarea>
                        </div>

                        <div class="mb-3">
                            <label>Small Description</label>
                            <textarea type="text" name="meta_description" class="form-control" rows="4"></textarea>
                        </div>

                        <div class="mb-3">
                            <label>Small Keyword</label>
                            <textarea type="text" name="meta_keyword" class="form-control" rows="4"></textarea>
                        </div>


                    </div>


                    {{-- Last Tab --}}
                    <div class="tab-pane fade p-3" id="details" role="tabpanel" aria-labelledby="contact-tab">

                    <div class="col-md-4">
                        <div class="mb-3">
                            <label>Original Price</label>
                            <input type="text" name="original_price" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="mb-3">
                            <label>Selling Price</label>
                            <input type="text" name="selling_price" class="form-control"/>
                        </div>
                    </div>


                    <div class="col-md-4">
                        <div class="mb-3">
                            <label>Quantity</label>
                            <input type="number" name="product_quantity" class="form-control"/>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="mb-3">
                            <label>Trending</label>
                            <input type="checkbox" name="trending" class="form-control" style="width: 50px; height: 50px;" />
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="mb-3">
                            <label>Status</label>
                            <input type="checkbox" name="status" class="form-control" style="width: 50px; height: 50px;" />
                        </div>
                    </div>
                    </div>
                    {{-- // --}}
                    <div class="tab-pane fade p-3" id="images" role="tabpanel" aria-labelledby="images-tab">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label>Upload Product Images</label>
                                <input type="file"multiple name="image[]" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade p-3" id="colors" role="tabpanel" aria-labelledby="images-tab">

<div class="mb-3">

    <label>Select Color</label>
    <hr/>
<div class="row">
    @forelse ($colors as $coloritem )

   <div class="col-md-3">
    <div class="p-2 border mb-3">

        <input type="checkbox" name="colors[{{ $coloritem->id }}]" value="{{ $coloritem->id }}" />
        {{ $coloritem->name }}
        <br/>
Quantity: <input type="number" name="quantity[{{ $coloritem->id }}]" style="width:70px; border:1px solid">

    </div>
    </div>

    @empty
<h1>No Colors Availble</h1>
    @endforelse

</div>
</div>

                    </div>




                    <div class="mb-3">
                    <button class="btn-dark btn-sm float-end m-3" type="submit">Submit</button>
                    </div>
                    </form>


                </div>


            </div>
        </div>
    </div>
</div>

@endsection
