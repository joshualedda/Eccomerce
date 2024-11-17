<div class="py-3 py-md-5 bg-light">
    <div class="container">
        {{-- Alert for messages --}}
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        <div class="row">
            {{-- Product Image --}}
            <div class="col-md-5 mt-3">
                <div class="bg-white border rounded p-3">
                    @if ($product->productImages)
                        <img src="{{ asset($product->productImages[0]->image) }}" class="w-100 rounded"
                            alt="Product Image">
                    @else
                        <p class="text-center text-muted">No photo found</p>
                    @endif
                </div>
            </div>

            {{-- Product Details --}}
            <div class="col-md-7 mt-3">
                <div class="product-view bg-white border rounded p-3">
                    <h4 class="product-name fw-bold">{{ $product->name }}</h4>
                    <p class="text-muted mb-1">
                        Home / {{ $product->category->name }} / {{ $product->name }}
                    </p>
                    <hr>

                    {{-- Prices --}}
                    <div>
                        <span class="selling-price text-success h5 me-3 fs-6">{{ $product->selling_price }}</span>
                        <span
                            class="original-price text-muted text-decoration-line-through ">{{ $product->original_price }}</span>
                    </div>

                    {{-- Color Options --}}
                    <div class="mt-3">
                        @if ($product->productColors->count() > 0)
                            @foreach ($product->productColors as $colorItem)
                                <label class="colorSelectionLabel rounded-circle d-inline-block border"
                                    style="width: 30px; height: 30px; background-color: {{ $colorItem->color->name }}; cursor: pointer;"
                                    wire:click="colorSelected({{ $colorItem->id }})"
                                    title="{{ $colorItem->color->name }}">
                                </label>
                            @endforeach
                        @endif
                        {{-- Stock Status --}}
                        <div class="mt-2">
                            @if ($this->productColorSelectedQuantity === 'OutOfStock')
                                <span class="badge bg-danger">Out of Stock</span>
                            @elseif($this->productColorSelectedQuantity > 0)
                                <span class="badge bg-success">In Stock</span>
                            @endif
                        </div>
                    </div>

                    {{-- Quantity Selector --}}
                    <div class="mt-3">
                        <div class="input-group" style="max-width: 150px;">
                            <button class="btn btn-outline-secondary" wire:click="decrementQuantity"
                                {{ $quantityCount <= 1 ? 'disabled' : '' }}>
                                -
                            </button>
                            <input type="text" class="form-control text-center" wire:model="quantityCount" readonly>
                            <button class="btn btn-outline-secondary" wire:click="incrementQuantity">
                                +
                            </button>
                        </div>
                    </div>

                    {{-- Wishlist and Cart Buttons --}}
                    <div class="mt-3">
                        <button class="btn btn-outline-danger me-2" wire:click="addToWishList({{ $product->id }})">
                            <span wire:loading.remove wire:target="addToWishList">
                                <i class="fa fa-heart"></i> Add To Wishlist
                            </span>
                            <span wire:loading wire:target="addToWishList">
                                <i class="fa fa-spinner fa-spin"></i> Adding...
                            </span>
                        </button>
                        <button class="btn btn-dark" wire:click="addToCart({{ $product->id }})"
                            {{ $this->productColorSelectedQuantity === null || $this->productColorSelectedQuantity === 'OutOfStock' ? 'disabled' : '' }}>
                            <span wire:loading.remove wire:target="addToCart">
                                <i class="fa fa-shopping-cart"></i> Add to Cart
                            </span>
                            <span wire:loading wire:target="addToCart">
                                <i class="fa fa-spinner fa-spin"></i> Adding...
                            </span>
                        </button>
                    </div>



                    {{-- Small Description --}}
                    <div class="mt-4">
                        <h5>Small Description</h5>
                        <p class="text-muted">{{ $product->small_description }}</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Full Description --}}
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-white">
                        <h4>Description</h4>
                    </div>
                    <div class="card-body">
                        <p>{{ $product->description }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
