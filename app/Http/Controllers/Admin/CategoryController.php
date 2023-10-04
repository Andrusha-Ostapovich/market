<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class CategoryController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $category = Category::with('seo')->first();

        $category->seo()->updateOrCreate([], [
            'tags' => [$request->only([
                'title',
                'description',
                'keywords',
            ])]
        ]);
        $categories = Category::paginate(20);
        return view('admin.categories.index', ['categories' => $categories]);
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(CategoryRequest $request)
    {
        $categories = Category::create([
            'name' => $request->input('name'),
            'slug' => $request->input('slug'),
        ]);
        return redirect()->route('admin.categories.index');
    }

    public function show($id)
    {
        $categories = Category::findOrFail($id);
        return view('admin.categories.edit', compact('categories'));
    }

    public function edit()
    {
    }
    public function update(CategoryRequest $request, $id)
    {
        $categories = Category::findOrFail($id);
        $categories->update([
            'name' => $request->input('name'),
            'slug' => $request->input('slug'),

        ]);


        return redirect()->route('admin.categories.index');
        // Перенаправте користувача на список користувачів
    }

    public function destroy($id)
    {
        $categories = Category::findOrFail($id);
        $categories->delete();
        return redirect()->route('admin.categories.index');
    }
    public function order(Request $request)
    {
        $this->validate($request, [
            'data' => 'required|array'
        ]);

        $entities = build_linear_array_sort($request->data);

        foreach ($entities as $item) {
            optional(Category::find($item['id']))->update($item);
        }

        return response()
            ->json(['message' => 'Дані збережено!'], Response::HTTP_ACCEPTED);
    }
}
