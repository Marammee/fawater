<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Services\CategoryService;
use App\Traits\ApiResponse;

class CategoryController extends Controller
{
    use ApiResponse;

    public function __construct(protected CategoryService $categoryService)
    {
    }

    // Get all categories
    public function index()
    {
        $categories = $this->categoryService->getAllCategories();
        if ($categories->isEmpty()) {
            return ApiResponse::notFound('No categories found');
        }
        return ApiResponse::show(CategoryResource::collection($categories), 'Categories fetched successfully');
    }

    // Get a specific category
    public function show($id)
    {
        $category = $this->categoryService->getCategoryById($id);
        if (!$category) {
            return ApiResponse::notFound('Category not found');
        }
        return ApiResponse::show(new CategoryResource($category), 'Category fetched successfully');
    }

    // Create a new category
    public function store(StoreCategoryRequest $request)
    {
        // Validate the request data
        $validatedData = $request->validated();

        if (empty($validatedData)) {
            return ApiResponse::validationError('Validation error', $validatedData);
        }

        $category = $this->categoryService->createCategory($validatedData);

        if (!$category) {
            return ApiResponse::error('Failed to create category');
        }

        return ApiResponse::created(new CategoryResource($category), 'Category created successfully');
    }

    // Update a category
    public function update(UpdateCategoryRequest $request, $id)
    {
        // Validate the request data
        $validatedData = $request->validated();

        if (empty($validatedData)) {
            return ApiResponse::validationError('Validation error', $validatedData);
        }

        $category = $this->categoryService->updateCategory($id, $validatedData);
        if (!$category) {
            return ApiResponse::notFound('Category not found');
        }

        return ApiResponse::updated(new CategoryResource($category), 'Category updated successfully');
    }

    // Delete a category
    public function destroy($id)
    {
        $category = $this->categoryService->deleteCategory($id);
        if (!$category) {
            return ApiResponse::notFound('Category not found');
        }

        return ApiResponse::deleted('Category deleted successfully');
    }
}
