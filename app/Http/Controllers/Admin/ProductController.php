<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ProductsExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Imports\ProductsImport;
use App\Models\Attribute;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Product;
use App\Models\Property;
use App\Models\User;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $attributs = Attribute::pluck('name', 'id');

        $products = Product::all();
        return view('admin.product.index', compact('products', 'attributs'));
    }

    public function create()
    {
        $attributs = Attribute::pluck('name', 'id')->toArray();
        $seller = User::where('role', 'seller')->pluck('name', 'id')->toArray();
        $categories = Category::all()->pluck('name', 'id')->toArray();
        return view('admin.product.create', compact('categories', 'seller', 'attributs'));
    }

    public function store(ProductRequest $request)
    {
        $product = Product::create($request->only(
            'name',
            'description',
            'price',
            'old_price',
            'article',
            'category_id',
            'brand',
            'seller_id',
            'slug',

        ));
        $attribut = $request->input('attributs');
        $value = $request->input('value');

        // За допомогою зв'язку "properties" створюємо новий запис у таблиці "properties"
        $property = $product->properties()->create([
            'attribute_id' => $attribut,
            'value' => $value, // Використовуємо значення для атрибуту
        ]);

        return redirect()->route('product.index');
    }

    public function show($id)
    {
        $attributs = Attribute::pluck('name', 'id')->toArray();
        $seller = User::where('role', 'seller')->pluck('name', 'id')->toArray();
        $categories = Category::all()->pluck('name', 'id')->toArray();
        $product = Product::findOrFail($id);
        return view('admin.product.edit', compact('product', 'categories', 'seller', 'attributs'));
    }

    public function edit()
    {
        //
    }
    public function update(ProductRequest $request, $id)
    {

        $product = Product::findOrFail($id);
        $product->update($request->only(
            'name',
            'description',
            'price',
            'old_price',
            'article',
            'category_id',
            'brand',
            'slug',

        ));
        $attribut = $request->input('attributs');
        $value = $request->input('value');

        // За допомогою зв'язку "properties" створюємо новий запис у таблиці "properties"
        $property = $product->properties()->create([
            'attribute_id' => $attribut,
            'values' => $value, // Використовуємо значення для атрибуту
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
    public function export()
    {
        return Excel::download(new ProductsExport, 'products.xlsx');
    }
    public function import()
    {
        Excel::import(new ProductsImport, 'export-market.xlsx');

        return redirect()->back()->with('success', 'All good!');
    }
}
