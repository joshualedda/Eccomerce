@extends('layouts.admin')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3><i class="fas fa-edit"></i> Product
                    <a href="{{ url('admin/product') }}" class="btn btn-sm btn-dark float-end">Back</a>
                </h3>
            </div>
            <div class="card-body">
                @if ($errors->any())
                <div class="alert alert-warning">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
                @endif

                <form action="{{ url('admin/product/' . $product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    {{-- Tabs Navigation --}}
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                                type="button" role="tab">Home</button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" id="seo-tab" data-bs-toggle="tab" data-bs-target="#seo"
                                type="button" role="tab">SEO Tags</button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" id="details-tab" data-bs-toggle="tab" data-bs-target="#details"
                                type="button" role="tab">Details</button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" id="images-tab" data-bs-toggle="tab" data-bs-target="#images"
                                type="button" role="tab">Images</button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" id="colors-tab" data-bs-toggle="tab" data-bs-target="#colors"
                                type="button" role="tab">Colors</button>
                        </li>
                    </ul>

                    {{-- Tabs Content --}}
                    <div class="tab-content" id="myTabContent">
                        {{-- Home Tab --}}
                        <div class="tab-pane fade show active p-3" id="home" role="tabpanel">
                            <div class="form-group mb-3">
                                <label for="category">Category</label>
                                <select name="category_id" class="form-select text-dark">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label class="form-label">Product Name</label>
                                <input type="text" name="name" class="form-control" value="{{ $product->name }}">
                            </div>

                            <div class="form-group mb-3">
                                <label class="form-label">Product Slug</label>
                                <input type="text" name="slug" class="form-control" value="{{ $product->slug }}">
                            </div>

                            <div class="form-group mb-3">
                                <label class="form-label">Select Brand</label>
                                <select name="brand" class="form-select text-dark">
                                    @foreach ($brands as $brand)
                                        <option value="{{ $brand->name }}" {{ $brand->name == $product->brand ? 'selected' : '' }}>
                                            {{ $brand->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label class="form-label">Small Description</label>
                                <input type="text" name="small_description" class="form-control" value="{{ $product->small_description }}">


                            </div>

                            <div class="form-group mb-3">
                                <label class="form-label">Description</label>
                                <textarea name="description" class="form-control" rows="2">{{ $product->description }}</textarea>
                            </div>
                        </div>

                        {{-- SEO Tags Tab --}}
                        <div class="tab-pane fade p-3" id="seo" role="tabpanel">
                            <div class="form-group mb-3">
                                <label class="form-label">Meta Title</label>
                                <textarea name="meta_title" class="form-control" rows="2">{{ $product->meta_title }}</textarea>
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">META Description</label>
                                <textarea name="meta_description" class="form-control" rows="2">{{ $product->meta_description }}</textarea>
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">META Keyword</label>
                                <textarea name="meta_keyword" class="form-control" rows="2">{{ $product->meta_keyword }}</textarea>
                            </div>
                        </div>

                        {{-- Details Tab --}}
                        <div class="tab-pane fade p-3" id="details" role="tabpanel">
                            <div class="form-group mb-3">
                                <label class="form-label">Original Price</label>
                                <input type="text" name="original_price" class="form-control" value="{{ $product->original_price }}">
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">Selling Price</label>
                                <input type="text" name="selling_price" class="form-control" value="{{ $product->selling_price }}">
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">Quantity</label>
                                <input type="number" name="product_quantity" class="form-control" value="{{ $product->quantity }}">
                            </div>

                            <div class="form-check form-check-inline mb-3 d-flex align-items-center">
                                <input class="form-check-input me-1" type="checkbox" name="trending" {{ $product->trending ? 'checked' : '' }}>
                                <label class="form-check-label">Trending</label>
                            </div>

                            <div class="form-check form-check-inline mb-3 d-flex align-items-center">
                                <input class="form-check-input me-1" type="checkbox" name="status" {{ $product->status ? 'checked' : '' }}>
                                <label class="form-check-label">Status</label>
                            </div>

                        </div>

                        {{-- Images Tab --}}
                        <div class="tab-pane fade p-3" id="images" role="tabpanel">
                            <div class="form-group mb-3">
                                <label class="form-label">Upload Product Images</label>
                                <input type="file" name="image[]" multiple class="form-control">
                            </div>
                            <div class="row">
                                @if ($product->productImages)
                                    @foreach ($product->productImages as $image)
                                        <div class="col-md-2">
                                            <img src="{{ asset($image->image) }}" class="img-thumbnail mb-2" />
                                            <a href="{{ url('admin/product-image/' . $image->id . '/delete') }}" class="btn btn-danger btn-sm">Remove</a>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        {{-- Colors Tab --}}
                        <div class="tab-pane fade p-3" id="colors" role="tabpanel">
                            <div class="form-group mb-3">
                                <label class="form-label">Select Color</label>
                                <div class="row">
                                    @forelse ($colors as $coloritem)
                                        <div class="col-md-3">
                                            <div class="p-2 border mb-3">
                                                <input type="checkbox" name="colors[{{ $coloritem->id }}]" value="{{ $coloritem->id }}">
                                                {{ $coloritem->name }}
                                                <br />
                                                Quantity: <input type="number" name="quantity[{{ $coloritem->id }}]" style="width:70px; border:1px solid">
                                            </div>
                                        </div>
                                    @empty
                                        <p>No Colors Available</p>
                                    @endforelse
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-sm table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Color Name</th>
                                            <th>Quantity</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($product->productColors as $prodColor)
                                            <tr class="prod-color-tr">
                                                <td>{{ $prodColor->color ? $prodColor->color->name : 'No Color Available' }}</td>
                                                <td>
                                                    <div class="input-group mb-3" style="width: 150px">
                                                        <input type="number" value="{{ $prodColor->quantity }}" class="productColorQuantity form-control">
                                                        <button type="button" class="updateProductColorBtn btn btn-success btn-sm" value="{{ $prodColor->id }}">Update</button>
                                                    </div>
                                                </td>
                                                <td>
                                                    <button class="deleteProductColorBtn btn btn-danger btn-sm" type="button" value="{{ $prodColor->id }}">Delete</button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <button class="btn btn-dark btn-sm float-end" type="submit">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
