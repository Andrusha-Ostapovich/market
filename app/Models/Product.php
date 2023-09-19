<?php

namespace App\Models;

use Fomvasss\MediaLibraryExtension\HasMedia\HasMedia;
use Fomvasss\MediaLibraryExtension\HasMedia\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\SlugTrait;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class Product extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, SlugTrait;
    protected $mediaMultipleCollections = ['product_photo'];
    protected $guarded = ['id'];

    // protected static function boot()
    // {
    // //     parent::boot();
    // //     static::saving(function ($product) {
    // //         $product->properties()->detach();
    // //     });
    //     static::deleting(function ($product) {
    //         // Видалення зв'язків атрибуту з категоріями
    //         $product->properties()->detach();
    //     });
    // }
    public static function boot()
    {
        parent::boot();
        static::deleted(function ($user) {
            Cache::forget('product_count');
        });
        static::saved(function ($user) {
            Cache::forget('product_count');
        });
    }
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
