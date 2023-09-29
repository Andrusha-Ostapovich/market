<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::orderBy('created_at', 'desc')->paginate(6);

        return view('user.article.index', ['articles' => $articles]);
    }

    public function show($slug)
    {
        // Здійснюємо пошук новини за slug у базі даних
        $articles = Article::where('slug', $slug)->first();

        // Перевіряємо, чи була знайдена новина
        if (!$articles) {
            // Обробка випадку, коли новину не знайдено
            abort(404);
        }
        return view('user.article.show', ['articles' => $articles]);
    }
    public function previous($slug)
    {
        $articles = Article::where('slug', '<', $slug)->orderBy('slug', 'desc')->first();

        if (!$articles) {
            abort(404);
        }

        return view('user.article.show', ['articles' => $articles]);
    }

    public function next($slug)
    {
        $articles = Article::where('slug', '>', $slug)->orderBy('slug')->first();

        if (!$articles) {
            abort(404);
        }

        return view('user.article.show', ['articles' => $articles]);
    }
}
