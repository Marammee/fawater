<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct(protected CategoryService $categoryService)
    {
    }

    public function index()
    {
        $categories = $this->categoryService->getAllCategories();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $this->categoryService->createCategory($request->all());
        return redirect()->route('categories.index')->with('success', 'Category created successfully');
    }

    public function show($id)
    {
        $category = $this->categoryService->getCategoryById($id);
        return view('admin.categories.show', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $this->categoryService->updateCategory($request->all(), $id);
        return redirect()->route('categories.index')->with('success', 'Category updated successfully');
    }

    public function edit($id)
    {
        $category = $this->categoryService->getCategoryById($id);
        return view('admin.categories.edit', compact('category'));
    }
}
