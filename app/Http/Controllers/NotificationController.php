<?php

namespace App\Http\Controllers;

use App\Http\Requests\NotificationRequest;
use App\Repository\CategoryRepository;
use App\Repository\LogNotificationRepository;
use App\Services\SendNotificationService;

class NotificationController extends Controller
{
    public function formNotification(CategoryRepository $category){
        return view('notification')->with('categories',$category->get());
    }

    public function sendNotification(SendNotificationService $service,NotificationRequest $request,CategoryRepository $category){
        $service->sendNotification($request,$category);
        return redirect()->back()->with('success','Mensaje enviado correctamente');
    }

    public function logNotification(LogNotificationRepository $repository){
        $logs = $repository->paginate();
        return view('table_notification')->with('logs',$logs);
    }
}
