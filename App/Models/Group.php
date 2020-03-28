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

    const CLASSES_FOREIGN = 'class_id';

    const TEACHERS_FOREIGN = 'taecher_id';

    const SCHOOL_SUBJECTS = 'school_subject_id';

    public $id;

    public $name;

    public $class_id;

    public $teacher_id;

    public $school_subject_id;
}
