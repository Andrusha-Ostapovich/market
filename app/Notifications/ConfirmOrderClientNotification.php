<?php

namespace App\Notifications;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

use NotificationChannels\TurboSms\TurboSmsChannel;

use NotificationChannels\TurboSms\TurboSmsMessage;

class ConfirmOrderClientNotification extends Notification
{
    use Queueable;

    protected $order;

    public function via(object $notifiable): array
    {
        // dd('email');
        // return [TurboSmsChannel::class];
        return ['mail'];
    }
    public function __construct(Order $order)
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
    // public function toTurboSms($notifiable)
    // {


    //     // Перевірте, чи у користувача в профілі є номер телефону.
    //     if ($notifiable->phone) {

    //         // Відправте SMS, якщо номер телефону вказаний.
    //         return (new TurboSmsMessage())
    //             ->content("Ваше замовлення підтверджено. Номер замовлення: {$this->order->id}");
    //     }

    //     return null;
    // }
}
