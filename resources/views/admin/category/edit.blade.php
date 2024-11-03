@extends('layouts.admin')
@section('content')
    <section>
        <div class="card">
            <div class="card-header">
                <h3>Edit Category
                    <a href="{{ url('admin/category') }}" class="btn btn-sm btn-dark float-end">Back</a>
                </h3>
            </div>

            <div class="card-body">
                <form action="{{ url('admin/category/'.$category->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="name">Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $category->name }}" />
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="slug">Slug</label>
                            <input type="text" name="slug" class="form-control" value="{{ $category->slug }}" />
                        </div>

                        <div class="col-md-12 mb-3">
                            <label class="form-label" for="description">Description</label>
                            <textarea name="description" class="form-control" rows="3">{{ $category->description }}</textarea>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="image">Image</label>
                            <input type="file" name="image" class="form-control" />
                            @if($category->image)
                                <img src="{{ asset('/uploads/category/'.$category->image) }}" width="60px" height="60px" class="mt-2" />
                            @endif
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="status">Status</label>
                            <select class="form-select" id="status" name="status">
                                <option value="0" {{ $category->status == 0 ? 'selected' : '' }}>Visible</option>
                                <option value="1" {{ $category->status == 1 ? 'selected' : '' }}>Hidden</option>
                            </select>
                        </div>

                        <div class="col-md-12">
                            <h4>SEO Tags</h4>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label class="form-label" for="meta_title">Meta Title</label>
                            <input type="text" name="meta_title" class="form-control" value="{{ $category->meta_title }}" />
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="meta_keyword">Meta Keyword</label>
                            <textarea name="meta_keyword" class="form-control" rows="3">{{ $category->meta_keyword }}</textarea>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="meta_description">Meta Description</label>
                            <textarea name="meta_description" class="form-control" rows="3">{{ $category->meta_description }}</textarea>
                        </div>

                        <div class="col-md-12 mb-3">
                            <button type="submit" class="btn btn-sm btn-dark float-end">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
