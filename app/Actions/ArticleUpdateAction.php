<?php

namespace App\Actions;

use Lorisleiva\Actions\Concerns\AsAction;
use App\Models\Article;
use Illuminate\Support\Arr;

class ArticleUpdateAction
{
    use AsAction;

    public function handle(Article $articles, $data)
    {
        // Оновлюємо дані моделі Article з вхідними даними з $data
        $articles->update(
            Arr::only($data, [
                'name',
                'content',
                'slug',
                'publication_date',
                // Додайте інші поля для оновлення
            ])
        );

        // Повертаємо об'єкт моделі Article, який був оновлений
        return $articles;
    }
}
