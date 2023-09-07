<?php

namespace App\Models;

use Fomvasss\MediaLibraryExtension\HasMedia\HasMedia;
use Fomvasss\MediaLibraryExtension\HasMedia\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\SlugTrait;
use Illuminate\Support\Str;

class Product extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, SlugTrait;
    protected $mediaMultipleCollections = ['product_photo'];
    protected $fillable = [
        'name',
        'description',
        'price',
        'old_price',
        'article',
        'brand',
        'main_category_id',
        'seller_id',
        'slug'
    ];
  
    public function mainCategory()
    {
        return $this->belongsTo(Category::class, 'main_category_id', 'id', 'name');
    }

    public function additionalCategories()
    {
        return $this->belongsToMany(Category::class, 'product_categories', 'product_id', 'category_id');
    }
    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }


    public function orders()
    {
        return $this->hasMany(Order::class, 'product_id', 'id');
    }
}
