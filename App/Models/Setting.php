<?php

namespace App\Model;

use Core\Model\AbstractModel;

/**
 * Setting model
 *
 */
class Setting extends AbstractModel 
{
    /**
     * model table name
     *
     * @var string
     */
    const TABLE = 'settings';

    public $id;

    public $name;

    public $role_id;

    public $value;

    public $description;
}
