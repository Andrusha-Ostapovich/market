<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\CartItem;
use App\Models\Location;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function orders()
    {
        $orderId = request()->cookie('order_id');
        // dd($orderId);
        $orderIds = json_decode($orderId);

        // Зараз $orderIds - це масив ID, і ви можете використовувати його для запиту до бази даних
        $orders = Order::whereIn('id', $orderIds)->get();
        // $orders = Order::where('id', $orderId[])->get();
        return view('user.cart.order-history', compact('orders'));
    }
    public function cityName(Request $request)
    {
        $query = $request->input('q');
        // Виконайте запит до бази даних, щоб отримати населені пункти, які відповідають запиту
        $settlements = Location::where('city_name', 'LIKE', '%' . $query . '%')
            ->get()
            ->map(function ($a) {
                return [
                    'id' => $a->id,
                    'text' => implode(' , ', array_filter([$a->city_name, $a->region_name,  $a->street_name])),
                ];
            })
            ->toArray();
        return response()->json(['results' => $settlements]);
    }
}
