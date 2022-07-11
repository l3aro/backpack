<?php

namespace Modules\Portfolio\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;
use Modules\Blog\Models\Post;
use Modules\Core\Http\Middleware\SetupRouteLanguage;

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
        $locale = app()->getLocale();
        Route::bind('postSlug', function ($slug) use ($locale) {
            return Post::where('slug->'.$locale, $slug)->first() ?? abort(404);
        });
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        Route::middleware(['web'])
            ->group(module_path('Portfolio', '/Routes/neutral.php'));

        Route::middleware(['web', SetupRouteLanguage::class])
            ->prefix('{locale}')
            ->group(module_path('Portfolio', '/Routes/web.php'));
    }
}
