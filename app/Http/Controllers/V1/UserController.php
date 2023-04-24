<?php

namespace App\Http\Controllers\V1;

use App\DTO\user\UserDTO;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
  public function   create(Request $request)
  {
    $dto = new UserDTO(
      ...$request->only([
        "email",
        "name",
        "status",
        "password",
      ]),
    );

    dd($dto->toArray());
  }
}
