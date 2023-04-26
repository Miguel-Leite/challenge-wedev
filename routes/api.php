<?php

use App\Http\Controllers\V1\ProductController;
use App\Http\Controllers\V1\AuthController;
use App\Http\Controllers\V1\OrderController;
use App\Http\Controllers\V1\MerchantController;
use App\Http\Controllers\V1\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::post('/login', [AuthController::class, 'login']);


Route::middleware(['protectedRouteAuth'])->group(function () {
  Route::get('/me', [AuthController::class, 'me']);
  Route::get('/logout', [AuthController::class, 'logout']);
});

Route::middleware(['protectedRouteAuth'])->group(function () {
  Route::prefix('users')->group(function() {
    Route::get('/', [UserController::class, 'index']);
    Route::get('/{id}', [UserController::class, 'getById']);
    Route::post('/', [UserController::class, 'create']);
    Route::put('/{id}', [UserController::class, 'update']);
    Route::delete('/{id}', [UserController::class, 'delete']);
  });
  Route::prefix('merchants')->group(function() {
    Route::get('/', [MerchantController::class, 'index']);
    Route::get('/{id}', [MerchantController::class, 'getById']);
    Route::post('/', [MerchantController::class, 'create']);
    Route::put('/{id}', [MerchantController::class, 'update']);
    Route::delete('/{id}', [MerchantController::class, 'delete']);
  });

  Route::prefix('orders')->group(function() {
    Route::get('/', [OrderController::class, 'index']);
    Route::get('/{id}', [OrderController::class, 'getById']);
    Route::post('/', [OrderController::class, 'create']);
    Route::put('/{id}', [OrderController::class, 'update']);
    Route::delete('/{id}', [OrderController::class, 'delete']);
  });

  Route::prefix('products')->group(function() {
    Route::get('/', [ProductController::class, 'index']);
    Route::get('/{id}', [ProductController::class, 'getById']);
    Route::middleware(['verifyMerchantAdmin'])->group(function() {
      Route::post('/', [ProductController::class, 'create']);
      Route::put('/{id}', [ProductController::class, 'update']);
      Route::delete('/{id}', [ProductController::class, 'delete']);
    });
  });
});



