<?php

namespace App\Model;

use Core\Model\AbstractModel;

/**
 * Group model
 *
 */
class Group extends AbstractModel 
{
    /**
     * model table name
     *
     * @var string
     */
    const TABLE = 'groups';

    public $id;

    public $name;

    public $class_id;

    public $teacher_id;

    public $school_subject_id;
}
