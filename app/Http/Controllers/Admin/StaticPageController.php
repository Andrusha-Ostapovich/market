<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StaticPageRequest;
use App\Models\StaticPage;
use Illuminate\Http\Request;

class StaticPageController extends Controller
{
    public function index()
    {
        $staticPages = StaticPage::all();
        return view('admin.static-pages.index', ['staticPages' => $staticPages]);
    }

    public function create()
    {
        return view('admin.static-pages.create');
    }

    public function store(Request $request)
    {
        $staticPages = StaticPage::create(
            $request->only(
                'name',
                'slug',
                'content',
                'template',
            )
        );
        return redirect()->route('static-pages.index');
    }

    public function show()
    {
    }

    public function edit($id)
    {
        $staticPages = StaticPage::findOrFail($id);

        return view('admin.static-pages.edit', compact('staticPages'));
    }
    public function update(Request $request, $id)
    {

        $staticPages = StaticPage::findOrFail($id);
        $staticPages->update(
            $request->only(
                'name',
                'content',
                'slug',
                'template',
                // Додайте інші поля для оновлення
            )
        );

        // Зберігаємо зміни в базі даних
        $staticPages->save();

        return redirect()->route('static-pages.index');
    }

    public function destroy($id)
    {
        $staticPages = StaticPage::findOrFail($id);
        $staticPages->delete();
        return redirect()->route('static-pages.index');
    }
}
