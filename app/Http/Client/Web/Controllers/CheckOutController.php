<?php

namespace App\Http\Client\Web\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class CheckOutController extends Controller
{
    public function checkOut()
    {
        if (auth()->check()) {
            $cart = Cart::where('user_id', auth()->user()->id)->first();
            $cartItems = CartItem::where('cart_id', $cart->id)->get();
        } else {
            $cartItems = CartItem::where('cart_id', request()->cookie('cart_id'))->get();
        }
        return view('client.checkout.checkout', compact('cartItems'));
    }
    public function place(Request $request)
    {
        if (auth()->check()) {
            $cart = Cart::where('user_id', auth()->user()->id)->first();
            $cartId = $cart->id;
            $cartItems = CartItem::where('cart_id',  $cartId)->get();
        } else {
            $cartId = request()->cookie('cart_id');
            $cartItems = CartItem::where('cart_id', $cartId)->get();
        }
        $total = \Cart::total($cartItems);

        $order = Order::firstOrCreate([
            'cart_id' => $cartId,
            'status' => 'pending',
            'total_amount' => $total,
            'name' => $request->name,
            'surname' => $request->surname,
            'settlement' => $request->settlement,

        ]);
        // Отримати поточний масив значень куки 'order_id', або ініціювати новий масив, якщо куки ще не існує
        // Отримуємо рядок з куків та розбираємо його в масив
        $orderIds = json_decode(request()->cookie('order_id', '[]'), true);

        // Конвертуємо $order->id у рядок
        $string = strval($order->id);

        // Додаємо рядок до масиву
        $orderIds[] = $string;

        // Перетворюємо масив назад у рядок і зберігаємо у куках
        cookie()->queue('order_id', json_encode($orderIds), 60 * 24 * 30);


        if (auth()->check()) {
            $cart = Cart::where('user_id', auth()->user()->id)->first();
            $cartItems = CartItem::where('cart_id', $cart->id)->delete();
        } else {
            Cookie::queue(Cookie::forget('cart_id'));
        }
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
        return view('client.cart.thanks');
    }
}
