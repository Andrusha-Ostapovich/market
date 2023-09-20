<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsRequest;
use App\Models\News;
use App\Actions\NewsCreateAction;
use App\Actions\NewsUpdateAction;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = News::all();
        return view('admin.news.index', ['news' => $news]);
    }

    public function create()
    {
        return view('admin.news.create');
    }

    public function store(NewsRequest $request)
    {
        // $news = News::create([
        //     'name' => $request->input('name'),
        //     'content' => $request->input('content'),
        //     'publication_date'=>now(),
        //     'slug'=> $request->input('slug'),
        // ]);

        $news = NewsCreateAction::run($request->all());
        $news->mediaManage($request);


        return redirect()->route('news.index');
    }

    public function show($id)
    {
        $news = News::findOrFail($id);
        return view('admin.news.edit', compact('news'));
    }

    public function edit()
    {

    }
    public function update(NewsRequest $request, $id)
    {

        $news = News::findOrFail($id);

        // Викликаємо дію NewsUpdateAction і передаємо об'єкт моделі та дані з запиту
        NewsUpdateAction::run($news, $request->all());

        $news->mediaManage($request);

        return redirect()->route('news.index');
    }

    public function destroy($id)
    {
        $news = News::findOrFail($id);
        $news->delete();
        return redirect()->route('news.index');
    }
}
