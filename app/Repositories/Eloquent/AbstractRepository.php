<?php

declare(strict_types=1);

namespace App\Repositories\Eloquent;

abstract class AbstractRepository
{
  protected $model;

  public function __construct() {
    $this->model = $this->resolveModel();
  }

  public function all()
  {
    return $this->model;
  }

  protected function resolveModel() {
    return app($this->model);
  }
}
