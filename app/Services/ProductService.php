<?php 

namespace App\Services;

use App\Models\Product;
use App\Repositories\Contracts\ProductRepositoryInterface;

class ProductService
{
    public function __construct(protected ProductRepositoryInterface $repository) {}

    public function list(): array
    {
        return $this->repository->all();
    }

    public function find(int $id): ?Product
    {
        return $this->repository->find($id);
    }

    public function create(array $data): Product
    {
        return $this->repository->create($data);
    }

    public function update(Product $product, array $data): Product
    {
        return $this->repository->update($product, $data);
    }

    public function delete(Product $product): bool
    {
        return $this->repository->delete($product);
    }
}