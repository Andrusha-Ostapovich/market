<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\CartItem;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class CheckOutController extends Controller
{
    public function checkOut()
    {
        $cartItems = CartItem::where('cart_id', request()->cookie('cart_id'))->get();
        return view('user.cart.checkout', compact('cartItems'));
    }
    public function place()
    {
        $cartId = request()->cookie('cart_id');
        $cartItems = CartItem::where('cart_id', $cartId)->get();
        $total = \Cart::total($cartItems);

        $order = Order::firstOrCreate([
            'cart_id' => $cartId,
            'status'=>'pending',
            'total_amount'=>$total,
        ]);
        cookie()->queue('order_id', $order->id, 60 * 24 * 30);
        Cookie::queue(Cookie::forget('cart_id'));

        $total = (int) ($total * 100);
        \Cloudipsp\Configuration::setMerchantId(1488822);
        \Cloudipsp\Configuration::setSecretKey('q1wDJvHsdOGACRBWD1ZeW4Y1Ov91pGQK');
        $data = [
            'order_desc' => 'tests SDK',
            'currency' => 'UAH',
            'amount' => $total,
            'response_url' => '/thanks',
            'server_callback_url' => 'http://site.com/callbackurl',
            'sender_email' => 'gobsecilich@gmail.com',
            'lang' => 'ua',
            'lifetime' => 36000,
        ];
        $url = \Cloudipsp\Checkout::url($data);
        $data = $url->getData();

        return redirect($data['checkout_url']);
    }
    public function thanks()
    {
        return view('user.cart.thanks');
    }
}
