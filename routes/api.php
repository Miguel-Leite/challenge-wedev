<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\V1\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('users')->group(function() {
  Route::get('/', [UserController::class, 'index']);
  Route::get('/{id}', [UserController::class, 'getById']);
  Route::post('/', [UserController::class, 'create']);
  Route::put('/{id}', [UserController::class, 'update']);
  Route::delete('/{id}', [UserController::class, 'delete']);
});

Route::prefix('products')->group(function() {
  Route::get('/', [ProductController::class, 'index']);
  Route::get('/{id}', [ProductController::class, 'getById']);
  Route::post('/', [ProductController::class, 'create']);
  Route::put('/{id}', [ProductController::class, 'update']);
  Route::delete('/{id}', [ProductController::class, 'delete']);
});


