<?php

namespace App\Model;

use Core\Model\AbstractModel;

/**
 * ParentContact model
 *
 */
class Trip extends AbstractModel 
{
    /**
     * model table name
     *
     * @var string
     */
    const TABLE = 'trips';

    public $id;

    public $members;

    public $description;

    public $date_start;

    public $date_end;
}
