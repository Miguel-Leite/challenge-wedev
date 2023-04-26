<?php

declare(strict_types=1);

namespace App\Interfaces;

use App\DTO\Login\LoginDTO;

interface LoginServiceInterface {
  public function login(LoginDTO $loginDTO);
}
