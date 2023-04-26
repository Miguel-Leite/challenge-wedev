<?php

declare(strict_types=1);

namespace App\Interfaces;

use App\DTO\Merchant\MerchantDTO;

interface MerchantServiceInterface
{
  public function getMerchants();
  public function getMerchantById(int $id);
  public function create(MerchantDTO $merchantDTO);
  public function update(MerchantDTO $userDTO, int $id);
  public function delete(int $id);
}
