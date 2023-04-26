<?php

declare(strict_types=1);

namespace App\Services;

use App\DTO\Merchant\MerchantDTO;
use App\Interfaces\MerchantServiceInterface;
use App\Repositories\Contracts\MerchantRepositoryInterface;

class MerchantService implements MerchantServiceInterface
{
  public function __construct(
    public MerchantRepositoryInterface $merchantRepository,
  ) {}

  public function getMerchantById(int $id) {
    return $this->merchantRepository->find($id);
  }
  public function getMerchants() {
    return $this->merchantRepository->all();
  }

  public function create(MerchantDTO $userDTO) {
    return $this->merchantRepository->create($userDTO->toArray());
  }

  public function update(MerchantDTO $merchantDTO, int $id) {
    $userExists = $this->merchantRepository->find($id);

    if (!$userExists) {
      return "Merchant not found!";
    }
    $this->merchantRepository->save($id, $merchantDTO->all());
  }

  public function delete($id) {
    $merchantExists = $this->merchantRepository->find($id);

    if (!$merchantExists) {
      return "Merchant not found!";
    }
    return $this->merchantRepository->destroy($id);
  }
}
