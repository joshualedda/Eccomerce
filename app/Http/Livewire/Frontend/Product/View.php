<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Models\Wishlist;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class View extends Component
{

    // after passing the data from the frontend controller to livewire
    // pass it using the mount() function

    public $category, $product, $productColorSelectedQuantity, $quantityCount = 1;

    //and now assign the category varible from the public category to function mount
    public function colorSelected($productColorId){
        //nakuha na mismo dto ung PRIMARY ID NG produc color id which is may access na sya
        //and ginamit nya ung product color para i assign or STORE nya lahat ng functionality don
       $productColor = $this->product->productColors->where('id', $productColorId)->first();
       //and here ginamiot na nya producColor and inacess nya quantiy ng productcolor
     $this->productColorSelectedQuantity = $productColor->quantity;

        if ($this->productColorSelectedQuantity == 0) {
            $this->productColorSelectedQuantity = 'OutOfStock';
    }
    }
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
        if($this->quantityCount > 1)
        $this->quantityCount--;
    }

}


