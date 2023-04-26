<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
      $this->app->bind(
        'App\Repositories\Contracts\UserRepositoryInterface',
        'App\Repositories\UserRepository'
      );

      $this->app->bind(
        'App\Repositories\Contracts\MerchantRepositoryInterface',
        'App\Repositories\MerchantRepository',
      );

      $this->app->bind(
        'App\Repositories\Contracts\OrderRepositoryInterface',
        'App\Repositories\OrderRepository',
      );

      $this->app->bind(
        'App\Repositories\Contracts\ProductRepositoryInterface',
        'App\Repositories\ProductRepository',
      );

      $this->app->bind(
        'App\Interfaces\UserServiceInterface',
        'App\Services\UserService',
      );

      $this->app->bind(
        'App\Interfaces\MerchantServiceInterface',
        'App\Services\MerchantService',
      );

      $this->app->bind(
        'App\Interfaces\OrderServiceInterface',
        'App\Services\OrderService',
      );

      $this->app->bind(
        'App\Interfaces\LoginServiceInterface',
        'App\Services\LoginService',
      );

      $this->app->bind(
        'App\Interfaces\ProductServiceInterface',
        'App\Services\ProductService',
      );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
