<?php

namespace App\Services;

use App\Http\Requests\NotificationRequest;
use App\Jobs\SendNotificationJob;
use App\Repository\CategoryRepository;

class SendNotificationService {



    public function __construct() {
    }

    public function sendNotification(NotificationRequest $request,CategoryRepository $category) {
        $category = $category->find($request->category);
        SendNotificationJob::dispatch($category,$request->message);
    }
}