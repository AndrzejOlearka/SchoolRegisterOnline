<?php

namespace App\Model;

use Core\Model\AbstractModel;
use Core\Model\PrimaryModelInterface;

/**
 * Role model
 *
 */
class Role extends AbstractModel implements PrimaryModelInterface
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
