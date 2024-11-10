@extends('layouts.app')
@section('title', 'Categories')

@section('content')
    <div class="py-3 py-md-5">
        <div class="container bg-light">
            <div class="row">
                <div class="col-12 mb-4">
                    <h4 class="mb-4">Product Categories</h4>
                </div>

                @forelse ($categories as $category)
                    <div class="col-6 col-md-3 mb-4">
                        <div class="card shadow-sm">
                            <a href="{{ url('/collections/' . $category->slug) }}" class="text-decoration-none">
                                @if (!empty($category->image))
                                    <img src="{{ asset($category->image) }}" class="card-img-top" alt="{{ $category->name }}"
                                        style="height: 200px; object-fit: cover;">
                                @else
                                    <img src="{{ asset('assests/img/default.png') }}" class="card-img-top"
                                        alt="No Image Available" style="height: 200px; object-fit: cover;">
                                @endif


                                <div class="card-body text-center">
                                    <p class="badge rounded-pill bg-success">{{ $category->name }}</p>
                                </div>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <p>Categories are empty</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection
