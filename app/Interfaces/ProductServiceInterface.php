<?php

declare(strict_types=1);

namespace App\Interfaces;

use App\DTO\Product\ProductDTO;

interface ProductServiceInterface
{
  public function getProducts();
  public function getProductById(int $id);
  public function create(ProductDTO $productDTO);
  public function update(ProductDTO $productDTO, int $id);
  public function delete(int $id);
}
