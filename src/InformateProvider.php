<?php

namespace Informate;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class InformateProvider extends ServiceProvider
{
    public static $providers = [
        // \Informate\Providers\InformateEventServiceProvider::class,
        // \Informate\Providers\InformateServiceProvider::class,
        // \Informate\Providers\InformateRouteProvider::class,

        // \Audit\AuditProvider::class,
        // \Casa\CasaProvider::class,
    ];

    /**
     * Alias the services in the boot.
     */
    public function boot()
    {
        // $this->publishes([
        //     __DIR__.'/Publishes/resources/tools' => base_path('resources/tools'),
        //     __DIR__.'/Publishes/app/Services' => app_path('Services'),
        //     __DIR__.'/Publishes/public/js' => base_path('public/js'),
        //     __DIR__.'/Publishes/public/css' => base_path('public/css'),
        //     __DIR__.'/Publishes/public/img' => base_path('public/img'),
        //     __DIR__.'/Publishes/config' => base_path('config'),
        //     __DIR__.'/Publishes/routes' => base_path('routes'),
        //     __DIR__.'/Publishes/app/Controllers' => app_path('Http/Controllers/Informate'),
        // ]);

        // $this->publishes([
        //     __DIR__.'../resources/views' => base_path('resources/views/vendor/Informate'),
        // ], 'SierraTecnologia Informate');
    }

    /**
     * Register the services.
     */
    public function register()
    {
        $this->setProviders();

        // // View namespace
        // $this->loadViewsFrom(__DIR__.'/Views', 'Informate');

        // if (is_dir(base_path('resources/Informate'))) {
        //     $this->app->view->addNamespace('Informate-frontend', base_path('resources/Informate'));
        // } else {
        //     $this->app->view->addNamespace('Informate-frontend', __DIR__.'/Publishes/resources/Informate');
        // }

        $this->loadMigrationsFrom(__DIR__.'/Migrations');

        // // Configs
        // $this->app->config->set('Informate.modules.Informate', include(__DIR__.'/config.php'));

        /*
        |--------------------------------------------------------------------------
        | Register the Commands
        |--------------------------------------------------------------------------
        */

        $this->commands([]);
    }

    protected function setProviders()
    {
        collection(self::$providers)->map(function ($provider) {
            $this->app->register($provider);
        })

    }

}
