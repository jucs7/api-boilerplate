<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Contracts\CategoryRepositoryInterface;
use App\Models\Category;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function all(): array
    {
        return Category::all()->toArray();
    }

    public function find(int $id): ?Category
    {
        return Category::find($id);
    }

    public function create(array $data): Category
    {
        return Category::create($data);
    }

    public function update(Category $category, array $data): ?Category
    {
        $category->update($data);
        return $category;
    }

    public function delete(Category $category): bool
    {
        return $category->delete();
    }
}