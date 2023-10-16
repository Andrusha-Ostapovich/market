<?php

namespace App\Http\Client\Web\Controllers;

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
        // Отримуємо ідентифікатор гостьової корзини з куків
        $cartId = request()->cookie('cart_id');

        // Перевіряємо, чи користувач автентифікований
        if (auth()->check()) {
            // Отримуємо ідентифікатор користувача
            $userId = auth()->user()->id;

            // Знаходимо або створюємо корзину користувача
            $userCart = Cart::firstOrCreate([
                'user_id' => $userId,
            ]);

            // Знаходимо гостьову корзину
            $guestCart = Cart::find($cartId);

            if ($guestCart) {
                // Отримуємо товари з гостьової корзини
                $guestCartItems = $guestCart->cartItems;

                // Перебираємо товари з гостьової корзини
                foreach ($guestCartItems as $guestCartItem) {
                    // Шукаємо товар з таким самим ідентифікатором в корзині користувача
                    $existingCartItem = $userCart->cartItems->where('product_id', $guestCartItem->product_id)->first();

                    if ($existingCartItem) {
                        // Якщо товар вже є в корзині користувача, видаляємо гостьовий запис і додаємо кількість до існуючого запису
                        $guestCartItem->delete();
                        $existingCartItem->update([
                            'quantity' => $existingCartItem->quantity + $guestCartItem->quantity,
                        ]);
                    } else {
                        // Якщо товару немає в корзині користувача, просто додаємо гостьовий запис
                        $guestCartItem->update(['cart_id' => $userCart->id]);
                    }
                }
            }
            // Отримуємо всі товари у корзині користувача (включаючи об'єднані з гостьовою корзиною)
            $cartItems = $userCart->cartItems;
            if ($guestCart) {
                $guestCart->delete();
            }
        } else {
            // Якщо користувач не автентифікований, то користуємося гостьовою корзиною без змін
            $cartItems = CartItem::where('cart_id', $cartId)->get();
        }

        return view('client.cart.index', compact('cartItems'));
    }


    public function addToCart($slug)
    {
        // Отримуємо продукт за допомогою слагу (вам може знадобитися налаштувати, яким чином ви будете отримувати продукт)
        $product = Product::where('slug', $slug)->firstOrFail();

        // Отримуємо корзину для поточного користувача (автентифікованого або гостя)
        if (auth()->check()) {
            $userId = auth()->user()->id;
            $cart = Cart::firstOrCreate([
                'user_id' => $userId,
            ]);
        } else {
            $cartId = request()->cookie('cart_id');
            $cart = Cart::firstOrCreate([
                'id' => $cartId,
            ]);
        }

        // Перевіряємо, чи товар вже є в корзині
        $existingCartItem = $cart->cartItems()->where('product_id', $product->id)->first();

        if ($existingCartItem) {
            // Якщо товар вже є в корзині, збільшуємо кількість на 1
            $existingCartItem->update([
                'quantity' => $existingCartItem->quantity + 1,
            ]);
        } else {
            // Якщо товару немає в корзині, створюємо новий запис
            $cartItem = CartItem::create([
                'cart_id' => $cart->id,
                'product_id' => $product->id,
                'quantity' => 1,
            ]);
        }

        // Якщо користувач не був автентифікованим, встановлюємо куку з ідентифікатором корзини
        if (!auth()->check()) {
            cookie()->queue('cart_id', $cart->id, 60 * 24 * 30);
        }

        // Повертаємо користувача назад на попередню сторінку (або куди вам потрібно)
        return redirect()->back();
    }

    public function remove($itemId)
    {
        // Знаходимо товар корзини за його ID
        $cartItem = CartItem::find($itemId);

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

        return redirect()->back();
    }
}
