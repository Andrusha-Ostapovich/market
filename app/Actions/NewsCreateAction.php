<?php

namespace App\Actions;

use Lorisleiva\Actions\Concerns\AsAction;
use App\Models\News;
use Illuminate\Support\Arr;

class NewsCreateAction
{
    use AsAction;


    public function handle(array $data): News
    {
        // Ваша логіка для створення або оновлення новини

        $news = News::create(
            Arr::only($data, [
                'name',
                'content',
                'slug',
                'publication_date',
            ]),
        );
        $news['publication_date'] = now();

        return $news;
    }
}
