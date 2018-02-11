<?php

namespace Plexcellmedia\QuickAuth;

use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class QuickAuthServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadTranslationsFrom(__DIR__.'/Lang', 'quickauth');

        $this->publishes([
            __DIR__.'/Config/quickauth.php' => config_path('quickauth.php'),
        ], 'quickauth_config');

        $this->publishes([
            __DIR__.'/Lang' => resource_path('lang/vendor/quickauth'),
        ], 'quickauth_lang');

        $this->publishes([
            __DIR__.'/Views' => resource_path('views/vendor/quickauth'),
        ], 'quickauth_views');

        $this->publishes([
            __DIR__.'/Controllers' => app_path('Http/Controllers/QuickAuth'),
        ], 'quickauth_controllers');

        $this->publishes([
            __DIR__.'/Middleware' => app_path('Http/Middleware'),
        ], 'quickauth_middleware');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        App::bind('quickauth', function () {
            return new \Plexcellmedia\QuickAuth\QuickAuth;
        });
    }
}
