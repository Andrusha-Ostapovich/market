<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Order extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'id', 'product_id');
    }
    public static function boot()
    {
        parent::boot();
        static::deleted(function ($user) {
            Cache::forget('order_count');
        });
        static::saved(function ($user) {
            Cache::forget('order_count');
        });
    }
}
