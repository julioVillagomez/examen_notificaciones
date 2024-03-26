<?php

namespace App\Repositories;

use App\Models\Category;
use App\Models\User;

class UserRepository implements Repository{


    public function create(array $data){
        return User::create($data);

    }
    public function get(){
        return User::all();
    }
    public function find(int $id){
        return User::find($id);
    }
    public function update(array $data,int $id){
        $model = User::find($id);
        $model->update($data);
        return $model;
    }
    public function destroy(int $id){
        return User::find($id)->delete();
    }

    public function filterCategory(Category $category){
        return User::filterCategory($category)->with('channels')->get();
    }
}