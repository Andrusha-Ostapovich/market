<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\SlugTrait;
use Illuminate\Support\Str;
use Kalnoy\Nestedset\NodeTrait as NestedsetNodeTrait;

class Category extends Model
{
    use HasFactory, SlugTrait, NestedsetNodeTrait;

    protected $guarded = ['id'];

    public function attributes()
    {
        return $this->hasMany(Attribute::class);
    }
    public function product()
    {
       return $this->hasMany(Product::class);
    }

}
