<?php

namespace App\Http\Controllers;

use App\Http\Requests\NotificationRequest;
use App\Jobs\SendNotificationJob;
use App\Models\Category;
use App\Models\LogNotification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function formNotification(){
        return view('notification')->with('categories',Category::all());
    }

    public function sendNotification(NotificationRequest $request){
        $category = Category::find($request->category);
        SendNotificationJob::dispatch($category,$request->message);
        return redirect()->back()->with('success','Mensaje enviado correctamente');
    }

    public function logNotification(){

        $logs = LogNotification::orderBy('id','desc')->with('user')->paginate(50);

        return view('table_notification')->with('logs',$logs);
    }
}
