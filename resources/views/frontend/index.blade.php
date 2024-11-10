@extends('layouts.app')
@section('title', 'Home Page')

@section('content')

<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      @foreach ($sliders as $key => $slider)
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $key }}" class="{{ $key == 0 ? 'active' : '' }}" aria-current="true" aria-label="Slide {{ $key + 1 }}"></button>
      @endforeach
    </div>

    <div class="carousel-inner">
      @foreach ($sliders as $key => $slider)
        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
          @if ($slider->image)
            <img src="{{ asset($slider->image) }}" class="d-block w-100" alt="Slide {{ $key + 1 }}">
          @endif
          <div class="carousel-caption d-none d-md-block">
            <h5>{{ $slider->title }}</h5>
            <p>{{ $slider->description }}</p>
            <a href="{{ $slider->link }}" class="btn btn-light">Get Now</a>
          </div>
        </div>
      @endforeach
    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>



@endsection


<style>
    .carousel-item img {
        width: 100%;
        height: 500px; /* Adjust this height as needed */
        object-fit: cover; /* Ensures images are cropped to fit without stretching */
    }
</style>
