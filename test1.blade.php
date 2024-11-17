<section class="h-100">
    <div class="container h-100 py-5">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-10">
           {{-- Success Message --}}
           @if(session()->has('message'))
           <div class="alert alert-success alert-dismissible fade show" role="alert">
               {{ session('message') }}
               <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
           </div>
       @endif

          <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-normal mb-0">Wishlist</h3>
            <div>
              <p class="mb-0"><span class="text-muted">Sort by:</span> <a href="#!" class="text-body">price <i
                    class="fas fa-angle-down mt-1"></i></a></p>
            </div>
          </div>


          @forelse ($wishlist as $wishlistItem)
          <div class="card rounded-3 mb-4">
            <div class="card-body p-4">
              <div class="row d-flex justify-content-between align-items-center">
                <div class="col-md-2 col-lg-2 col-xl-2">
                  <img
                    src="{{ $wishlistItem->product->productImages[0]->image }}"
                    alt="{{ $wishlistItem->product->name }}">
                </div>
                <div class="col-md-3 col-lg-3 col-xl-3">
                  <a href="{{ url('collections/'.$wishlistItem->product->category->slug.'/'.$wishlistItem->product->slug) }}"
                    class="lead fw-normal mb-2">{{ $wishlistItem->product->name }}</a>
                  <p><span class="text-muted">Category: </span> {{ $wishlistItem->product->category->name }}</p>
                  <p><span class="text-muted">Size: </span>M <span class="text-muted">Color: </span>Grey</p>
                </div>
                <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                  <button data-mdb-button-init data-mdb-ripple-init class="btn btn-link px-2"
                    onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                    <i class="fas fa-minus"></i>
                  </button>

                  <input id="form1" min="0" name="quantity" value="2" type="number"
                    class="form-control form-control-sm" />

                  <button data-mdb-button-init data-mdb-ripple-init class="btn btn-link px-2"
                    onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                    <i class="fas fa-plus"></i>
                  </button>
                </div>
                <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                  <h5 class="mb-0">₱{{ number_format($wishlistItem->product->selling_price, 2) }}</h5>
                </div>
                <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                  <a wire:click="removeWishListItem({{ $wishlistItem->id }})" href="#!" class="text-danger"><i class="fa fa-trash"></i> Remove</a>
                </div>
              </div>
            </div>
          </div>
          @empty

          <div class="text-center p-5">
            <h4 class="text-muted">You don't have any items in your wishlist.</h4>
            <a href="{{ url('/collections') }}" class="btn btn-primary btn-lg mt-4">Start Shopping</a>
        </div>
    @endforelse





          <div class="card mb-4">
            <div class="card-body p-4 d-flex flex-row">
              <div data-mdb-input-init class="form-outline flex-fill">
                <input type="text" id="form1" class="form-control form-control-lg" />
                <label class="form-label" for="form1">Discound code</label>
              </div>
              <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-warning btn-lg ms-3">Apply</button>
            </div>
          </div>

          <div class="card">
            <div class="card-body">
              <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-warning btn-block btn-lg">Proceed to Pay</button>
            </div>
          </div>

        </div>
      </div>
    </div>
  </section>
