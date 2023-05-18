<?php

namespace App\Models;

use App\Models\Brand;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
//model for the category, this is where you edit the table category table
//the categories are the table name you've created
    protected $table = 'categories';

    protected $fillable = [
       'name',
       'slug',
       'description',
       'image',
       'meta_title',
       'meta_keyword',
       'meta_description',
       'status',
    ];

    //one category have many product which is the category table
    /* A method that is used to define a one-to-many relationship. */
    //the id is the category PRIMARY KEY
    //hasMany = OnetoMany
    public function products(){
    return $this->hasMany(Product::class, 'category_id', 'id');
    }

    public function brands(){
    return $this->hasMany(Brand::class, 'category_id', 'id');
    }
}
