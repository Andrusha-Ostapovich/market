<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;


class CartController extends Controller
{
    public function index()
    {

        // Отримуємо ідентифікатор корзини з кук
        $cartId = request()->cookie('cart_id');

        // Шукаємо корзину за ідентифікатором
        $cartItems = CartItem::where('cart_id', $cartId)->get();

        // Перевіряємо, чи є користувач авторизованим
        if (auth()->check()) {
            // Отримуємо ідентифікатор користувача
            $userId = auth()->user()->id;

            // Знаходимо корзину користувача (якщо вона існує)
            $userCart = Cart::firstOrCreate([
                'user_id' => $userId,
            ]);

            $updateCart = CartItem::where('cart_id', $cartId)->update(['cart_id' => $userCart->id]);

            // Отримуємо товари корзини користувача (якщо вони є)
            // $userCartItems = $userCart ? $userCart->cartItems : [];
            $cartItems = CartItem::where('cart_id', $userCart->id)->get();
            // // Об'єднуємо товари з гостьової та користувальницької корзини
            // $cartItems = $cartItems->concat($userCartItems);
        } else {
            $cartItems = CartItem::where('cart_id', $cartId)->get();
        }



        return view('user.cart.index', compact('cartItems'));
    }

    public function addToCart($slug)
    {
        // Отримуємо продукт за допомогою слагу (вам може знадобитися налаштувати, яким чином ви будете отримувати продукт)
        $product = Product::where('slug', $slug)->firstOrFail();



        // Отримуємо або створюємо корзину для поточного користувача
        if (auth()->check()) {
            $cart = Cart::firstOrCreate([
                'user_id' => Auth::id(),
                'id' => request()->cookie('cart_id'),
            ]);
        } else {
            $cart = Cart::firstOrCreate([
                'id' => request()->cookie('cart_id'),
            ]);
        }
        // dd($cart);

        // Перевіряємо, чи товар вже є в корзині
        $existingCartItem = $cart->cartItems()->where('product_id', $product->id)->first();

        if ($existingCartItem) {
            // Якщо товар вже є в корзині, збільшуємо кількість на 1
            $existingCartItem->update([
                'quantity' => $existingCartItem->quantity + 1,
            ]);
        } else {
            // Якщо товару немає в корзині, створюємо новий запис
            $cart = CartItem::firstOrCreate([
                'cart_id' => $cart->id,
                'product_id' => $product->id,
                'quantity' => 1,
            ]);
        }

        cookie()->queue('cart_id', $cart->cart_id, 60 * 24 * 30);

        // Повертаємо користувача назад на попередню сторінку (або куди вам потрібно)
        return redirect()->back();
    }
    public function remove($itemId)
    {

        // Знаходимо товар корзини за його ID
        $cartItem = CartItem::find($itemId);

        $cartItem->delete();

        return redirect()->back();
    }
}
