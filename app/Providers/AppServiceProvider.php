<?php

namespace App\Providers;

use App\Interfaces\Auth\OtpInterface;
use App\Models\User as ModelsUser;
use App\Repositories\Auth\OtpRepository;
use App\Services\OtpServiceInterface;
use App\Services\VonageOtpService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\Models\User;
use Spatie\Onboard\Facades\Onboard;

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
    // public function boot()
    // {
    //     Schema::defaultStringLength(191);
    //     Model::preventLazyLoading(!app()->isProduction());


	//     Onboard::addStep('Complétez votre Profile')
    //     ->link(route('profile'))
    //     ->cta('Complete')
    //     /**
    //      * The completeIf will pass the class that you've added the
    //      * interface & trait to. You can use Laravel's dependency
    //      * injection here to inject anything else as well.
    //      */
    //     ->completeIf(function (User $model) {
    //         return $model->profile->isComplete();
    //     });

    //     Onboard::addStep('Complétez le profil de votre Enterprise')
    //         ->link(route('settings.index'))
    //         ->cta('Complete Copany')
    //         ->completeIf(function (User $model) {
    //             return $model->posts->count() > 0;
    //         });
    // }

}
