<div>


    <div class="py-3 py-md-5 bg-light">
        <div class="container">
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
            <div class="row">
                <div class="col-md-5 mt-3">
                    <div class="bg-white border">
                        {{-- the [0]: the first image that will be captured --}}
                        @if ($product->productImages)
                            <img src="{{ asset($product->productImages[0]->image) }}" class="w-100" alt="Img">
                        @else
                            No photo found
                        @endif
                    </div>
                </div>
                <div class="col-md-7 mt-3">
                    <div class="product-view">
                        <h4 class="product-name">
                            {{ $product->name }}
                            {{-- <label class="label-stock bg-success">
            @if ($product->product_quantity > 0)
            In Stock
            @else
            Out of Stock
            @endif
        </label> --}}
                        </h4>
                        <hr>
                        <p class="product-path">
                            Home / {{ $product->category->name }} /{{ $product->name }}
                        </p>
                        <div>
                            <span class="selling-price">{{ $product->selling_price }}</span>
                            <span class="original-price">{{ $product->original_price }}</span>
                        </div>
                        <div>
                            {{-- Check first if the color from another table is existing or not by using else if  --}}
                            @if ($product->productColors->count() > 0)
                                @if ($product->productColors)
                                    @foreach ($product->productColors as $colorItem)
                                        {{-- <input type="radio" name="colorSelection" value="{{ $colorItem->id }}"/>
               {{ $colorItem->color->name }} --}}
                                        <label class="colorSelectionLabel"
                                            style="background-color: {{ $colorItem->color->name }}"
                                            value="{{ $colorItem->id }}"
                                            wire:click="colorSelected({{ $colorItem->id }})">
                                            {{ $colorItem->color->name }}
                                        </label>
                                    @endforeach
                                @endif

                                @if ($this->productColorSelectedQuantity == 'OutOfStock')
                                    <label class="label-stock btn btn-sm py-1 mt-2 text-white bg-dark">Out of
                                        Stock</label>
                                @elseif($this->productColorSelectedQuantity > 0)
                                    <label class="label-stock btn btn-sm py-1 mt-2 text-white bg-success">In
                                        Stock</label>
                                @endif
                            @else
                                @if ($product->quantity)
                                    <label class="label-stock btn btn-sm py-1 mt-2 text-white bg-success">In
                                        Stock</label>
                                @else
                                    <label class="label-stock btn btn-sm py-1 mt-2 text-white bg-dark">Out of
                                        Stock</label>
                                @endif


                            @endif

                        </div>

                        <div class="mt-2">
                            <div class="input-group">
                                <span class="btn btn1" wire:click="decrementQuantity"><i class="fa fa-minus"></i></span>
                                <input type="text" wire:model="quantityCount" class="input-quantity" readonly
                                    value="{{ $this->quantityCount }}" />
                                <span class="btn btn1" wire:click="incrementQuantity"><i class="fa fa-plus"></i></span>
                            </div>
                        </div>

                        <div class="mt-2">
                            {{-- wire:click="addToWishList({{  }})::after clicking it will go added to wishlist and will added to wishlist table  --}}
                            <button type="button" class="btn btn btn1"
                                wire:click="addToWishList({{ $product->id }})">
                                <span wire:loading.remove wire:target="addToWishList"><i class="fa fa-heart"></i>
                                    Add To Wishlist</span>
                                <span wire:loading wire:target="addToWishList"><i
                                        class="fa fa-heart"></i>Adding...</span>
                            </button>


                            {{-- Cartss --}}
                            <button class="btn btn1">
                                Add to Cart
                            </button>



                        </div>
                        <div class="mt-3">
                            <h5 class="mb-0">Small Description</h5>
                            <p>
                                {{ $product->small_description }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mt-3">
                    <div class="card">
                        <div class="card-header bg-white">
                            <h4>Description</h4>
                        </div>
                        <div class="card-body">
                            <p>
                                {{ $product->description }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
