<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Attribute;
use App\Models\Category;

class AttributsController extends Controller
{
    public function index()
    {
        $attribut = Category::all();
        $attribut = Attribute::all();
        return view('admin.attribut.index', ['attribut' => $attribut]);
    }

    public function create()
    {
        return view('admin.attribut.create');
    }

    public function store(Request $request)
    {
        $attribute = Attribute::create([
            'name' => $request->input('name'),
        ]);
    }
    public function show($id)
    {
        $attribute = Attribute::findOrFail($id);
        return view('admin.attribut.edit', compact('attribute'));
    }

    public function edit()
    {
// 
    }
    public function update(Request $request, $id)
    {
        $attribute = Attribute::findOrFail($id);
        $attribute->update([
            'title' => $request->input('title'),
            'content' => $request->input('content'),

            
        ]);       

    
        return redirect()->route('attribut.index');

    }

    public function destroy($id)
    {
        $attribute = Attribute::findOrFail($id);
        $attribute->delete();
        return redirect()->route('attribut.index');
    }
}

