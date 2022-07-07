<?php

namespace Modules\Core\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;
use Modules\Core\Http\Middleware\SetupSessionLanguage;

class RouteServiceProvider extends ServiceProvider
{
    public const HOME = '/admin';

    public function boot()
    {
        parent::boot();
    }

    public function map()
    {
        Route::prefix('api')
            ->middleware('api')
            ->group(module_path('Core', '/Routes/api.php'));

        Route::middleware('web', SetupSessionLanguage::class)
            ->prefix('admin')
            ->group(module_path('Core', '/Routes/web.php'));
    }
}
