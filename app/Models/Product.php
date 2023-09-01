<?php

namespace App\Models;
use Fomvasss\MediaLibraryExtension\HasMedia\HasMedia;
use Fomvasss\MediaLibraryExtension\HasMedia\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model implements HasMedia
{
    use HasFactory,InteractsWithMedia;
    protected $mediaSingleCollections = ['product_photo']; 

}
