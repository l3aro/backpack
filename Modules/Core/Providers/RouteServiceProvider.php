<?php

namespace Modules\Core\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    public const ADMIN_ROOT = '/admin';

    public const HOME = '/';

    public function boot()
    {
        parent::boot();
    }

    public function map()
    {
        Route::prefix('api')
            ->middleware('api')
            ->group(module_path('Core', '/Routes/api.php'));

        Route::middleware('web')
            ->prefix('admin')
            ->group(module_path('Core', '/Routes/admin.php'));

        Route::middleware('web')
            ->group(module_path('Core', '/Routes/web.php'));
    }
}
