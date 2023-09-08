<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Fomvasss\MediaLibraryExtension\HasMedia\HasMedia;
use Fomvasss\MediaLibraryExtension\HasMedia\InteractsWithMedia;
use App\Models\Traits\SlugTrait;
use Illuminate\Support\Str;

class News extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia,SlugTrait;
    protected $mediaSingleCollections = ['photo'];
    protected $fillable = [
        'name',
        'content',
        'created_at',
        'slug',
    ];

}
