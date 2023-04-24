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
        'App\Interfaces\UserServiceInterface',
        'App\Services\UserService',
      );

      $this->app->bind(
        'App\Interfaces\MerchantServiceInterface',
        'App\Services\MerchantService',
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
