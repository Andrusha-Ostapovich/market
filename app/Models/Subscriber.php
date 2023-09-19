<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Subscriber extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public static function boot()
    {
        parent::boot();
        static::deleted(function ($user) {
            Cache::forget('subscriber_count');
        });
        static::saved(function ($user) {
            Cache::forget('subscriber_count');
        });
    }
}
