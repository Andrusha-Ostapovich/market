<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
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
        $products = Product::create($request->only('name', 'description'));

        // $products = Product::create([
        //     'name' => $request->input('name'),
        //     'description' => $request->input('description'),
        //     'price' => $request->input('price'),
        //     'old_price' => $request->input('old_price'),
        //     'article'=>$request->input('article'),
        //     'main_category_id'=>$request->input('main_category_id'),
        //     'brand'=>$request->input('brand'),
        // ]);

        $products->mediaManage($request);


        return redirect()->route('products.index');
    }

public function show($id)
{
    $product = Product::findOrFail($id);
    $mainCategoryName = $product->mainCategory->name; // Отримуємо ім'я категорії
    return view('admin.products.edit', compact('product', 'mainCategoryName'));
}

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $mainCategoryName = $product->mainCategory->name; // Отримуємо ім'я категорії
        return view('admin.products.edit', compact('product', 'mainCategoryName'));
    }
    public function update(Request $request, $id)
    {
        $products = Product::findOrFail($id);
        $products->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'old_price' => $request->input('old_price'),
            'article'=>$request->input('article'),
            'main_category_id'=>$request->input('main_category_id'),
            'brand'=>$request->input('brand'),

        ]);
        $products->mediaManage($request);

        return redirect()->route('products.index')->compact('products');
        // Перенаправте користувача на список користувачів
    }

    public function destroy($id)
    {
        $products = product::findOrFail($id);
        $products->delete();
        return redirect()->route('products.index');
    }
}
