<?php

namespace App\Actions;

use Lorisleiva\Actions\Concerns\AsAction;
use App\Models\News;
use Illuminate\Support\Arr;

class NewsUpdateAction
{
    use AsAction;

    public function handle(News $news, $data)
    {
        // Оновлюємо дані моделі News з вхідними даними з $data
        $news->update(
            Arr::only($data, [
                'name',
                'content',
                'slug',
                'publication_date',
                // Додайте інші поля для оновлення
            ])
        );

        // Повертаємо об'єкт моделі News, який був оновлений
        return $news;
    }
}
