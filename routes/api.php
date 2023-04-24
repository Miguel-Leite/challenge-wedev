<?php

use App\Http\Controllers\MerchantController;
use App\Http\Controllers\V1\UserController;
use Illuminate\Http\Request;
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


Route::prefix('merchants')->group(function() {
  Route::get('/', [MerchantController::class, 'index']);
  Route::get('/{id}', [MerchantController::class, 'getById']);
  Route::post('/', [MerchantController::class, 'create']);
  Route::put('/{id}', [MerchantController::class, 'update']);
  Route::delete('/{id}', [MerchantController::class, 'delete']);
});
