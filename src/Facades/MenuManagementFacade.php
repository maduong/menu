<?php namespace Edutalk\Base\Menu\Facades;

use Illuminate\Support\Facades\Facade;
use Edutalk\Base\Menu\Support\MenuManagement;

class MenuManagementFacade extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return MenuManagement::class;
    }
}
