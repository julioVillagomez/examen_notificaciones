<?php

namespace App\Notifications;

use App\Models\LogNotification;
use App\Repositories\LogNotificationRepository;
use Illuminate\Notifications\Notification;
 
class LogChannel
{
    /**
     * Send the given notification.
     */
    public function send(object $notifiable, Notification $notification): void
    {
        $service = new LogNotificationRepository();
        $service->create([
            'category' => $notification->category,
            'message' => $notification->message,
            'type' => $notification->type,
            'user_id' =>  $notifiable->id
        ]);
    }

   
}