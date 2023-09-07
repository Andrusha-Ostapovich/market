<?php

namespace App\Models\Traits;

use Illuminate\Support\Str;

trait SlugTrait
{
    public static function bootSlugTrait()
    {
        static::saving(function ($item) {
            $baseSlug = Str::slug($item->name, '-');
            $slug = $baseSlug;
            $counter = 1;

           
            while (static::where('slug', $slug)->exists()) {
                $slug = $baseSlug . '-' . $counter;
                $counter++;
            }

            $item->slug = $slug;
        });
    }
}
