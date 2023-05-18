@extends('layouts.app')


@section('title')
{{$product->meta_title }}
@endsection

@section('meta_keyword')
{{$product->meta_keyword }}
@endsection

@section('meta_description')
{{$product->meta_description }}
@endsection

@section('content')
<div>
{{-- The category here: you are passing the category here from the FRONTEND controller (laravel) to pass it from the livewire controller --}}
<livewire:frontend.product.view :category="$category" :product="$product"/>
</div>

@endsection
