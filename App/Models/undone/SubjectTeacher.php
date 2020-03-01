<?php

namespace App\Model;

use Core\Model\AbstractModel;

/**
 * DefaultSchedule model
 *
 */
class SubjectTeacher extends AbstractModel 
{
    /**
     * model table name
     *
     * @var string
     */
    const TABLE = 'subject_teachers';

    public $school_subject_id;

    public $teacher_id;

    public $teacher_main;
}
