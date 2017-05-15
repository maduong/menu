<?php namespace Edutalk\Base\Menu\Facades;

use Illuminate\Support\Facades\Facade;
use Edutalk\Base\Menu\Support\DashboardMenu;

class DashboardMenuFacade extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return DashboardMenu::class;
    }
}
