<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Merchant;
use App\Models\User;
use App\Repositories\Contracts\MerchantRepositoryInterface;

class MerchantRepository extends AbstractRepository implements MerchantRepositoryInterface
{
  protected $model = Merchant::class;

  public function create(array $data) {

    $user = User::create([
      'name'=> $data['name'],
      'email' => $data['email'],
      'password' => $data['password'],
      'is_admin' => true,
    ]);

    $merchant = Merchant::create([
      'merchant_name' => $data['name'],
    ]);

    $user->merchant()->save($merchant);
  }
}
