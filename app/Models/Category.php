<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\SlugTrait;
use Illuminate\Support\Str;
class Category extends Model
{
    use HasFactory,SlugTrait;

    protected $fillable = ['name','slug'];

    public function attribute()
    {
        return $this->hasMany(Attribute::class);
    }
    protected static function booted(): void
    {
        parent::boot();
        static::saving(function (Category $item) {
            $slug = Str::slug($item->name, '-');
            $item->slug = $slug;
    
        });
    }
}
