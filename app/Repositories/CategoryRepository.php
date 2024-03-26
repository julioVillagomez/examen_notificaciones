<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository implements Repository{


    public function create(array $data){
        return Category::create($data);

    }
    public function get(){
        return Category::all();
    }
    public function find(int $id){
        return Category::find($id);
    }
    public function update(array $data,int $id){
        $category = Category::find($id);
        $category->update($data);
        return $category;
    }
    public function destroy(int $id){
        return Category::find($id)->delete();
    }
}