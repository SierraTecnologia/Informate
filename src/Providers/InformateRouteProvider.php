<?php

namespace Informate\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Routing\Router;
use SiObject\Http\Middleware\Analytics;
use Informate\Http\Middleware\isAjax;

class InformateRouteProvider extends ServiceProvider
{
    /**
     * This namespace is applied to the controller routes in your routes file.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'Informate\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @param \Illuminate\Routing\Router $router
     */
    public function boot()
    {
        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @param \Illuminate\Routing\Router $router
     */
    public function map(Router $router)
    {
        $router->middleware('informate-analytics', Analytics::class);

        $router->group([
            'namespace' => $this->namespace,
        ], function ($router) {
            $router->middleware('isAjax', isAjax::class);
            require __DIR__.'/../Routes/web.php';
        });
    }
}
