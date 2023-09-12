<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Events\ConfirmOrder;
use App\Models\Order;

class OrderController extends Controller
{


public function confirmOrder(Order $order)
{
    // Логіка підтвердження замовлення
$order = Order::all();
    // Відправка події ConfirmOrder
    event(new ConfirmOrder($order));

    return redirect()->back()->with('success', 'Замовлення успішно підтверджено.');
}
}
