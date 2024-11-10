<div class="container py-3">
    <div class="row">
        <!-- Sidebar for Brands and Price Filters -->
        <div class="col-md-2">
            <div class="card mb-4">
                <div class="card-header">
                    <h5>Brands</h5>
                </div>
                <div class="card-body">
                    @forelse ($category->brands as $brandItem)
                        <label class="form-check-label d-block">
                            <input type="checkbox" wire:model="brandInputs" value="{{ $brandItem->name }}"
                                class="form-check-input me-2" />
                            {{ $brandItem->name }}
                        </label>
                    @empty
                        <p>No Data Found</p>
                    @endforelse
                </div>
                <div class="card-header">
                    <h5>Price</h5>
                </div>
                <div class="card-body">
                    <label class="form-check-label d-block">
                        <input type="radio" name="priceSort" wire:model="priceInput" value="high-to-low"
                            class="form-check-input me-2" />
                        High to Low
                    </label>
                    <label class="form-check-label d-block">
                        <input type="radio" name="priceSort" wire:model="priceInput" value="low-to-high"
                            class="form-check-input me-2" />
                        Low to High
                    </label>
                </div>
            </div>
        </div>

        <!-- Product Cards -->
        <div class="col-md-10">
            <div class="row">
                @forelse ($product as $productItem)
                    <div class="col-md-4 mb-4">
                        <div class="card  shadow-sm">


                            @if ($productItem->productImages->count() > 0)
                                <a
                                    href="{{ url('collections/' . $productItem->category->slug . '/' . $productItem->slug) }}">
                                    <img src="{{ asset($productItem->productImages[0]->image) }}" class="card-img-top"
                                        alt="{{ $productItem->name }}" style="height: 200px; object-fit: cover;">
                                </a>
                            @else
                                <img src="{{ asset('assests/img/default.png') }}" class="card-img-top" alt="No Image Available"
                                    style="height: 200px; object-fit: cover;">
                            @endif

                            <div class="card-body">
                                <h5 class="card-title">
                                    <a href="{{ url('collections/' . $productItem->category->slug . '/' . $productItem->slug) }}"
                                        class="text-dark text-decoration-none">
                                        {{ $productItem->name }}
                                    </a>
                                </h5>
                                <p class="card-text text-dark">Price: ${{ $productItem->selling_price }}</p>
                                <p class="card-text text-muted">Brand: {{ $productItem->brand }}</p>
                                <p class="card-text mb-2">

                                    <small
                                        class="{{ $productItem->product_quantity > 0 ? 'badge rounded-pill bg-success' : 'badge rounded-pill bg-danger' }}">
                                        {{ $productItem->product_quantity > 0 ? 'In Stock' : 'Out of Stock' }}
                                    </small>
                                </p>
                            </div>

                        </div>
                    </div>
                @empty
                    <p class="text-center">No Products Available for {{ $category->name }}</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
