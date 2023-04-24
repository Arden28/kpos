<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\Models\User;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\URL;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        // Model::preventLazyLoading(!app()->isProduction());

        if($this->app->environment('production')) {
            URL::forceScheme('https');
        }

        Blade::directive('middleware', function ($middleware) {
            return "<?php if (app('middleware')->dispatch(new \\Illuminate\\Http\\Request, '$middleware')->getStatusCode() == 403) { abort(403); } ?>";
        });



    }

}
