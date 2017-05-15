<?php namespace Edutalk\Base\Menu\Repositories;

use Illuminate\Support\Collection;
use Edutalk\Base\Menu\Models\Menu;
use Edutalk\Base\Repositories\Eloquent\EloquentBaseRepositoryCacheDecorator;
use Edutalk\Base\Menu\Repositories\Contracts\MenuNodeRepositoryContract;

class MenuNodeRepositoryCacheDecorator extends EloquentBaseRepositoryCacheDecorator  implements MenuNodeRepositoryContract
{
    /**
     * @param int $menuId
     * @param array $nodeData
     * @param int $order
     * @param null $parentId
     * @return int|null
     */
    public function updateMenuNode($menuId, array $nodeData, $order, $parentId = null)
    {
        return $this->afterUpdate(__FUNCTION__, func_get_args());
    }

    /**
     * @param Menu|int $menuId
     * @param null|int $parentId
     * @return Collection|null
     */
    public function getMenuNodes($menuId, $parentId = null)
    {
        return $this->beforeGet(__FUNCTION__, func_get_args());
    }
}
