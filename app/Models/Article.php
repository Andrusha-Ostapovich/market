<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Fomvasss\MediaLibraryExtension\HasMedia\HasMedia;
use Fomvasss\MediaLibraryExtension\HasMedia\InteractsWithMedia;
use App\Models\Traits\SlugTrait;
use Fomvasss\Seo\Models\HasSeo;
use Illuminate\Support\Str;

class Article extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, SlugTrait, HasSeo;
    protected $mediaSingleCollections = ['photo'];
    protected $guarded = ['id'];

    public function registerSeoDefaultTags(): array
    {
        return [
            'title' => $this->name,
            'description' => $this->description,
        ];
    }
}
