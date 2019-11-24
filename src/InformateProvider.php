<?php

namespace Informate;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class InformateProvider extends ServiceProvider
{
    /**
     * Alias the services in the boot.
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/Publishes/resources/tools' => base_path('resources/tools'),
            __DIR__.'/Publishes/app/Services' => app_path('Services'),
            __DIR__.'/Publishes/public/js' => base_path('public/js'),
            __DIR__.'/Publishes/public/css' => base_path('public/css'),
            __DIR__.'/Publishes/public/img' => base_path('public/img'),
            __DIR__.'/Publishes/config' => base_path('config'),
            __DIR__.'/Publishes/routes' => base_path('routes'),
            __DIR__.'/Publishes/app/Controllers' => app_path('Http/Controllers/Informate'),
        ]);

        $this->publishes([
            __DIR__.'../resources/views' => base_path('resources/views/vendor/informate'),
        ], 'SierraTecnologia Informate');
       
    }

    /**
     * Register the services.
     */
    public function register()
    {
        $this->setProviders();

        // View namespace
        $this->loadViewsFrom(__DIR__.'/Views', 'informate');

        $this->loadMigrationsFrom(__DIR__.'/Migrations');

        // Configs
        $this->app->config->set('informate.modules.informate', include(__DIR__.'/config.php'));

        /*
        |--------------------------------------------------------------------------
        | Register the Commands
        |--------------------------------------------------------------------------
        */

        $this->commands([]);
    }

    protected function setProviders()
    {
        $this->app->register(\Informate\Providers\InformateEventServiceProvider::class);
        $this->app->register(\Informate\Providers\InformateServiceProvider::class);
        $this->app->register(\Informate\Providers\InformateRouteProvider::class);

    }

}
