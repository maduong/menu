<?php namespace Edutalk\Base\Menu\Repositories\Contracts;

use Edutalk\Base\Menu\Models\Contracts\MenuModelContract;

interface MenuRepositoryContract
{
    /**
     * @param array $data
     * @param array|null $menuStructure
     * @return int|null
     */
    public function createMenu(array $data, array $menuStructure = null);

    /**
     * @param MenuModelContract|int $id
     * @param array $data
     * @param array|null $menuStructure
     * @param array|null $deletedNodes
     * @return int|null
     */
    public function updateMenu($id, array $data, array $menuStructure = null, array $deletedNodes = null);

    /**
     * @param int $menuId
     * @param array $menuStructure
     */
    public function updateMenuStructure($menuId, array $menuStructure);

    /**
     * @param MenuModelContract|int $id
     * @return \Illuminate\Database\Eloquent\Builder|null|MenuModelContract|\Edutalk\Base\Models\EloquentBase
     */
    public function getMenu($id);
}
