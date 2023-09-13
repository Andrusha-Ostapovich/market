<?php

namespace App\Listeners;

use App\Mail\OrderConfirmationMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\ConfirmOrder;
use Illuminate\Support\Facades\Mail;


class ConfirmOrderSeller implements ShouldQueue
{
    use InteractsWithQueue;

    public function handle(ConfirmOrder $event)
    {
        $order = $event->order;

        // Отримайте товари, які були оформлені в замовленні
        $products = $order->products;

        // Отримайте продавців цих товарів
        $sellers = $products->pluck('seller')->unique();

        // Відправте email кожному продавцю
        foreach ($sellers as $seller) {
            Mail::to($seller->email)->send(new OrderConfirmationMail($order));
        }
    }
}
