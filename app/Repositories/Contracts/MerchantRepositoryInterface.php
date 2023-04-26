<?php

declare(strict_types=1);

namespace App\Repositories\Contracts;

interface MerchantRepositoryInterface
{
  public function find(int $id);
  public function all();
  public function store(array $data);
  public function create(array $data);
  public function save(int $id, array $data);
  public function destroy(int $id);
}
