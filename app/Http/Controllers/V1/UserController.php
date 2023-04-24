<?php

namespace App\Http\Controllers\V1;

use App\DTO\User\UserDTO;
use App\Http\Controllers\Controller;
use App\Interfaces\UserServiceInterface;
use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Http\Request;

class UserController extends Controller
{

  public function __construct() {}

  public function index(UserServiceInterface $userServiceInterface) {
    return response()->json([
      'data' => $userServiceInterface->getUsers(),
    ]);
  }
  public function create(Request $request)
  {
    $dto = new UserDTO(
      ...$request->only([
        "email",
        "name",
        "status",
        "password",
      ]),
    );

    return response()->json([
      $dto->toArray()
    ]);
  }
}
