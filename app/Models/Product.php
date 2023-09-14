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
    protected $guarded = ['id'];

    public function categories()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id', 'name');
    }

    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }
    public function properties()
    {
        return $this->belongsToMany(Property::class);
    }
    public function orders()
    {
        return $this->hasMany(Order::class, 'product_id', 'id');
    }

}
