<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\SlugTrait;
use App\Models\Traits\SeoUpdateOrCreate;
use Kalnoy\Nestedset\NodeTrait as NestedsetNodeTrait;

class Category extends Model
{
    use HasFactory, SlugTrait, NestedsetNodeTrait, SeoUpdateOrCreate;
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
        return $this->belongsToMany(Attribute::class);
    }
    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
