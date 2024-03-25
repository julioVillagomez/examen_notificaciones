<?php

namespace App\Repository;

interface Repository{

    public function create(array $data);
    public function get();
    public function find(int $id);
    public function update(array $data,int $id);
    public function destroy(int $id);

}