<?php

namespace App\Model;

use Core\Model\AbstractModel;

/**
 * Trip model
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

    public $name;

    public $teachers;

    public $date_from;

    public $date_to;

    public $students;

    public $parents;

    public $description;
}
