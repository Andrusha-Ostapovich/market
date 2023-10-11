<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ReviewResource;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function show($slug)
    {

        $product = Product::where('slug', $slug)->first();

        $reviews = Review::where('product_id', $product->id)->with('user')->get();

        return ReviewResource::collection($reviews);
    }
}
