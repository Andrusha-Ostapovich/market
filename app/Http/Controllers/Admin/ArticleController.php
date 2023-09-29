<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Actions\ArticleCreateAction;
use App\Actions\ArticleUpdateAction;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::paginate(10);
        return view('admin.article.index', ['articles' => $articles]);
    }

    public function create()
    {
        return view('admin.article.create');
    }

    public function store(ArticleRequest $request)
    {
        // $article = Article::create([
        //     'name' => $request->input('name'),
        //     'content' => $request->input('content'),
        //     'publication_date'=>now(),
        //     'slug'=> $request->input('slug'),
        // ]);

        $article = ArticleCreateAction::run($request->all());
        $article->mediaManage($request);


        return redirect()->route('admin.article.index');
    }

    public function show($id)
    {
        $articles = Article::findOrFail($id);
        return view('admin.article.edit', compact('articles'));
    }

    public function edit()
    {

    }
    public function update(ArticleRequest $request, $id)
    {

        $article = Article::findOrFail($id);

        // Викликаємо дію ArticleUpdateAction і передаємо об'єкт моделі та дані з запиту
        ArticleUpdateAction::run($article, $request->all());

        $article->mediaManage($request);

        return redirect()->route('admin.article.index');
    }

    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $article->delete();
        return redirect()->route('admin.article.index');
    }
}
