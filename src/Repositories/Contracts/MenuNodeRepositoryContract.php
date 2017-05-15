<?php namespace Edutalk\Base\Menu\Repositories\Contracts;

use Illuminate\Support\Collection;
use Edutalk\Base\Menu\Models\Menu;

interface MenuNodeRepositoryContract
{
    /**
     * @param int $menuId
     * @param array $nodeData
     * @param int $order
     * @param null $parentId
     * @return int|null
     */
    public function updateMenuNode($menuId, array $nodeData, $order, $parentId = null);

    /**
     * @param Menu|int $menuId
     * @param null|int $parentId
     * @return Collection|null
     */
    public function getMenuNodes($menuId, $parentId = null);
}
