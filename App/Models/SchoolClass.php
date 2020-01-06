<?php

namespace App\Model;

use Core\Model\AbstractModel;

/**
 * SchoolClass model
 *
 */
class SchoolClass extends AbstractModel 
{
    /**
     * model table name
     *
     * @var string
     */
    const TABLE = 'classes';

    public $id;

    public $number;

    public $department;

    public $class_tutor;

    public $profile;

    public $default_year;
}
