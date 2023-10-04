<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\SlugTrait;
use Fomvasss\Seo\Models\HasSeo;
use Illuminate\Support\Str;
use Kalnoy\Nestedset\NodeTrait as NestedsetNodeTrait;

class Category extends Model
{
    use HasFactory, SlugTrait, NestedsetNodeTrait, HasSeo;
    public function registerSeoDefaultTags(): array
    {
        return [
            'title' => $this->name,
            'description' => $this->description,
        ];
    }

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
