<?php namespace Edutalk\Base\Menu\Providers;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;
use Edutalk\Base\Menu\Facades\DashboardMenuFacade;
use Edutalk\Base\Menu\Facades\MenuManagementFacade;
use Edutalk\Base\Menu\Http\Middleware\BootstrapModuleMiddleware;

class ModuleProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        /*Load views*/
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'edutalk-menus');
        /*Load translations*/
        $this->loadTranslationsFrom(__DIR__ . '/../../resources/lang', 'edutalk-menus');
        /*Load migrations*/
        $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');

        $this->publishes([
            __DIR__ . '/../../resources/views' => config('view.paths')[0] . '/vendor/edutalk-menus',
        ], 'views');
        $this->publishes([
            __DIR__ . '/../../resources/lang' => base_path('resources/lang/vendor/edutalk-menus'),
        ], 'lang');
        $this->publishes([
            __DIR__ . '/../../resources/assets' => resource_path('assets'),
        ], 'edutalk-assets');
        $this->publishes([
            __DIR__ . '/../../resources/public' => public_path(),
        ], 'Edutalk-public-assets');

        app()->booted(function () {
            $this->app->register(BootstrapModuleServiceProvider::class);
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //Load helpers
        load_module_helpers(__DIR__);

        $this->app->register(RouteServiceProvider::class);
        $this->app->register(RepositoryServiceProvider::class);

        //Register related facades
        $loader = \Illuminate\Foundation\AliasLoader::getInstance();
        $loader->alias('MenuManagement', MenuManagementFacade::class);
        $loader->alias('DashboardMenu', DashboardMenuFacade::class);

        /**
         * @var Router $router
         */
        $router = $this->app['router'];
        $router->pushMiddlewareToGroup('web', BootstrapModuleMiddleware::class);
    }
}
