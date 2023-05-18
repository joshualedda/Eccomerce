<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class WishlistCount extends Component
{
    public $wishlistCount;

    //wishlistAddedUpdated
    protected $listeners = ['wishlistAddedUpdated' => 'checkWishlistCount'];
    public function checkWishlistCount()
    {
        //first you need to check whethere the user have been loggin or not
        //then if login: that will return the total wishlist count of the user from the table using the user id and thhe primary key
        if (Auth::check()) {
            return $this->wishlistCount = Wishlist::where('user_id', auth()->user()->id)->count();
        }
        return $this->wishlistCount = 0;
    }
    public function render()
    {

        //after the checking you ned to store the CheckWishlistcount from the wishlistcount by using:
        //= :means assing not equalllllll and
        $this->wishlistCount = $this->checkWishlistCount();
        return view('livewire.wishlist-count', [
            'wishlistCount' => $this->wishlistCount
        ]);
    }
}
