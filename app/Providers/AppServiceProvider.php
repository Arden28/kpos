<?php

namespace App\Providers;

use App\Interfaces\Auth\OtpInterface;
use App\Repositories\Auth\OtpRepository;
use App\Services\OtpServiceInterface;
use App\Services\VonageOtpService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(OtpInterface::class, OtpRepository::class);
        // $this->app->bind(OtpRepository::class, function ($app) {
        //     return new OtpRepository($app->make(OtpServiceInterface::class));
        // });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        Model::preventLazyLoading(!app()->isProduction());
    }
}
