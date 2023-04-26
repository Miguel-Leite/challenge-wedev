<?php

declare(strict_types=1);

namespace App\Repositories\Contracts;

interface OrderRepositoryInterface
{
  public function find(int $id);
  public function all();
  public function create(array $data);
  public function update(int $id, array $data);
  public function delete(int $id);
}
