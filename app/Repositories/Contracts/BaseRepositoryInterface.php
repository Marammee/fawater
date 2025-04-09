<?php

namespace App\Repositories\Contracts;


interface BaseRepositoryInterface
{
    public function getAll();
    public function create($data);
    public function findById($id);
    public function update($id, $data);
    public function delete($model);
}
