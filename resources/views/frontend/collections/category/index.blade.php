@extends('layouts.app')
@section('title', 'Categories')

@section('content')
<div class="py-3 py-md-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-m-12">
            <h4 class="mb-4">Our Categories</h4>
            </div>
            @forelse ($categories as $category)


            <div class="col-6 col-md-3">
                <div class="category-card shadow-sm">
                    <a href="{{ url('/collections/'. $category->slug) }}">
                        <div class="category-card-img">
                            <img src="{{ asset($category->image) }}" alt="" class="w-100" >
                        </div>
                        <div class="category-card-body">
                            <h5>{{ $category->name }}</h5>
                        </div>
                    </a>
                </div>
            </div>

                @empty
Categories Is Empty
                @endforelse
            </div>

        </div>
    </div>
</div>

@endsection

