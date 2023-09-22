<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StaticPageRequest;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $pages = Page::all();
        return view('admin.page.index', ['pages' => $pages]);
    }

    public function create()
    {
        return view('admin.page.create');
    }

    public function store(Request $request)
    {

        $pages = Page::create(
            $request->only(
                'name',
                'slug',
                'content',
                'template',
            )
        );

        return redirect()->route('page.index');
    }

    public function show()
    {
    }

    public function edit($id)
    {
        $pages = Page::findOrFail($id);

        return view('admin.page.edit', compact('pages'));
    }
    public function update(Request $request, $id)
    {

        $pages = Page::findOrFail($id);
        $pages->update(
            $request->only(
                'name',
                'content',
                'slug',
                'template',

            )
        );

        // Зберігаємо зміни в базі даних
        $pages->save();

        return redirect()->route('page.index');
    }

    public function destroy($id)
    {
        $pages = Page::findOrFail($id);
        $pages->delete();
        return redirect()->route('page.index');
    }
}
