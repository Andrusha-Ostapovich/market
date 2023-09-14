<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AttributRequest;
use App\Models\Attribute;

use App\Models\Category;

class AttributesController extends Controller
{
    public function index()
    {

        $attribute = Attribute::all();
        return view('admin.attribut.index', compact('attribute'));
    }

    public function create()
    {
        $categories = Category::with('categories')->pluck('name', 'id')->toArray();
        // dd($categories);
        return view('admin.attribut.create', compact('categories'));
    }

    public function store(AttributRequest $request)
    {
        $attribute = Attribute::create([
            'name' => $request->input('name'),
        ]);

        $categories = $request->input('categories');

        $attribute->categories()->attach($categories);

        return redirect()->route('attribut.index');
    }
    public function show($id)
    {
        $attribute = Attribute::findOrFail($id);
        $categories = Category::with('categories')->pluck('name', 'id')->toArray();

        return view('admin.attribut.edit', compact('attribute','categories'));
    }

    public function edit()
    {
        //
    }
    public function update(AttributRequest $request, $id)
    {
        $attribute = Attribute::findOrFail($id);
        $attribute->update([
            'name' => $request->input('name'),

        ]);
        $categories = $request->input('categories');

        $attribute->categories()->attach($categories);


        return redirect()->route('attribut.index');
    }

    public function destroy($id)
    {
        $attribute = Attribute::findOrFail($id);
        $attribute->delete();
        return redirect()->route('attribut.index');
    }
}
