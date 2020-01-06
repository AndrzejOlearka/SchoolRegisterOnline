<?php

namespace App\Model;

use Core\Model\AbstractModel;

/**
 * DefaultSchedule model
 *
 */
class DefaultSchedule extends AbstractModel 
{
    /**
     * model table name
     *
     * @var string
     */
    const TABLE = 'classes_schedule_default';

    public $school_subject_id;

    public $teacher_id;

    public $teacher_main;
}