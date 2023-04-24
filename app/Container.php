<?php

namespace App;

class Container
{
  protected array $bindings = [];

  public function bind(mixed $key, mixed $value) {
    $this->bindings[$key] = $value;
  }

  public function make(mixed $key): mixed {
    if (!isset($key) || !is_callable($this->bindings[$key])) {
      return $this->bindings[$key];
    }

    return call_user_func($this->bindings[$key]);
  }
}
