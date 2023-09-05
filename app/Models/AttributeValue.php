<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttributeValue extends Model
{
    use HasFactory;

    protected $fillable = ['value', 'attribute_id','category_id'];

    public function attribute()
    {
        return $this->belongsTo(Attribute::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
