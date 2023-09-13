<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttributeValue extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function attribute()
    {
        return $this->belongsTo(Attribute::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function product()
    {
        return $this->hasMany(Product::class);
    }

}
