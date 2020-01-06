<?php

namespace App\Model;

use Core\Model\AbstractModel;

/**
 * Student model
 *
 */
class Student extends AbstractModel 
{
    /**
     * model table name
     *
     * @var string
     */
    const TABLE = 'students';

    public $id;

    public $firstname;

    public $lastname;

    public $sex;

    public $class_id;

    public $birthday;

    public $father;

    public $mother;
}
