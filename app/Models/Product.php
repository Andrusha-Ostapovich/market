<?php

namespace App\Models;

use Fomvasss\MediaLibraryExtension\HasMedia\HasMedia;
use Fomvasss\MediaLibraryExtension\HasMedia\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;
    protected $mediaMultipleCollections = ['product_photo'];
    protected $fillable = [
        'name',
        'description',
        'price',
        'old_price',
        'article',
        'brand',
        'main_category_id',
        'seller_id'
    ];
    public function mainCategory()
    {
        return $this->belongsTo(Category::class, 'main_category_id', 'id','name');
    }

    public function additionalCategories()
    {
        return $this->belongsToMany(Category::class, 'product_categories', 'product_id', 'category_id');
    }
    public function sellers()
    {
        return $this->belongsToMany(Seller::class, 'name', 'seller_id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'product_id', 'id');
    }
}
