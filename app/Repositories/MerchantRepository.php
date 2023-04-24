<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Merchant;
use App\Repositories\Contracts\MerchantRepositoryInterface;

class MerchantRepository extends AbstractRepository implements MerchantRepositoryInterface
{
  protected $model = Merchant::class;
}
