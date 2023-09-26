<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Termwind\Components\Dd;

class ProductController extends Controller
{
    public function show($categorySlug, $productSlug)
    {
        // Знайдіть категорію за допомогою $categorySlug
        $category = Category::where('slug', $categorySlug)->firstOrFail();
        // Знайдіть поточний товар у цій категорії за допомогою $productSlug
        $currentProduct = Product::where('slug', $productSlug)
            ->where('category_id', $category->id)
            ->firstOrFail();

        return view('user.product.show', compact('category', 'currentProduct'));
    }

}
