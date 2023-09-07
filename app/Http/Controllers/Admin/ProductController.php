<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;

use App\Models\Product;

use App\Models\User;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::with('seller.user')->get();
        return view('admin.product.index', compact('product'));
    }

    public function create()
    {
        $seller = User::where('role', 'seller')->pluck('name', 'id')->toArray();
        $categories = Category::all()->pluck('name', 'id')->toArray();
        return view('admin.product.create', compact('categories', 'seller'));
    }

    public function store(ProductRequest $request)
    {
        $product = Product::create($request->only(
            'name',
            'description',
            'price',
            'old_price',
            'article',
            'main_category_id',
            'brand',
            'seller_id',
            'slug'
        ));



        $product->mediaManage($request);


        return redirect()->route('product.index');
    }

    public function show($id)
    {
        $seller = User::where('role', 'seller')->pluck('name', 'id')->toArray();
        $categories = Category::all()->pluck('name', 'id')->toArray();
        $product = Product::findOrFail($id);
        return view('admin.product.edit', compact('categories', 'product', 'seller'));
    }

    public function edit()
    {
        //
    }
    public function update(ProductRequest $request, $id)
    {

        $product = Product::findOrFail($id);
        $product->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'old_price' => $request->input('old_price'),
            'article' => $request->input('article'),
            'main_category_id' => $request->input('main_category_id'),
            'brand' => $request->input('brand'),
            'slug'=> $request->input('slug'),

        ]);
        $product->mediaManage($request);

        return redirect()->route('product.index');
    }

    public function destroy($id)
    {
        $product = product::findOrFail($id);
        $product->delete();
        return redirect()->route('product.index');
    }
}
