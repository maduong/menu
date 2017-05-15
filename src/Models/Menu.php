<?php namespace Edutalk\Base\Menu\Models;

use Edutalk\Base\Menu\Models\Contracts\MenuModelContract;
use Edutalk\Base\Models\EloquentBase as BaseModel;

class Menu extends BaseModel implements MenuModelContract
{
    protected $table = 'menus';

    protected $primaryKey = 'id';

    protected $fillable = [
        'title', 'slug', 'status', 'created_by', 'updated_by',
    ];

    public $timestamps = true;
}
