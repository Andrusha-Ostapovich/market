<?php

namespace App\Services\ClientServices;


use App\Models\CartItem;


class CartItemService
{
    public function addToCart($cart, $product)
    {
        $existingCartItem = $cart->cartItems()->where('product_id', $product->id)->first();

        if ($existingCartItem) {
            $existingCartItem->update([
                'quantity' => $existingCartItem->quantity + 1,
            ]);
        } else {
            CartItem::create([
                'cart_id' => $cart->id,
                'product_id' => $product->id,
                'quantity' => 1,
            ]);
        }
    }
    public function removeFromCart($cartItem)
    {
        if ($cartItem) {
            // Перевіряємо, чи кількість товару менше або дорівнює 1
            if ($cartItem->quantity <= 1) {
                $cartItem->delete(); // Видаляємо товар з корзини
            } else {
                $cartItem->update([
                    'quantity' => $cartItem->quantity - 1,
                ]);
            }
        }
    }
}
