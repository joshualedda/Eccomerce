<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ProductImage;
use App\Models\Slider;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::where('status', '0')->get();
        return view('frontend.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //string here: becase it will return a string representation//Also there aro no integer from the routes and we are not getting the ID
    public function productView(string $category_slug, string $product_slug)
    {
        $category = Category::where('slug', $category_slug)->first();
        //product is equal to category and product HasManyj function
        //exists: we need to check if the product is existing or not
        $product = $category->products()->where('slug', $product_slug)->where('status', '0')->first();
        //if merong ung product or nag eexist, mapupunta sya miso sa view page, then page wala am rereturn back

        if ($product) {
            return view('frontend.collections.products.view', compact('product', 'category'));
        } else {
            return redirect()->back();
        }
    }


    public function categories()
    {
        $categories = Category::all();
        return view('frontend.collections.category.index', compact('categories'));
    }


    // After clicking the product
    public function products($category_slug)
    {

        $category = Category::where('slug', $category_slug)->first();
        if ($category) {
            return view('frontend.collections.products.index', compact('category',));
        } else {
            return redirect()->back();
        }
    }
}
