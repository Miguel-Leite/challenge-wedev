<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
  use HandlesAuthorization;

  const ADMIN     = "admin";
  const MERCHANT  = "merchant";
  const DELETE     = "delete";

  public function admin(User $user): bool
  {
    return $user->isAdmin();
  }

}
