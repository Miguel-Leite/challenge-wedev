<?php

declare(strict_types=1);

namespace App\Services;

use App\DTO\User\OutputUserDTO;
use App\DTO\User\UserDTO;
use App\Interfaces\UserServiceInterface;
use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Http\Request;

class UserService implements UserServiceInterface
{
  public function __construct(
    public UserRepositoryInterface $userRepository,
  ) {}
  public function getUsers() {
    return $this->userRepository->all();
  }

  public function create(UserDTO $userDTO) {
    $this->userRepository->store($userDTO->toArray());
  }
}
