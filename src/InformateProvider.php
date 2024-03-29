<?php

namespace Informate;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Collection;

use Log;
use Muleta\Traits\Providers\ConsoleTools;
use Route;

class InformateProvider extends ServiceProvider
{
    use ConsoleTools;

    public $packageName = 'informate';
    const pathVendor = 'sierratecnologia/informate';

    public static $menuItens = [
        [
            'text' => 'Universo',
            'icon' => 'fas fa-fw fa-dice',
            'icon_color' => "blue",
            'label_color' => "success",
            'order' => 2100,
            // 'section'   => 'rica',
            // 'feature' => 'jogos',
            'dev_status'  => 1, // 0 (Desabilitado), 1 (Ativo), 2 (Em Dev)
            'level'       => 2, // 0 (Public), 1, 2 (Admin) , 3 (Root)
        ],
        [
            'text' => 'Abstrato',
            'icon' => 'fas fa-fw fa-dice',
            'icon_color' => "blue",
            'label_color' => "success",
            'order' => 2100,
            // 'section'   => 'rica',
            // 'feature' => 'jogos',
            'dev_status'  => 1, // 0 (Desabilitado), 1 (Ativo), 2 (Em Dev)
            'level'       => 2, // 0 (Public), 1, 2 (Admin) , 3 (Root)
        ],
        'Abstrato' => [
            [
                'text'        => 'Skills',
                'route'       => 'master.informate.skills.index',
                'icon'        => 'fas fa-fw fa-ship',
                'icon_color'  => 'blue',
                'label_color' => 'success',
                'section' => "master",
                'feature' => 'espolio',
                'order' => 1012,
                'level'       => 2, // 0 (Public), 1, 2 (Admin) , 3 (Root)
                // 'access' => \Porteiro\Models\Role::$ADMIN
            ],
            [
                'text'        => 'Positions',
                'route'       => 'master.informate.positions.index',
                'icon'        => 'fas fa-fw fa-ship',
                'icon_color'  => 'blue',
                'label_color' => 'success',
                'section' => "master",
                'feature' => 'social-relations',
                'order' => 1012,
                'level'       => 2, // 0 (Public), 1, 2 (Admin) , 3 (Root)
                // 'access' => \Porteiro\Models\Role::$ADMIN
            ],
            [
                'text'        => 'relations',
                'route'       => 'master.informate.relations.index',
                'icon'        => 'fas fa-fw fa-ship',
                'icon_color'  => 'blue',
                'label_color' => 'success',
                'section' => "master",
                'feature' => 'social-relations',
                'order' => 1012,
                'level'       => 2, // 0 (Public), 1, 2 (Admin) , 3 (Root)
                // 'access' => \Porteiro\Models\Role::$ADMIN
            ],
        ],
        'Universo' => [
            [
                'text'        => 'Acessorios',
                'route'       => 'master.informate.acessorios.index',
                'icon'        => 'fas fa-fw fa-ship',
                'icon_color'  => 'blue',
                'label_color' => 'success',
                'section' => "master",
                'feature' => 'espolio',
                'order' => 1012,
                'level'       => 2, // 0 (Public), 1, 2 (Admin) , 3 (Root)
                // 'access' => \Porteiro\Models\Role::$ADMIN
            ],
            [
                'text'        => 'Items',
                'route'       => 'master.informate.items.index',
                'icon'        => 'fas fa-fw fa-ship',
                'icon_color'  => 'blue',
                'label_color' => 'success',
                'section' => "master",
                'feature' => 'espolio',
                'order' => 1016,
                'level'       => 2, // 0 (Public), 1, 2 (Admin) , 3 (Root)
                // 'access' => \Porteiro\Models\Role::$ADMIN
            ],
            [
                'text'        => 'Equipamentos',
                'route'       => 'master.informate.equipaments.index',
                'icon'        => 'fas fa-fw fa-ship',
                'icon_color'  => 'blue',
                'label_color' => 'success',
                'section' => "master",
                'feature' => 'espolio',
                'order' => 1016,
                'level'       => 2, // 0 (Public), 1, 2 (Admin) , 3 (Root)
                // 'access' => \Porteiro\Models\Role::$ADMIN
            ],
        ]
    ];

    public static $aliasProviders = [

    ];
    
    public static $providers = [
        
    ];

    /**
     * Alias the services in the boot.
     *
     * @return void
     */
    public function boot(): void
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
        //     __DIR__.'../resources/views' => base_path('resources'.DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'Informate'),
        // ], 'SierraTecnologia Informate');


        
        $this->app->booted(
            function () {
                $this->routes();
            }
        );
    }


    /**
     * Register the tool's routes.
     *
     * @return void
     */
    protected function routes()
    {
        if ($this->app->routesAreCached()) {
            return;
        }

        /**
         * Finder Routes
         */
        $this->loadRoutesForRiCa(__DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'routes');
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

        $this->loadMigrationsFrom(__DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'database'.DIRECTORY_SEPARATOR.'migrations');

        // // Configs
        // $this->app->config->set('Informate.modules.Informate', include(__DIR__.'/config.php'));

        /*
        |--------------------------------------------------------------------------
        | Register the Commands
        |--------------------------------------------------------------------------
        */

        $this->commands([]);
    }


}
