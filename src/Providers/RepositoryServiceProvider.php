<?php namespace Edutalk\Base\Menu\Providers;

use Illuminate\Support\ServiceProvider;
use Edutalk\Base\Menu\Models\Menu;
use Edutalk\Base\Menu\Models\MenuNode;
use Edutalk\Base\Menu\Repositories\Contracts\MenuNodeRepositoryContract;
use Edutalk\Base\Menu\Repositories\Contracts\MenuRepositoryContract;
use Edutalk\Base\Menu\Repositories\MenuNodeRepository;
use Edutalk\Base\Menu\Repositories\MenuNodeRepositoryCacheDecorator;
use Edutalk\Base\Menu\Repositories\MenuRepository;
use Edutalk\Base\Menu\Repositories\MenuRepositoryCacheDecorator;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(MenuRepositoryContract::class, function () {
            $repository = new MenuRepository(new Menu());

            if (config('edutalk-caching.repository.enabled')) {
                return new MenuRepositoryCacheDecorator($repository);
            }

            return $repository;
        });
        $this->app->bind(MenuNodeRepositoryContract::class, function () {
            $repository = new MenuNodeRepository(new MenuNode());

            if (config('edutalk-caching.repository.enabled')) {
                return new MenuNodeRepositoryCacheDecorator($repository);
            }

            return $repository;
        });
    }
}
