<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::whereNull('parent_id')->get();
        return view('user.catalog.index', ['categories' => $categories]);
    }

    public function show($slug)
    {
        // Знайдемо категорію за допомогою поля 'slug'
        $category = Category::where('slug', $slug)->firstOrFail();

        // Отримаємо всі категорії (включаючи підкатегорії) для обраної категорії
        $categories = Category::whereDescendantOrSelf($category)->pluck('id');

        // Отримаємо всі продукти, які належать до цих категорій
        $products = Product::whereIn('category_id', $categories)->get();

        // Отримаємо всі підкатегорії (дітей) обраної категорії
        $subcategories = $category->children;

        return view('user.product.index', compact('products', 'category', 'subcategories'));
    }
    public function search(Request $request)
    {
        $query = $request->input('query');

        $products = Product::search($query)->get();

        return view('user.search.index', compact('products','query'));
    }
}
