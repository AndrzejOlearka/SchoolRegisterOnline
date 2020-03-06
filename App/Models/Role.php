<?php

namespace App\Model;

use Core\Model\AbstractModel;

/**
 * Role model
 *
 */
class Role extends AbstractModel 
{
    /**
     * model table name
     *
     * @var string
     */
    const TABLE = 'roles';

    public $id;

    public $name;

    public $description;
}
