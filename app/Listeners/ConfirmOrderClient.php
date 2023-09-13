<?php

namespace App\Listeners;

use App\Notifications\ConfirmOrderClientNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\ConfirmOrder;

class ConfirmOrderClient
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ConfirmOrder $event)
    {

        $order = $event->order;
        $user = $order->user;

        $user->notify(new ConfirmOrderClientNotification($order));

    }
}
