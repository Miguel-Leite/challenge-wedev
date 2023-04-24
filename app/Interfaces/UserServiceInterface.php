<?php

declare(strict_types=1);

namespace App\Interfaces;

use App\DTO\User\UserDTO;

interface UserServiceInterface
{
  public function getUsers();
  public function create(UserDTO $userDTO);
  public function update(UserDTO $userDTO, int $id);
  public function delete(int $id);
}
