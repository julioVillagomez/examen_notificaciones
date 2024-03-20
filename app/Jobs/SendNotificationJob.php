<?php

namespace App\Jobs;

use App\Models\Category;
use App\Models\User;
use App\Notifications\SendMailNotification;
use App\Notifications\SendPushNotification;
use App\Notifications\SendSMSNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendNotificationJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $message , $category;
    /**
     * Create a new job instance.
     */
    public function __construct(Category $category, string $message)
    {
        $this->category = $category;
        $this->message = $message;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $message = $this->message;
        $categoryName = $this->category->name;
        User::filterCategory($this->category)->with('channels')->get()->map(function($user) use($message,$categoryName){
            $user->channels->map(function($channel) use ($message,$user,$categoryName){
                match ($channel->id) {
                     1 =>  $user->notify(new SendSMSNotification($categoryName,$message)),
                     2 =>  $user->notify(new SendMailNotification($categoryName,$message)),
                     3 =>  $user->notify(new SendPushNotification($categoryName,$message)),
                };
                
            });
        });
    }
}
