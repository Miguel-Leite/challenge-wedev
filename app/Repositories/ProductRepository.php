<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Product;
use App\Repositories\Contracts\ProductRepositoryInterface;
use Illuminate\Support\Facades\DB;

class ProductRepository extends AbstractRepository implements ProductRepositoryInterface
{

  protected $model = Product::class;
}
