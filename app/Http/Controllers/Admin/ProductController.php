<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Models\Color;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\ProductFormRequest;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        $colors = Color::where('status', '0')->get();
        return view('admin.products.create', compact('categories', 'brands', 'colors'));
    }


    //product creation
    public function store(ProductFormRequest $request)
    {
        $validatedData = $request->validated();
        //this is where it will find and create the category id(primary key) to use as a foreign key
        //once it found the id, you will going go create the product

        $category = Category::findOrFail($validatedData['category_id']);
        //the products are the products table
        $product = $category->products()->create([
            'category_id' => $validatedData['category_id'],
            'name' => $validatedData['name'],
            'slug' => Str::slug($validatedData['slug']),
            'brand' => $validatedData['brand'],
            'small_description' => $validatedData['small_description'],
            'description' => $validatedData['description'],

            'original_price' => $validatedData['original_price'],
            'selling_price' => $validatedData['selling_price'],
            'product_quantity' => $validatedData['product_quantity'],

            'trending' => $request->trending === true ? '1' : '0',
            'status' => $request->trending === true ? '1' : '0',

            'meta_title' => $validatedData['meta_title'],
            'meta_keyword' => $validatedData['meta_keyword'],
            'meta_description' => $validatedData['meta_description'],
        ]);

        if ($request->hasFile('image')) {
            $uploadPath = 'uploads/products/';

            $i = 1;
            foreach ($request->file('image') as $imageFile) {
                $extention = $imageFile->getClientOriginalExtension();
                $filename = time() . $i++ . '.' . $extention;
                $imageFile->move($uploadPath, $filename);
                $finalImagePathName = $uploadPath . $filename;

                $product->productImages()->create([
                    'product_id' => $product->id,
                    'image' => $finalImagePathName,
                ]);
            }
            //for colors in another table
            if ($request->colors) {
                foreach ($request->colors as $key => $color) {
                    $product->productColors()->create([
                        'product_id' => $product->id,
                        'color_id' => $color,
                        'quantity' => $request->colorquantity[$key] ?? 0
                    ]);
                }
            }

            return redirect('admin/products');


        }
    }
    public function edit(int $product_id)
    {
        $categories = Category::all();
        $brands = Brand::all();
        $product = Product::findOrFail($product_id);

        $product_color = $product->productColors->pluck('color_id')->toArray();
        $colors = Color::whereNotIn('id', $product_color)->get();


        return view('admin.products.edit', compact('product', 'categories', 'brands', 'colors'));
    }
    //update the data

    public function update(ProductFormRequest $request, int $product_id)
    {
        $validatedData = $request->validated();
        //the first(): only return one record
        //Once it's find the id
        $product = Category::findOrFail($validatedData['category_id'])
            ->products()->where('id', $product_id)->first();
        if ($product) {
            $product->update([
                'category_id' => $validatedData['category_id'],
                'name' => $validatedData['name'],
                'slug' => Str::slug($validatedData['slug']),
                'brand' => $validatedData['brand'],
                'small_description' => $validatedData['small_description'],
                'description' => $validatedData['description'],

                'original_price' => $validatedData['original_price'],
                'selling_price' => $validatedData['selling_price'],
                'product_quantity' => $validatedData['product_quantity'],

                'trending' => $request->trending === true ? '1' : '0',
                'status' => $request->trending === true ? '1' : '0',

                'meta_title' => $validatedData['meta_title'],
                'meta_keyword' => $validatedData['meta_keyword'],
                'meta_description' => $validatedData['meta_description'],
            ]);


            if ($request->hasFile('image')) {
                $uploadPath = 'uploads/products/';

                $i = 1;
                foreach ($request->file('image') as $imageFile) {
                    $extention = $imageFile->getClientOriginalExtension();
                    $filename = time() . $i++ . '.' . $extention;
                    $imageFile->move($uploadPath, $filename);
                    $finalImagePathName = $uploadPath . $filename;

                    $product->productImages()->create([
                        'product_id' => $product->id,
                        'image' => $finalImagePathName,
                    ]);
                }
            }
            return redirect('admin/products')->with('message', 'Updated Successfully');
        } else {

            return redirect('admin/products')->with('message', 'No Such ID exists');
        }
    }

    public function destroyImage(int $product_image_id)
    {
        $productImage = ProductImage::findOrFail($product_image_id);

        if (File::exists($productImage->image)) {
            File::delete($productImage->image);
        }
        $productImage->delete();
        return redirect()->back()->with('message', 'Product deleted successfully');
    }


    public function updateProdColorQty(Request $request, $prod_color_id)
    {
        $productColorData = Product::findorFail($request->product_id)
            ->productColors()->where('id', $prod_color_id)->first();

        $productColorData->update([
            'quantity' => $request->qty
        ]);
        return response()->json(['message' => 'Product Color Qty Updated']);
    }
}
