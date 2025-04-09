<?php

namespace App\Services;

use App\Repositories\Contracts\CategoryRepositoryInterface;

class CategoryService
{

    public function __construct(private CategoryRepositoryInterface $categoryRepository)
    {
    }

    public function getAllCategories()
    {
        return $this->categoryRepository->getAll();
    }

    public function createCategory($data)
    {
        return $this->categoryRepository->create($data);
    }

    public function getCategoryById($id)
    {
        return $this->categoryRepository->findById($id);
    }

    public function updateCategory($id, $data)
    {
        return $this->categoryRepository->update($id, $data);
    }

    public function deleteCategory($id)
    {
        return $this->categoryRepository->delete($id);
    }
}
