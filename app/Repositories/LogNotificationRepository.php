<?php

namespace App\Repositories;

use App\Models\LogNotification;

class LogNotificationRepository implements Repository{


    public function create(array $data){
        return LogNotification::create($data);

    }
    public function get(){
        return LogNotification::log()->get();
    }
    public function find(int $id){
        return LogNotification::find($id);
    }
    public function update(array $data,int $id){
        $model = LogNotification::find($id);
        $model->update($data);
        return $model;
    }
    public function destroy(int $id){
        return LogNotification::find($id)->delete();
    }

    public function paginate(int $paginate = 50){
        return LogNotification::log()->paginate($paginate);
    }
}