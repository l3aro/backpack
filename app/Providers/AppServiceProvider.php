<?php

namespace App\Providers;

use Closure;
use Illuminate\Support\ServiceProvider;
use Modules\Core\Navigation\Item;
use Modules\Core\Navigation\Navigation;
use Modules\Core\Navigation\Section;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            \App\Services\Contracts\MarkdownTableService::class,
            \App\Services\Eloquent\MarkdownTableServiceEloquent::class
        );
        $this->app->when(\Modules\Core\View\Components\Aside\Index::class)
            ->needs(Navigation::class)
            ->give($this->declareAdminNavigation());
        $this->app->when(\Modules\Portfolio\View\Components\Aside\Index::class)
            ->needs(Navigation::class)
            ->give($this->declarePortfolioNavigation());
    }

    protected function declareAdminNavigation(): Closure
    {
        return function () {
            return Navigation::make()
                ->add(fn (Item $item) => $item
                    ->setTitle(__('Dashboard'))
                    ->setUrl(route('admin.dashboard'))
                    ->setIcon('heroicon-o-circle-stack')
                    ->activeWhen(fn () => request()->routeIs('admin.dashboard')))
                ->add(fn (Item $item) => $item
                    ->setTitle(__('Home'))
                    ->setUrl(route('home'))
                    ->setIcon('heroicon-o-home')
                    ->setOpenNewTab(true))
                ->add(fn (Item $item) => $item
                    ->setTitle('Shop')
                    ->setChildren(fn (Section $section) => $section
                        ->add(fn (Item $item) => $item
                            ->setTitle(__('Shop Categories'))
                            ->setUrl(route('admin.shop.categories.index'))
                            ->setIcon('heroicon-o-tag')
                            ->activeWhen(fn () => request()->routeIs('admin.shop.categories.*')))))
                        // ->add(fn (Item $item) => $item
                        //     ->setTitle(__('Blog Posts'))
                        //     ->setUrl(route('admin.blog.posts.index'))
                        //     ->setIcon('heroicon-o-document-text')
                        //     ->activeWhen(fn () => request()->routeIs('admin.blog.posts.*')))))
                ->add(fn (Item $item) => $item
                    ->setTitle('Blog')
                    ->setChildren(fn (Section $section) => $section
                        ->add(fn (Item $item) => $item
                            ->setTitle(__('Blog Categories'))
                            ->setUrl(route('admin.blog.categories.index'))
                            ->setIcon('heroicon-o-archive-box')
                            ->activeWhen(fn () => request()->routeIs('admin.blog.categories.*')))
                        ->add(fn (Item $item) => $item
                            ->setTitle(__('Blog Posts'))
                            ->setUrl(route('admin.blog.posts.index'))
                            ->setIcon('heroicon-o-document-text')
                            ->activeWhen(fn () => request()->routeIs('admin.blog.posts.*')))))
                ->add(fn (Item $item) => $item
                    ->setTitle('Work')
                    ->setChildren(fn (Section $section) => $section
                        ->add(fn (Item $item) => $item
                            ->setTitle(__('Work Categories'))
                            ->setUrl(route('admin.work.categories'))
                            ->setIcon('heroicon-o-archive-box')
                            ->activeWhen(fn () => request()->routeIs('admin.work.categories')))
                        ->add(fn (Item $item) => $item
                            ->setTitle(__('Work Projects'))
                            ->setUrl(route('admin.work.projects'))
                            ->setIcon('heroicon-o-briefcase')
                            ->activeWhen(fn () => request()->routeIs('admin.work.projects')))))
                ->add(fn (Item $item) => $item
                    ->setTitle(__('Aoe2 Notebook'))
                    ->setChildren(fn (Section $section) => $section
                        ->add(fn (Item $item) => $item
                            ->setTitle(__('Civilizations'))
                            ->setUrl(route('admin.aoe2notebook.civilizations.index'))
                            ->setIcon('heroicon-o-users')
                            ->activeWhen(fn () => request()->routeIs('admin.aoe2notebook.civilizations.*')))
                        ->add(fn (Item $item) => $item
                            ->setTitle(__('Units'))
                            ->setUrl(route('admin.aoe2notebook.units.index'))
                            ->setIcon('heroicon-o-sparkles')
                            ->activeWhen(fn () => request()->routeIs('admin.aoe2notebook.units.*')))))
                ->add(fn (Item $item) => $item
                    ->setTitle('Settings')
                    ->setChildren(fn (Section $section) => $section
                        ->add(fn (Item $item) => $item
                            ->setTitle(__('Users'))
                            ->setUrl(route('admin.users.index'))
                            ->setIcon('heroicon-o-user')
                            ->activeWhen(fn () => request()->routeIs('admin.users.*')))
                        ->add(fn (Item $item) => $item
                            ->setTitle(__('General'))
                            ->setUrl(route('admin.settings.general'))
                            ->setIcon('heroicon-s-cog')
                            ->activeWhen(fn () => request()->routeIs('admin.settings.general')))
                        ->add(fn (Item $item) => $item
                            ->setTitle(__('Portfolio'))
                            ->setUrl(route('admin.settings.portfolio'))
                            ->setIcon('heroicon-o-bookmark')
                            ->activeWhen(fn () => request()->routeIs('admin.settings.portfolio')))));
        };
    }

    protected function declarePortfolioNavigation(): Closure
    {
        return function () {
            $locale = session()->get('locale', config('app.locale'));

            return Navigation::make()
                ->add(fn (Item $item) => $item
                    ->setTitle(__('Home'))
                    ->setUrl(route('portfolio.home', $locale))
                    ->activeWhen(fn () => request()->routeIs('portfolio.home')))
                ->add(fn (Item $item) => $item
                    ->setTitle(__('Blog'))
                    ->setUrl(route('portfolio.blogs.index', $locale))
                    ->activeWhen(fn () => request()->routeIs('portfolio.blogs.*')));
        };
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
