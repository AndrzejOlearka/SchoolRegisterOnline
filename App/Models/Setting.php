<?php

namespace App\Model;

use Core\Model\AbstractModel;
use Core\Model\PrimaryModelInterface;

/**
 * Setting model
 *
 */
class Setting extends AbstractModel implements PrimaryModelInterface
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
