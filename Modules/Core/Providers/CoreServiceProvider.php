<?php

namespace Modules\Core\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Spatie\Translatable\Facades\Translatable;

class CoreServiceProvider extends ServiceProvider
{
    /**
     * @var string $moduleName
     */
    protected $moduleName = 'Core';

    /**
     * @var string $moduleNameLower
     */
    protected $moduleNameLower = 'core';

    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerTranslations();
        $this->registerConfig();
        $this->registerViews();
        $this->loadMigrationsFrom(module_path($this->moduleName, 'Database/Migrations'));
        require_once(module_path($this->moduleName, 'helpers.php'));
        Translatable::fallback(
            fallbackAny: true,
        );
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);

        $this->app->bind(\Modules\Core\Services\Contracts\AuthenticationService::class, \Modules\Core\Services\Eloquent\AuthenticationServiceEloquent::class);
        $this->app->bind(\Modules\Core\Services\Contracts\ResetPasswordService::class, \Modules\Core\Services\Eloquent\ResetPasswordServiceEloquent::class);
        $this->app->bind(\Modules\Core\Services\Contracts\UserService::class, \Modules\Core\Services\Eloquent\UserServiceEloquent::class);
        $this->app->bind(\Modules\Core\Navigation\Item::class, \Modules\Core\Navigation\Domains\ItemDefault::class);
        $this->app->bind(\Modules\Core\Navigation\Section::class, \Modules\Core\Navigation\Domains\SectionDefault::class);

        $this->commands([
            \Modules\Core\Console\MakeAdminCommand::class,
        ]);
    }

    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->publishes([
            module_path($this->moduleName, 'Config/config.php') => config_path($this->moduleNameLower . '.php'),
        ], 'config');
        $this->mergeConfigFrom(
            module_path($this->moduleName, 'Config/config.php'),
            $this->moduleNameLower
        );
    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $viewPath = resource_path('views/modules/' . $this->moduleNameLower);

        $sourcePath = module_path($this->moduleName, 'Resources/views');

        $this->publishes([
            $sourcePath => $viewPath
        ], ['views', $this->moduleNameLower . '-module-views']);

        $this->loadViewsFrom(array_merge($this->getPublishableViewPaths(), [$sourcePath]), $this->moduleNameLower);

        Blade::directive('boolean', function (string $value) {
            return "<?= json_encode(filter_var($value, FILTER_VALIDATE_BOOLEAN)); ?>";
        });

        Blade::component("{$this->moduleNameLower}::aside", \Modules\Core\View\Components\Aside\Index::class);
    }

    /**
     * Register translations.
     *
     * @return void
     */
    public function registerTranslations()
    {
        $langPath = resource_path('lang/modules/' . $this->moduleNameLower);

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, $this->moduleNameLower);
        } else {
            $this->loadTranslationsFrom(module_path($this->moduleName, 'Resources/lang'), $this->moduleNameLower);
        }
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }

    private function getPublishableViewPaths(): array
    {
        $paths = [];
        foreach (\Config::get('view.paths') as $path) {
            if (is_dir($path . '/modules/' . $this->moduleNameLower)) {
                $paths[] = $path . '/modules/' . $this->moduleNameLower;
            }
        }
        return $paths;
    }
}
