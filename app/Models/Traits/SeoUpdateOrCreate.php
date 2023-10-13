<?php

namespace App\Models\Traits;

use Fomvasss\Seo\Models\HasSeo;

trait SeoUpdateOrCreate
{
    use HasSeo;

    public function seoUpdateOrCreate(array $seoData)
    {
        $this->seo()->updateOrCreate([], [
            'tags' => [
                'title' => $seoData['title'],
                'description' => $seoData['description'],
                'keywords' => $seoData['keywords'],
            ],
        ]);
    }
}
