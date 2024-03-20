<?php

use App\Http\Controllers\NotificationController;
use Illuminate\Support\Facades\Route;


Route::get('/',[NotificationController::class,'formNotification']);
Route::post('/notification',[NotificationController::class,'sendNotification'])->name('notification');
Route::get('/log-notification',[NotificationController::class,'logNotification'])->name('log_notification');


