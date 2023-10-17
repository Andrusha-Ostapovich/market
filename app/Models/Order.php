<?php

namespace App\Models;

use App\Events\ConfirmOrder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Order extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    public function product()
    {
        return $this->hasMany(Product::class, 'id', 'product_id');
    }
    public static function boot()
    {
        parent::boot();

        static::created(function ($order) {
            event(new ConfirmOrder($order));
        });
    }
    // public static function boot()
    // {
    //     parent::boot();
    //     static::deleted(function ($user) {
    //         Cache::forget('order_count');
    //     });
    //     static::saved(function ($user) {
    //         Cache::forget('order_count');
    //     });
    // }
}
