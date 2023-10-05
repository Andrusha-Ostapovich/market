<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function orders()
    {
        $orderId = request()->cookie('order_id');

        $orders = Order::findOrFail($orderId)->get();
        return view('user.cart.order-history',compact('orders'));
    }
}
