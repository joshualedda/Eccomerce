<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Models\Cart;
use Livewire\Component;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class View extends Component
{


    public function mount($category, $product)
    {
        $this->category = $category;
        $this->product = $product;
    }

    //after the mount you can now acces the data
    public function render()
    {
        return view('livewire.frontend.product.view', [
            'category' => $this->category,
            'product' => $this->product
        ]);
    }


    //first: you need to check whether the user have login or not by using auth

    public function addToWishList($productId)
    {
        if (Auth::check()) {
            if (Wishlist::where('user_id', auth()->user()->id)->where('product_id', $productId)->exists()) {
                session()->flash('message', 'Product Already Exists');
                return false;
            } else {
                Wishlist::create([
                    'user_id' => auth()->user()->id,
                    'product_id' => $productId
                ]);
                $this->emit('wishlistAddedUpdated');
                session()->flash('message', 'Added Successfully');
            }
        } else {
            session()->flash('message', 'Login To Continue');
            return false;
        }
    }



    public function incrementQuantity()
    {
        if ($this->quantityCount < 10) {
            $this->quantityCount++;
        }
    }

    public function decrementQuantity()
    {
        if ($this->quantityCount > 1)
            $this->quantityCount--;
    }

    // after passing the data from the frontend controller to livewire
    // pass it using the mount() function

    public $category, $product;

    public $productColorSelectedQuantity = null;
    public $quantityCount = 1;
    public $selectedColorId = null; // Track selected color

    public function colorSelected($productColorId)
    {
        $productColor = $this->product->productColors->where('id', $productColorId)->first();

        if ($productColor) {
            $this->selectedColorId = $productColorId;
            $this->productColorSelectedQuantity = $productColor->quantity;

            if ($this->productColorSelectedQuantity == 0) {
                $this->productColorSelectedQuantity = 'OutOfStock';
            }
        } else {
            $this->selectedColorId = null;
            $this->productColorSelectedQuantity = null;
        }
    }

    public function addToCart($productId)
    {
        // Validate color selection
        if ($this->selectedColorId === null) {
            session()->flash('message', 'Please select a color before adding to cart.');
            return false;
        }

        if ($this->productColorSelectedQuantity === 'OutOfStock') {
            session()->flash('message', 'Selected color is out of stock.');
            return false;
        }

        if (Auth::check()) {
            $existingCartItem = Cart::where('user_id', auth()->user()->id)
                ->where('product_id', $productId)
                ->where('color_id', $this->selectedColorId) // Check for the same color
                ->first();

            if ($existingCartItem) {
                $existingCartItem->quantity += $this->quantityCount;
                $existingCartItem->save();
            } else {
                Cart::create([
                    'user_id' => auth()->user()->id,
                    'product_id' => $productId,
                    'color_id' => $this->selectedColorId, // Save selected color
                    'quantity' => $this->quantityCount,
                ]);
            }

            $this->emit('cartUpdated');
            session()->flash('message', 'Product added to cart successfully.');
        } else {
            session()->flash('message', 'Please log in to continue.');
        }
    }
}
