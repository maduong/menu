<?php namespace Edutalk\Base\Menu\Http\Middleware;

use \Closure;
use Edutalk\Base\Menu\Repositories\Contracts\MenuRepositoryContract;
use Edutalk\Base\Menu\Repositories\MenuRepository;

class BootstrapModuleMiddleware
{
    public function __construct()
    {

    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @param  array|string $params
     * @return mixed
     */
    public function handle($request, Closure $next, ...$params)
    {
        /**
         * Register to dashboard menu
         */
        dashboard_menu()->registerItem([
            'id' => 'edutalk-menus',
            'priority' => 20,
            'parent_id' => null,
            'heading' => null,
            'title' => trans('edutalk-menus::base.menus'),
            'font_icon' => 'fa fa-bars',
            'link' => route('admin::menus.index.get'),
            'css_class' => null,
            'permissions' => ['view-menus']
        ]);

        cms_settings()
            ->addSettingField('main_menu', [
                'group' => 'basic',
                'type' => 'select',
                'priority' => 3,
                'label' => trans('edutalk-menus::base.settings.main_menu.label'),
                'helper' => trans('edutalk-menus::base.settings.main_menu.helper'),
            ], function () {
                /**
                 * @var MenuRepository $menus
                 */
                $menus = app(MenuRepositoryContract::class)
                    ->getWhere(['status' => 'activated'], ['slug', 'title'])
                    ->pluck('title', 'slug')
                    ->toArray();

                return [
                    'main_menu',
                    $menus,
                    get_setting('main_menu'),
                    ['class' => 'form-control']
                ];
            });

        admin_quick_link()->register('menu', [
            'title' => trans('edutalk-menus::base.menu'),
            'url' => route('admin::menus.create.get'),
            'icon' => 'fa fa-bars',
        ]);

        return $next($request);
    }
}
