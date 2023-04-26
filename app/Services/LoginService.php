<?php

declare(strict_types=1);

namespace App\Services;

use App\DTO\Login\LoginDTO;
use App\Interfaces\LoginServiceInterface;

class LoginService implements LoginServiceInterface {
  public function login(LoginDTO $loginDTO)
  {
    $credentials = $loginDTO->toArray();
    if (!$token = auth()->setTTl(6*60)->attempt($credentials))
      throw new \Exception('Not Authorized', 401);

    return [
      'access_token' => $token,
      'token_type' => 'Bearer',
      'expires_in' => auth()->factory()->getTTl(),
      'user' => auth()->user(),
    ];
  }
}
