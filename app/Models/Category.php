<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\SlugTrait;
use Illuminate\Support\Str;
use Kalnoy\Nestedset\NodeTrait as NestedsetNodeTrait;

class Category extends Model
{
    use HasFactory, SlugTrait, NestedsetNodeTrait, SlugTrait;

    protected $guarded = ['id'];

    public function attribute()
    {
        return $this->hasMany(Attribute::class);
    }
}
