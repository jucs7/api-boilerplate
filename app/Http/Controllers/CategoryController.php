<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use App\Services\CategoryService;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function __construct(protected CategoryService $service) {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json($this->service->list());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $category = $this->service->create($request->validated());
        return response()->json($category, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return response()->json($this->service->find($category->id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category = $this->service->update($category, $request->validated());
        return response()->json($category);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        if (Auth::user()->cannot('delete', $category)) {
            abort(403);
        }

        if ($this->service->delete($category)) {
            return response()->json(null, 204);
        }

        return response()->json([
            'error_id' => 500,
            'message' => 'Internal Server Error: Unable to delete the category.',
        ], 500);
    }
}
