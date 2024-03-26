<?php

namespace App\Jobs;

use App\Enums\ChannelTypeEnum;
use App\Models\Category;
use App\Models\User;
use App\Notifications\SendMailNotification;
use App\Notifications\SendPushNotification;
use App\Notifications\SendSMSNotification;
use App\Repositories\UserRepository;
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
        $user = new UserRepository();
        $user->filterCategory($this->category)->map(function($user) use($message,$categoryName){
            $user->channels->map(function($channel) use ($message,$user,$categoryName){

                match ($channel->name) {
                    ChannelTypeEnum::SMS->name =>  $user->notify(new SendSMSNotification($categoryName,$message)),
                    ChannelTypeEnum::Email->name =>  $user->notify(new SendMailNotification($categoryName,$message)),
                    ChannelTypeEnum::PushNotification->name =>  $user->notify(new SendPushNotification($categoryName,$message)),
                    default => ''
                };
                
            });
        });
    }
}
