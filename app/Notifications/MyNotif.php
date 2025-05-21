<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class MyNotif extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
  protected $message;

public function __construct($message)
{
    $this->message = $message;
}

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
{
    return ['database'];
}



public function toDatabase($notifiable)
{
    return [
        'message' => $this->message,
        'url' => url('/products')
    ];
}





    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
