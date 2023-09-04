<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsRequest;
use App\Models\News;

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
        $news = News::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'publication_date'=>now(),
        ]);
    
        $news->mediaManage($request); 
 
     
        return redirect()->route('news.index');
    }

    public function show($id)
    {
        $news = News::findOrFail($id);
        return view('admin.news.edit', compact('news'));
    }

    public function edit($id)
    {
        $news = News::findOrFail($id);
        return view('admin.news.edit', compact('news'));
    }
    public function update(NewsRequest $request, $id)
    {
        $news = News::findOrFail($id);
        $news->update([
            'title' => $request->input('title'),
            'content' => $request->input('content'),

            // Додайте інші поля, які ви хочете оновити
            
        ]);       
        $news->mediaManage($request); 
    
        return redirect()->route('news.index');
    // Перенаправте користувача на список користувачів
    }

    public function destroy($id)
    {
        $news = News::findOrFail($id);
        $news->delete();
        return redirect()->route('news.index');
    }
}
