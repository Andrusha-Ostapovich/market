<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Fomvasss\MediaLibraryExtension\HasMedia\HasMedia;
use Fomvasss\MediaLibraryExtension\HasMedia\InteractsWithMedia;
class News extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;
    protected $mediaSingleCollections = ['photo']; 
    protected $fillable = [
        'title',
        'content',
        'publication_date',       
    ];

}
