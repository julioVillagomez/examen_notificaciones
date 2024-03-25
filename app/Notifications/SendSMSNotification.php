<?php

namespace App\Notifications;

use App\Models\LogNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendSMSNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $category;
    public $message;
    public $type = "SMS";

    /**
     * Create a new notification instance.
     */
    public function __construct(string $category, string $message)
    {
        $this->category = $category;
        $this->message = $message;
    }


    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): string
    {
        return LogChannel::class;
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }


}
