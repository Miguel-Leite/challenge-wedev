<?php

namespace App\Http\Controllers\V1;

use App\DTO\Login\LoginDTO;
use App\Http\Controllers\Controller;
use App\Interfaces\LoginServiceInterface;
use Illuminate\Http\Request;

class AuthController extends Controller
{
  public function __construct(
    public LoginServiceInterface $loginServiceInterface,
  ) {}
  public function login(Request $request) {
    try {
      $credentials = new LoginDTO(...$request->only('email', 'password'));
      $login = $this->loginServiceInterface->login($credentials);
      return response()->json($login);
    } catch (\Exception $e) {
      return response()->json(['error'=> true, ''=> $e->getMessage()], 500);
    }
  }

  public function me() {
    try {
      return response()->json(auth()->user());
    } catch (\Exception $e) {
      return response()->json(['error'=> true, ''=> $e->getMessage()], 500);
    }
  }

  public function logout() {
    try {
      auth()->logout();
      return response()->json(true);
    } catch (\Exception $e) {
      return response()->json(['error'=> true, ''=> $e->getMessage()], 500);
    }
  }
}
