<?php

namespace App\Models;

use App\Models\ProductColor;
use App\Models\ProductImage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'brand',
        'description',
        'original_price',
        'selling_price',
        'product_quantity',
        'trending',
        'status',
        'meta_title',
        'meta_keywords',
        'meta_description',
    ];

    //the caategory belongs to the product table
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function productImages()
    {
        return $this->hasMany(ProductImage::class, 'product_id', 'id');
    }

    public function productColors()
    {
        return $this->hasMany(ProductColor::class, 'product_id', 'id');
    }

    // public function brand()
    // {
    //     return $this->hasMany(Brand::class, 'product_id', 'id');
    // }


}
