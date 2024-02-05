<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\LoginService;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(LoginService::class, function ($app) {
            return new LoginService();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
