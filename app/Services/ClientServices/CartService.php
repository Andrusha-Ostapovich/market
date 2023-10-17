<?php

namespace App\Services\ClientServices;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;


class CartService
{
    public function mergeGuestCart($cartId)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $userCart = Cart::firstOrCreate(['user_id' => $user->id]);
            $guestCart = Cart::find($cartId);

            if ($guestCart) {
                $guestCartItems = $guestCart->cartItems;

                foreach ($guestCartItems as $guestCartItem) {
                    $existingCartItem = $userCart->cartItems->where('product_id', $guestCartItem->product_id)->first();

                    if ($existingCartItem) {
                        $guestCartItem->delete();
                        $existingCartItem->update([
                            'quantity' => $existingCartItem->quantity + $guestCartItem->quantity,
                        ]);
                    } else {
                        $guestCartItem->update(['cart_id' => $userCart->id]);
                    }
                }

                $guestCart->delete();
            }

            return $userCart->cartItems;
        } else {
            return  CartItem::where('cart_id', $cartId)->get();
        }
    }
    private $cartItemService;

    public function __construct(CartItemService $cartItemService)
    {
        $this->cartItemService = $cartItemService;
    }

    public function addToCart($productSlug)
    {
        $product = Product::where('slug', $productSlug)->firstOrFail();
        $cartId = request()->cookie('cart_id');

        if (Auth::check()) {
            $user = Auth::user();
            $cart = Cart::firstOrCreate(['user_id' => $user->id]);
        } else {
            $cart = Cart::firstOrCreate(['id' => $cartId]);
            cookie()->queue('cart_id', $cart->id, 60 * 24 * 30);
        }

        $this->cartItemService->addToCart($cart, $product);

        return redirect()->back();
    }
}
