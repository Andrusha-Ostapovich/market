<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OrderClientNotification extends Notification
{
    protected $order;

    public function __construct($order)
    {
        $this->order = $order;
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Підтвердження замовлення')
            ->line('Ваше замовлення було успішно підтверджено.')
            ->line('Номер замовлення: ' . $this->order->id)
            ->line('Дякуємо за використання наших послуг!');
    }
}
