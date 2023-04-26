<?php

declare(strict_types=1);

namespace App\Services;

use App\DTO\Product\ProductDTO;
use App\DTO\User\UserDTO;
use App\Interfaces\ProductServiceInterface;
use App\Repositories\Contracts\ProductRepositoryInterface;
use App\Repositories\Contracts\UserRepositoryInterface;

class ProductService implements ProductServiceInterface
{
  public function __construct(
    public ProductRepositoryInterface $productRepository,
  ) {}

  public function getProducts() {
    return $this->productRepository->all();
  }

  public function create(ProductDTO $productDTO) {
    return $this->productRepository->store($productDTO->toArray());
  }

  public function update(ProductDTO $productDTO, int $id) {
    $userExists = $this->productRepository->find($id);

    if (!$userExists) {
      return "Product not found!";
    }
    $this->productRepository->save($id, $productDTO->all());
  }

  public function delete($id) {
    $userExists = $this->productRepository->find($id);

    if (!$userExists) {
      return "User not found!";
    }
    return $this->productRepository->destroy($id);
  }

  public function getProductById(int $id)
  {
    return $this->productRepository->find($id);
  }
}
