<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CatalogResource;
use App\Http\Resources\ProductResource;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return CatalogResource::collection($categories);
    }
    public function showProducts($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();

        $categories = Category::whereDescendantOrSelf($category)->pluck('id');

        $products = Product::whereIn('category_id', $categories)->get();

        return ProductResource::collection($products);
    }

}
