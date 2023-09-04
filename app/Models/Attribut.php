<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribut extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    ];
    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_attributes', 'attribute_id', 'product_id');
    }

    public function attributes()
    {
        return $this->hasMany(Attribute::class, 'id', 'attribute_id');
    }
}
