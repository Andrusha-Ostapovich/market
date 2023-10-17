<?php

namespace App\Services\ClientServices;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Order;
use Illuminate\Support\Facades\Config;


class OrderService
{
    public function createOrder($cartId, $total, $request)
    {
        return Order::firstOrCreate([
            'cart_id' => $cartId,
            'status' => 'pending',
            'total_amount' => $total,
            'phone' => $request->phone,
            'email' => $request->email,
            'name' => $request->name,
            'surname' => $request->surname,
            'settlement' => $request->settlement,
        ]);
    }

    public function updateOrderCookie($order)
    {
        $orderIds = json_decode(request()->cookie('order_id', '[]'), true);
        $string = strval($order->id);
        $orderIds[] = $string;
        cookie()->queue('order_id', json_encode($orderIds), 60 * 24 * 30);
    }

    public function deleteCartItems($cartId)
    {
        CartItem::where('cart_id', $cartId)->delete();
    }
}
