<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{

    public function index()
    {

        $reviews = Review::paginate(20);

        return view('admin.review.index', ['reviews' => $reviews]);
    }

    public function create()
    {

        $products = Product::pluck('name', 'id')->toArray();
        return view('admin.review.create', compact('products'));
    }

    public function store(Request $request)
    {
        $user = auth()->user(); // Отримати автентифікованого користувача

        $review = Review::create([
            'user_id' => $user->id, // Встановити ID користувача
            'product_id' => $request->input('product_id'), // Отримати ID продукту з запиту
            'content' => $request->input('content'),
            'rating'=>$request->input('rating'),
        ]);

        return redirect()->route('admin.review.index');
    }


    public function show()
    {
    }

    public function edit($id)
    {
        $reviews = Review::findOrFail($id);
        $products = Product::pluck('name', 'id')->toArray();
        return view('admin.review.edit', compact('reviews', 'products'));
    }
    public function update(Request $request, $id)
    {

        $reviews = Review::findOrFail($id);
        $reviews->update(
            $request->only(
                'product_id',
                'content',
                'rating'
            )
        );

        // Зберігаємо зміни в базі даних
        $reviews->save();

        return redirect()->route('admin.review.index');
    }

    public function destroy($id)
    {
        $reviews = Review::findOrFail($id);
        $reviews->delete();
        return redirect()->route('admin.review.index');
    }
}
