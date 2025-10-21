<?php

namespace app\Services;

use App\Models\Category;
use App\Repositories\Contracts\CategoryRepositoryInterface;

class CategoryService
{
    public function __construct(protected CategoryRepositoryInterface $repository) {}

    public function list(): array
    {
        return $this->repository->all();
    }

    public function find(int $id): ?Category
    {
        return $this->repository->find($id);
    }

    public function create(array $data): Category
    {
        return $this->repository->create($data);
    }

    public function update(Category $category, array $data): Category
    {
        return $this->repository->update($category, $data);
    }

    public function delete(Category $category): bool
    {
        return $this->repository->delete($category);
    }
}