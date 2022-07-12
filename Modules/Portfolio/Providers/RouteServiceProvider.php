<?php

namespace Modules\Portfolio\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;
use Modules\Core\Http\Middleware\SetupRouteLanguage;
use Modules\Core\Http\Middleware\SetupSessionLanguage;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The module namespace to assume when generating URLs to actions.
     *
     * @var string
     */
    protected $moduleNamespace = 'Modules\Portfolio\Http\Controllers';

    /**
     * Called before routes are registered.
     *
     * Register any model bindings or pattern based filters.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        Route::middleware(['web', 'auth:admin', SetupSessionLanguage::class])
            ->prefix('admin')
            ->group(module_path('Portfolio', '/Routes/admin.php'));
        Route::middleware(['web', SetupRouteLanguage::class])
            ->prefix('{locale}')
            ->group(module_path('Portfolio', '/Routes/web.php'));
    }
}
