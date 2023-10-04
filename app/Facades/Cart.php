<?php

namespace App\Facades;


use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class Cart
{
    public function total($items)
    {
        // Обчисліть загальну суму на основі цін і кількостей товарів у корзині
        $total = 0;

        foreach ($items as $item) {
            $total += $item->product->price * $item->quantity;
        }

        return $total;
    }
}
