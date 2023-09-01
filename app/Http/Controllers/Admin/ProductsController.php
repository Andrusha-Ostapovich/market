<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', ['products' => $products]);
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        $products = Product::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'publication_date' => now(),
        ]);

        $products->mediaManage($request);


        return redirect()->route('products.index');
    }

    public function show($id)
    {
        $products = Product::findOrFail($id);
        return view('admin.products.edit', compact('products'));
    }

    public function edit($id)
    {
        $products = product::findOrFail($id);
        return view('admin.products.edit', compact('products'));
    }
    public function update(Request $request, $id)
    {
        $products = product::findOrFail($id);
        $products->update([
            'title' => $request->input('title'),
            'content' => $request->input('content'),

            // Додайте інші поля, які ви хочете оновити

        ]);
        $products->mediaManage($request);

        return redirect()->route('products.index');
        // Перенаправте користувача на список користувачів
    }

    public function destroy($id)
    {
        $products = product::findOrFail($id);
        $products->delete();
        return redirect()->route('products.index');
    }
}
