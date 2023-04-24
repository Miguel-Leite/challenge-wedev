<?php

namespace App\Http\Controllers\V1;

use App\DTO\User\UserDTO;
use App\Http\Controllers\Controller;
use App\Interfaces\UserServiceInterface;
use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Http\Request;

class UserController extends Controller
{

  public function __construct(
    public UserServiceInterface $userServiceInterface
  ) {}

  public function index() {
    return response()->json([
      'data' => $this->userServiceInterface->getUsers(),
    ]);
  }

  public function create(Request $request)
  {
    $user = new UserDTO(
      ...$request->only([
        "email",
        "name",
        "is_admin",
        "password",
      ]),
    );

    $response = $this->userServiceInterface->create($user);
    return response()->json($response);
  }

  public function update(Request $request, int $id)
  {
    $user = new UserDTO(
      ...$request->only([
        "email",
        "name",
        "is_admin",
        "password",
      ]),
    );

    $response = $this->userServiceInterface->update($user, $id);
    return response()->json($user->all());
  }

  public function delete(int $id) {
    $response = $this->userServiceInterface->delete($id);
    return response()->json($response);
  }
}
