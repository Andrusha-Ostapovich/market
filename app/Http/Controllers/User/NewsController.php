<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::orderBy('created_at', 'desc')->paginate(6);

        return view('user.news.index', ['news' => $news]);
    }

    public function show($slug)
    {
        // Здійснюємо пошук новини за slug у базі даних
        $news = News::where('slug', $slug)->first();

        // Перевіряємо, чи була знайдена новина
        if (!$news) {
            // Обробка випадку, коли новину не знайдено
            abort(404);
        }
        return view('user.news.show', ['news' => $news]);
    }
    public function previous($slug)
    {
        $news = News::where('slug', '<', $slug)->orderBy('slug', 'desc')->first();

        if (!$news) {
            abort(404);
        }

        return view('user.news.show', ['news' => $news]);
    }

    public function next($slug)
    {
        $news = News::where('slug', '>', $slug)->orderBy('slug')->first();

        if (!$news) {
            abort(404);
        }

        return view('user.news.show', ['news' => $news]);
    }
}
