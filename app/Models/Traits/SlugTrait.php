<?php

namespace App\Models\Traits;

use Illuminate\Support\Str;

trait SlugTrait
{
    public static function bootSlugTrait()
    {
        static::saving(function ($item) {
            // Отримуємо базовий slug з назви, відфільтрованої від можливих службових символів
            $baseSlug = Str::slug($item->name, '-');

            // Якщо slug вже заданий і не порожній
            if (!empty($item->slug)) {
                $slug = $item->slug;
            } else {
                $slug = $baseSlug;
            }

            $counter = 1;

            // Генеруємо унікальний slug, додавши лічильник, якщо потрібно
            while (static::where('slug', $slug)->where('id', '!=', $item->id)->exists()) {
                $slug = $baseSlug . '-' . $counter;
                $counter++;
            }

            $item->slug = $slug;
        });
    }
}
