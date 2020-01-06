<?php

namespace App\Model;

use Core\Model\AbstractModel;

/**
 * Subject model
 *
 */
class Subject extends AbstractModel 
{
    /**
     * model table name
     *
     * @var string
     */
    const TABLE = 'school_subjects';

    public $id;

    public $name;
}
