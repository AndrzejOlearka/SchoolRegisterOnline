<?php

namespace App\Model;

use Core\Model\AbstractModel;

/**
 * SchoolClassSubject model
 *
 */
class SchoolClassSubject extends AbstractModel 
{
    /**
     * model table name
     *
     * @var string
     */
    const TABLE = 'classes';

    public $class_id;

    public $school_subject_id;

    public $teacher_id;

    public $group_id;
}
