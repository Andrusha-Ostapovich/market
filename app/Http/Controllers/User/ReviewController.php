<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{

    public function create(Request $request, $productSlug)
    {
        $product = Product::where('slug', $productSlug)->firstOrFail();
        $productId = $product->id;
        $review = Review::create([
            'user_id' => auth()->user()->id,
            'product_id' => $productId,
            'content' => $request->input('content'),
            'rating' => $request->input('rating'),
        ]);
        return redirect()->back();
    }
}
