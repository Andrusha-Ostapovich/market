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
use App\Models\User;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $product = Product::with('seo')->first();

        $product->seo()->updateOrCreate([], [
            'tags' => [$request->only([
                'title',
                'description',
                'keywords',
            ])]
        ]);

        $nameFilter = $request->input('name');
        $minPriceFilter = $request->input('min_price');
        $maxPriceFilter = $request->input('max_price');
        $categoryFilter = $request->input('categories');
        $withPhotoFilter = $request->input('with_photo');
        $sortField = $request->input('sort_field', 'name'); // За замовчуванням сортувати за назвою
        $sortDirection = $request->input('sort_direction', 'asc'); // За замовчуванням сортувати за зростанням

        $products = Product::query();

        if ($nameFilter) {
            $products->where('name', 'like', '%' . $nameFilter . '%');
        }

        if ($minPriceFilter && $maxPriceFilter) {
            $products->whereBetween('price', [$minPriceFilter, $maxPriceFilter]);
        }

        if ($categoryFilter) {
            $products->whereHas('categories', function ($query) use ($categoryFilter) {
                $query->whereIn('id', $categoryFilter);
            });
        }


        if ($withPhotoFilter) {
            $products->whereHas('media', function ($query) {
                $query->where('collection_name', 'product_photo');
            });
        }


        // Додати сортування
        $products->orderBy($sortField, $sortDirection);
        if ($request->has('reset_sort')) {
            // Якщо присутній параметр reset_sort, скиньте сортування
            $products = $products->latest()->paginate(10);
        } else {
            // В іншому випадку продовжуйте з поточним сортуванням
            $products = $products->paginate(10);
        }

        $attributs = Attribute::pluck('name', 'id');
        $categories = Category::all()->pluck('name', 'id')->toArray();
        return view('admin.product.index', compact('products', 'attributs', 'categories', 'categoryFilter', 'sortField', 'sortDirection'));
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

        return redirect()->route('admin.product.index');
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

        return redirect()->route('admin.product.index');
    }

    public function destroy($id)
    {
        $product = product::findOrFail($id);
        $product->delete();
        return redirect()->route('admin.product.index');
    }
    public function export()
    {
        return Excel::download(new ProductsExport, 'products.xlsx');
    }
    public function import(Request $request)
    {

        // Перевіряємо, чи був відправлений файл
        if ($request->hasFile('import_file')) {
            $file = $request->file('import_file');

            // Перевіряємо, чи файл є файлом Excel (наприклад, формат xlsx)
            if ($file->getClientOriginalExtension() === 'xlsx') {
                // Завантажуємо файл і викликаємо імпорт
                Excel::import(new ProductsImport, $file);

                return redirect()->back()->with('success', 'Все добре!');
            }
        }

        // Якщо файл не було завантажено або формат невірний, повертаємо назад з повідомленням про помилку
        return redirect()->back()->with('error', 'Файл не завантажено');
    }
}
