<?php

declare(strict_types=1);

namespace App\Services;

use App\DTO\Product\ProductDTO;
use App\Interfaces\ProductServiceInterface;
use App\Repositories\Contracts\ProductRepositoryInterface;

class ProductService implements ProductServiceInterface {
  public function __construct(
    private ProductRepositoryInterface $productRepository,
  ) {}
  public function getProducts() {
    return $this->productRepository->all();
  }
  public function getProductById(int $id) {
    return $this->productRepository->find($id);
  }
  public function create(ProductDTO $productDTO) {
    return $this->productRepository->store($productDTO->toArray());
  }
  public function update(ProductDTO $productDTO, int $id) {
    $productExists = $this->productRepository->find($id);
    if (!$productExists) {
      return "Product not found!";
    }
    $this->productRepository->save($id, $productDTO->toArray());
    return $productExists;
  }
  public function delete(int $id) {
    $productExists = $this->productRepository->find($id);
    if (!$productExists) {
      return "Product not found!";
    }
    return $this->productRepository->destroy($id);
  }
}
