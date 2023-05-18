<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <div class="row">
        <div class="col-md-3">
<div class="card">
    <div class="card-header">
        <h4 class="">
            Brands
        </h4>
    </div>
    <div class="card-body">
      @forelse ($category->brands as $brandItem )

        <label for="" class="d-block">
            <input type="checkbox" wire:model="brandInputs" value="{{ $brandItem->name }}" /> {{ $brandItem->name }}
        </label>
           @empty
No Data Found
      @endforelse



            <h4 class="mt-5">
               Price
            </h4>
        </div>
        <div class="card-body">

            <label for="" class="d-block">
                <input type="radio" name="priceSort" wire:model="priceInput" value="high-to-low" /> High to Low
            </label>
            <label for="" class="d-block">
                <input type="radio" name="priceSort" wire:model="priceInput" value="low-to-high" /> Low to High
            </label>


        </div>
    </div>
    </div>





        @forelse ($product as $productItem)




        <div class="col-6 col-md-3">
            <div class="category-card shadow-sm">
                {{-- <a href="{{ url('/collections/'. $category->slug) }}"> --}}
                    <div class="category-card-img">

                        {{-- Count here cause if its greater than 0, it will show the image --}}
                        @if($productItem->productImages->count() > 0)
                        <a href="{{ url('collections/'.$productItem->category->slug.'/'.$productItem->slug) }}" class="text-dark float-end">
                             <img src="{{ asset($productItem->productImages[0]->image) }}" alt="" class="w-100" ></a>
                        @else
                        <h5>Something Went Wrong</h5>
                        @endif
                    </div>
                    <div class="category-card-body">
                         <h5 class="card-title mb-1"><a href="{{ url('collections/'.$productItem->category->slug.'/'.$productItem->slug) }}" > {{$productItem->name }}</a></h5>
                         <p class="card-text text-dark">{{ $productItem->selling_price}}</p>
                        <p class="card-text">{{ $productItem->brand}}</p>
                        <p class="card-text mb-2">
                            @if($productItem->product_quantity > 0)
                            <small class="text-success">In Stock</small>
                            @else
                            <small class="text-danger">Out Of Stock</small>
                            @endif

                            <span><a href="{{ url('collections/'.$productItem->category->slug.'/'.$productItem->slug) }}" class="text-dark float-end">View</a></span>
                        </p>
                    </div>
                </a>
            </div>
        </div>

            @empty
No Product Available for {{ $category->name }}
            @endforelse
    </div>
</div>
