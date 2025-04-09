<?php

namespace App\Repositories\Eloquent;

use App\Models\Category;
use App\Repositories\Contracts\CategoryRepositoryInterface;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function __construct(private Category $category)
    {
    }
    public function getAll()
    {
        return $this->category->latest()->get();
    }

    public function findById($id)
    {
        $category = $this->category->find($id);
        if (!$category) {
            throw new \Exception('Category not found', 404);
        }
        return $category;
    }

    public function create($data)
    {
        return $this->category->create($data);
    }

    public function update($id,  $data)
    {
        $category = $this->findById($id);
        $category->update($data);
        return $category;
    }

    public function delete($id)
    {
        $category = $this->findById($id);
        $category->delete();
    }
}
